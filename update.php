<?php
require_once('includes/config.php');
require_once('includes/functions.php');

	
$sql = "SELECT b.ID as tour_id, a.* FROM `tbl_tours` a, `tour_tours` b WHERE a.slug=b.slug ORDER BY tour_id ASC";
$results = $conn->query($sql);
while($model = $results->fetch_object()) {
	echo $sql2 = "UPDATE `tour_tours` SET 
			`description`='".$model->description."', 
			`pickup_information`='".$model->pickup_information."', 
			`cancellation_policy`='".$model->cancellation_policy."', 
			`frequently_asked_questions`='".$model->frequently_asked_questions."'
			 
			 WHERE ID=".$model->tour_id;
			 $conn->query($sql2);
}
?>