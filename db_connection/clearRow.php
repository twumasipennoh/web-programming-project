<?php
  include('database.php');

  // Get employeeID
  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT);
  }

  $date = filter_input(INPUT_GET, 'date');

  if ($date != false){
    $query = "DELETE FROM HR_Tables.timesheetTable WHERE `date` = '$date' AND employeeID = $employeeID";
    $row = $conn -> exec($query);
  }

  include('../pages/timesheet.php');
?>
