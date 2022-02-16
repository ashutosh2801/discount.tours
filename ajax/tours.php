<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');


$order = (!empty($_POST['order'])) ? addslashes($_POST['order']) : 'tour_count';
//$sort = (!empty($_POST['sort'])) ? addslashes($_POST['sort']) : 'ASC';

$condition = "status=1";
$condition.= (!empty($_POST['q'])) ? " AND title like '%".addslashes($_POST['q'])."%'" : '';
$condition.= (!empty($_POST['tour_types'])) ? " AND FIND_IN_SET('".addslashes($_POST['tour_types'])."', tour_types)" : '';
$condition.= (!empty($_POST['country'])) ? " AND country='".addslashes($_POST['country'])."'" : '';
$condition.= (!empty($_POST['category'])) ? " AND FIND_IN_SET('".addslashes($_POST['category'])."', category)" : '';


if($order=='ordering') $order = '`order` ASC';
else if($order=='date') $order = '`created_on` DESC';
else if($order=='price-low-to-high') $order = '`adults_price` ASC';
else if($order=='price-high-to-low') $order = '`adults_price` DESC';
else if($order=='rating') $order = '`rating` DESC';           
else if($order=='popularity') $order = '`tour_count` DESC';
else if($order=='title') $order = '`title` ASC';
else $order = '`order` ASC';

$limit  = 9;
$page 	= isset($_POST['page']) ? $_POST['page'] : 1;
$offset = ($page - 1) * $limit;

//echo $condition .' ORDER BY '. $order;
tour_list($conn, $condition, "$order", "$offset, $limit");
?>