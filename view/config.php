<?php

$server = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "corephp";

$conn = mysqli_connect($server,$db_user,$db_pass,$db_name);

if(!$conn){
	die("connection failed:" .mysqli_connect_error());
}	


?>