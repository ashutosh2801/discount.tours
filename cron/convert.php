<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$url = "http://www.apilayer.net/api/live?access_key=0085acfd6ca34b5ee9a6935e6932ad38&format=1";
$str = file_contents($url);

$res = json_decode($str);
echo $res->quotes->USDCAD;


$sql = "SELECT * FROM `tour_options` WHERE name='USDCAD' LIMIT 1";
$query = $conn->query($sql);
if($query->num_rows > 0 && $res->quotes->USDCAD) {
	$sql2 = "UPDATE `tour_options` SET `value` = '".$res->quotes->USDCAD."' WHERE name='USDCAD';";
	$conn->query($sql2);
}

//echo '<pre>'; print_r($res);
?>