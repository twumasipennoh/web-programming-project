<?php
$host=""; //provide endpoint
$port=3306;
$socket="";
$user="";//provide username
$password=""; //provide password
$dbname="";

$conn="";
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>