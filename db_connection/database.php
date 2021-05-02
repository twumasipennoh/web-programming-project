<?php
$host="127.0.0.1"; //provide endpoint
$port=3307;
$socket="";
$user="root";//provide username
$password=""; //provide password
$dbname="";

$conn="";
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>