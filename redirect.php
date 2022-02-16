<?php
require_once('includes/config.php');
require_once('includes/functions.php');

if($_GET['country']) $country = $_GET['country'];
else if($_COOKIE['country']) $country = $_COOKIE['country'];
else $country = 'United States';

if($_GET['currency']) $currency = $_GET['currency'];
else if($_COOKIE['currency']) $currency = $_COOKIE['currency'];
else $country = 'USD';


set_cookie($country, $currency);


/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: '.$_GET['redirect']);
exit;
?>