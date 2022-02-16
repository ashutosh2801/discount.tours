<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

extract($_POST);

if($tour_id && $name && $email && $count_star=5)
{
	$sql = "INSERT INTO `tour_reviews` (`tour_id`, `name`, `email`, `description`, `website`, `count_star`, `author_IP`, `created_on`, `status`, `timestamp`) VALUES ('".$tour_id."', '".$name."', '".$email."', '".$comment."', '".$website."', '".$rating."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d H:i:s')."', '0', '".date('Y-m-d H:i:s')."');";
	if ($conn->query($sql) === TRUE) {
		echo '<div class="alert alert-success">Thank you for your time!</div>';
	}
	else {
		echo '<div class="alert alert-danger">Error!</div>';
	}
}
else {
	echo '<div class="alert alert-danger">Please check mandatory fields!</div>';
}
?>
