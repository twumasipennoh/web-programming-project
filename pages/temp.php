<?php
  require_once('../db_connection/database.php');

  $employeeID = $_GET['employeeID']; // Gets the employeeID from previous pages
  echo $employeeID;
  $query = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID";
  $shifts = $conn -> query($query);

  $query2 = "SELECT * FROM HR_Tables.Employee WHERE employeeID=$employeeID";
  $return = $conn -> query($query2);
  $employee = $return -> fetch();
  echo $employee['firstName'];
  echo $employee['lastName'];

?>
