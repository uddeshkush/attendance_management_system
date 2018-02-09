<?php
//create connection.
$dbhost = "localhost";
$dbuser = "UDDESH2710";
$dbpass = "ADMIN";
$dbname = "ams";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
}
?>