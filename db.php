<?php
$host = "localhost";
$user = "u136031031_praja";
$db_name = "u136031031_praja";
$pass = "hM4CoOrG4sE";

date_default_timezone_set('Asia/Kolkata');

$con = mysqli_connect($host, $user, $pass, $db_name);

if (mysqli_connect_errno())
{
	$_SESSION['error'] = "Failed to connect to MySQL: " . mysqli_connect_error();
	error();
}