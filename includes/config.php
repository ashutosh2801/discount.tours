<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set("Canada/Eastern");

require_once('define.php');

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}
?>