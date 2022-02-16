<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['slug']))
{
    $priceLable = "Price".$_COOKIE['currency'];
	$sql = "SELECT B.lable,B.price, A.* FROM tour_tours as A JOIN tour_pricing as B ON A.ID=B.tour_id WHERE A.status=1 AND A.slug='".addslashes($_GET['slug'])."' AND B.lable='$priceLable'";
	//$sql = "SELECT * FROM tour_tours WHERE slug='".addslashes($_GET['slug'])."'";
	//exit;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$tour = $result->fetch_object();
		
		if($tour->type=='viator') {
			$img = $tour->tour_thumb;
			$price = price_calculator($tour->price);

			$cut_price = '<b class="old_price">'.$price['sub_price'].'</b>';
			$big_price = $price['total_price'];
		}
		else {
		    $adults_price = currency($conn, $tour->adults_price, $tour->currency);
			$img = tour_thumb($tour->tour_thumb);
			$cut_price = $tour->original_price ? '<b class="old_price">'.number_format($tour->original_price,2).'</b>':'';
			$big_price = '<a href="'. $url .'">'.number_format($adults_price,2) . " <span>" . $tour->adults_text.'</span></a>';

    		$adults_price 	= currency($conn, $tour->adults_price, $tour->currency);
    		$children_price = currency($conn, $tour->children_price, $tour->currency);
    		$seniors_price 	= currency($conn, $tour->seniors_price, $tour->currency);
    		$infants_price 	= currency($conn, $tour->infants_price, $tour->currency);
		}
		
		$tour_count = $tour->tour_count + 1;
		$sql2 = "UPDATE `tour_tours` SET `tour_count`='$tour_count' WHERE ID=".$tour->ID.";";
		$conn->query($sql2);
	} else {
    //header('Location: /error?url=/tours/'.$_GET['slug']);
    header('Location: /');
		exit;
	}
} 
else {
	header('Location: /tours');
	exit;
}
$no_reviews = 0;
$sql0 = "SELECT tour_id FROM tour_reviews WHERE tour_id='".$tour->ID."'";
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
	$no_reviews = $result0->num_rows;
}


if($tour->type=='viator') {
    include "single-tour-viator.php";
}
else {
    include "single-tour-self.php";
}
?>