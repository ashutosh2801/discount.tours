<?php
require_once('../includes/config.php');
//require_once('../includes/functions.php');

$time = date('Y-m-d',strtotime('-10 days'));
$sql1 = "DELETE FROM `tour_customers` WHERE status=0 AND created_date<'$time';";
$conn->query($sql1);
$sql2 = "DELETE FROM `tour_customer_detail` WHERE user_id NOT IN (SELECT id FROM `tour_customers`);";
$conn->query($sql2);