<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  $employeeChange = $_POST['id'];
  $subject = $_POST['subject'];
  $modify = $_POST['status'];

  $query = "UPDATE HR_Tables.requests SET reqStatus='$modify' WHERE employeeID=$employeeChange AND reqSubject='$subject'";
  $row = $conn -> exec($query);

  include('../pages/adminRequestPage.php');
?>
