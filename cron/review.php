<?php
exit;
require_once('../includes/config.php');
require_once('../includes/functions.php');

$time = date('Y-m-d',strtotime('-1 day'));
$sql = "SELECT cd.* FROM `tour_customers` c, `tour_customer_detail` cd WHERE c.id=cd.user_id AND cd.tour_date>='$time' AND cd.tour_complete=1;";
$query = $conn->query($sql);
if($query->num_rows > 0 ) {
	
	$subtotal = $sub_total = $tax = $cnt = $total = 0;
	$tour_title = array();
	
	$HTML = '';
	while($model = $query->fetch_object()) 
	{
		//$hour = date_differ( strtotime($model->tour_date), strtotime('now') );
		//echo "---".$hour."--".$model->cid.'<br>';
		//if($hour>=24 && $hour<48)
		//{
			$HTML = '<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1.2em;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center"><a href="https://www.toniagara.com"><img src="https://www.toniagara.com/images/logo.png" alt="logo.png" height="55"></a></td>
</tr>
</table>
<p>Hello '.$model->name.'!</p>
<p>Thank you so much for coming out with us at ToNiagara.</p>
<p>If you had an excellent time with us, we\'d love it if you could <a href="https://www.tripadvisor.ca/Attraction_Review-g154982-d15220303-Reviews-ToNiagara_Tours-Brampton_Ontario.html#REVIEWS">leave a review on TripAdvisor</a>. Online reviews help us get the word out about who we are and what we offer, and it\'s a simple way for you to give us your valuable feedback. If you have a few moments to <a href="https://www.tripadvisor.ca/Attraction_Review-g154982-d15220303-Reviews-ToNiagara_Tours-Brampton_Ontario.html#REVIEWS">write a review</a>, we would really appreciate it!</p>
<p>If there is anything else we can do for you, please respond directly to this email.</p>
<p>Thank You,<br />
 Nick,<br />Niagara Falls Tours Specialist<br />
 <a href="https://www.toniagara.com">www.toniagara.com</a></p>
 </div>';
		
			$subject = 'Thank you so much for coming out with us at ToNiagara.';
			sendMail( array($model->email, $model->name), $subject, $HTML);
			//sendMail( array(SITEEMAIL, SITENAME), $subject, $HTML);
			sendMail( array('ashutosh2801@gmail.com', SITENAME), $subject, $HTML);
		//}
		echo $model->email."----".$model->name."<br>";
	}
}
		
$conn->close();