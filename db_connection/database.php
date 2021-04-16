<?php
$host="web-programming-db.cmosf0873dbb.us-east-2.rds.amazonaws.com"; //provide endpoint
$port=3306;
$socket="";
$user="cs4300_dev";//provide username
$password="knowledgeapp12"; //provide password
$dbname="";

$conn="";
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>