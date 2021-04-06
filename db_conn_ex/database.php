<?php
$host="web-programming-db.cmosf0873dbb.us-east-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="cs4300_dev";
$password="knowledgeapp12";
$dbname="";

$conn="";
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>