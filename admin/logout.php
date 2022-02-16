<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
session_destroy();
unset($_SESSION);
header('Location: login.php');
exit;
?>