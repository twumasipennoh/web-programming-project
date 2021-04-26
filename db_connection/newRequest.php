<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  $subject = filter_input(INPUT_POST, 'subject');
  $request = filter_input(INPUT_POST, 'request');
  $date = date('Y-m-d', strtotime('today'));

  if (!empty($subject) && !empty($request)){
    $query = "INSERT INTO HR_Tables.requests (employeeID, date, reqSubject, details, reqStatus) SELECT $employeeID, '$date', '$subject', '$request', 'Pending'";
    $enter = $conn -> exec($query);
  }

  include('../pages/requestPage.php');
?>
