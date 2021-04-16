<?php
$host="web-programming-db.cmosf0873dbb.us-east-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="cs4300_dev";
$password="";
$dbname="HR_Tables";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$con->close();
?>
