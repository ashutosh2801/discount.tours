<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$promo = addslashes($_POST['promo']);
$today = date('Y-m-d');

if(!empty($promo))
{
	$sql = "SELECT * FROM tour_discount WHERE campaign='$promo' AND '$today'>=start_date and '$today'<=end_date LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		echo '';
	}
	else {
		echo '<div class="label label-danger">Invalid promo code!</div>';
	}
}
else {
	echo '<div class="label label-danger">Promo code should not be blank.</div>';
}