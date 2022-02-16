<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

//header('Content-Type: text/csv; charset=utf-8');  
//header('Content-Disposition: attachment; filename=data.csv');
  
$btime = date('Y-m-d',strtotime('-120 days'));
//$btime = '2019-04-01';
$ctime = date('Y-m-d');
$sql = "SELECT c.id, c.order_id, c.url_string, c.updated_date, cd.*, t.ID, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, `tour_tours` t WHERE c.id=cd.user_id AND c.status=2 AND (cd.tour_date<'$ctime' AND cd.tour_date>='$btime') AND cd.tour_id=t.ID;";

//exit;
$igonre = array('93064F','11C810','AD74E1','83775E','365C55','2F71D4','98EC5D','AA8BD5');

$query = $conn->query($sql);
if($query->num_rows > 0 ) 
{
	$delimiter = ",";
	$filename = "batch-trip-completed.csv";
	$output = fopen("php://memory", "w");
	
	$fields = array("&CID=5204691"); 
	fputcsv($output, $fields, $delimiter);
	
	$fields = array("&SUBID=219478"); 
	fputcsv($output, $fields, $delimiter);

	$fields = array("&CURRENCY=CAD"); 
	fputcsv($output, $fields, $delimiter);

	//$fields = array("&ENCODING=UTF"); 
	//fputcsv($output, $fields, $delimiter);

	//$fields = array('aid', 'pid', 'cid', 'amount', 'type', 'sid', 'date', 'oid'); 
	//fputcsv($output, $fields, $delimiter);
	
	$data = array();
	$coupon = '';
	$discount = 0;
		 
	$item = array();
	while($row = $query->fetch_object()) 
	{
		$item = array();
		if($row->adults) { 
			if($row->price_type=='person') {
				$item[] = $row->ID."_sku_adults;".round($row->adults_price,2).";".$row->adults;
			} 
			else if($row->price_type=='group') {
				$item[] = $row->ID."_sku_group;".round($row->adults_price,2).";".$row->adults;
			}
		}
		if($row->children) { 
			$item[] = $row->ID."_sku_children;".round($row->children_price,2).";".$row->children;
		}
		if($row->seniors) { 
			$item[] = $row->ID."_sku_seniors;".round($row->seniors_price,2).";".$row->seniors;
		}
		if($row->infants) { 
			$item[] = $row->ID."_sku_infants;0".";".$row->infants;
		}
		
		$sql2 = "SELECT * FROM `tour_add_ons` WHERE addons_id IN (".$row->add_ons.");";
		$query2 = $conn->query($sql2);
		if($query2->num_rows > 0 ) {
			$k = 0;
			$add_ons_nom = explode(",",$row->add_ons_nom);
			while($model2 = $query2->fetch_object()) {
				$item[] = $row->ID."_sku_addons_".$model2->addons_id.";".$model2->addons_price.";".$add_ons_nom[$k];
			}
		}

		$data 		= json_decode($row->url_string);
		$datetime = date("m/d/Y h:i A", strtotime($row->updated_date));
		$order_id = $row->order_id;
		$discount = $row->discount;
		$coupon 	= $row->coupon;
	
		$SKU = implode(";;",$item);
		
		$batcheventID = $data->batcheventID;
		
		//echo $batcheventID.'<br>';
		if($batcheventID && strlen($batcheventID)>2 && !in_array($order_id,$igonre)) {
			$lineData = array( 0, 0, '5204691', $SKU, '412695', $batcheventID, $datetime, $order_id, $discount, $coupon );
			fputcsv($output, $lineData, $delimiter);
		}
	
	}
	//exit;
	
	//move back to beginning of file
	fseek($output, 0);
	
	//set headers to download file rather than displayed
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $filename . '";');
	
	//output all remaining data on a file pointer
	fpassthru($output);
}
		
$conn->close();