<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['username']))
{
	$sql = "SELECT * FROM tour_users WHERE username = '".addslashes($_GET['username'])."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$user = $result->fetch_object();
		
		if(empty($_COOKIE['USER_PARTNER'])) {
			setcookie('USER_PARTNER', $_GET['username'], time() + 86400 * 2, "/");
		}
		
		header('Location: /tours');
		exit;
	} else {
		header('Location: /error?url=/'.$_GET['username']);
		exit;
	}
} 
else {
	header('Location: /');
	exit;
}
?>
