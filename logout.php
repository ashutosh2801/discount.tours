<?php
require_once('includes/config.php');
require_once('includes/functions.php');

session_destroy($_SESSION);
unset($_SESSION['USER_ID']);
unset($_SESSION['FULLNAME']);
unset($_SESSION['EMAIL']);
unset($_SESSION['ROLE']);

/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: '.APPROOT);
exit;
?>