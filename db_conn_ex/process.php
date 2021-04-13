<?php include 'database.php';?>

<?php

// create a variable
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$job_title=$_POST['job_title'];
$email=$_POST['email'];

//Execute the query
$sql = "INSERT INTO HR_Tables.Employee(employeeID,firstName,lastName,jobTitle,emailAddress) VALUES(?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->execute([0,$first_name, $last_name, $job_title, $email]);