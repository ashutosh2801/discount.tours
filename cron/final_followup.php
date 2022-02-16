<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$time1 = date('Y-m-d',strtotime('now'));
$time2 = date('Y-m-d',strtotime('-1 day'));
$sql = "SELECT * FROM `tour_customers` WHERE status=0 AND created_date>='$time2' AND created_date<'$time1' ORDER BY updated_date DESC;";
$query = $conn->query($sql);
if($query->num_rows > 0 ) 
{
	$subtotal = $sub_total = $tax = $cnt = $total = 0;
	$tour_title = array();
	
	$HTML = '';
	while($model = $query->fetch_object()) 
	{
		//$hour = date_differ( strtotime($model->created_date), strtotime('now') );
		//echo "---".$hour."--".$model->id.'<br>';
		//if($hour>=1 && $hour<2)
		//{
			$sql2 = "SELECT * FROM `tour_customer_detail` WHERE user_id=".$model->id.";";
			$query2 = $conn->query($sql2);
			if($query2->num_rows > 0 ) 
			{
				$title=array();
				while($model2 = $query2->fetch_object()) 
				{
					$sql3 = "SELECT * FROM `tour_tours` WHERE id=".$model2->tour_id." LIMIT 1;";
					$query3 = $conn->query($sql3);
					$model3 = $query3->fetch_object();
					$title[] = $model3->title;
				}
	
				$HTML = '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1.2em;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td align="center"><a href="https://www.toniagara.com"><img src="https://www.toniagara.com/images/logo.png" alt="" height="55"></a></td>
	</tr>
	</table>
	<p>Hi '.$model->name.'!</p>
	<p>I saw you started to reserve '. implode(',',$title) .', but weren\'t able to complete it.</p>
	<p>Shoot us a quick note or give us a call at +1 800-653-2242. Let us know how we can help. We\'d love to make this work for you.</p>
	<p><a style="color:#ffffff;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;text-decoration:none;text-transform:uppercase;background-color:#8bc440;padding:15px 50px;width:150px;display:block" href="https://www.toniagara.com/checkout?token='.$model->sessionId.'">Resume Booking</a></p>
	<p>Best wishes,<br />
	 Nick,<br />Niagara Falls Tours Specialist<br />
	 <a href="https://www.toniagara.com">www.toniagara.com</a></p>
	 </div>';
			
				$subject = 'Final Followup: Need help with your booking?';
				$result = sendMail( array($model->email, $model->name), $subject, $HTML);
				if($result->id) {
					saveLog($conn, $model->id, $result->id, 'final followup');
				}
				//sendMail( array(SITEEMAIL, SITENAME), $subject, $HTML);
				//sendMail( array('ashutosh2801@gmail.com', SITENAME), $subject, $HTML);
			}
		//}
		echo $model->name.'---'.$model->email.'<br>';
	}
}
		
$conn->close();