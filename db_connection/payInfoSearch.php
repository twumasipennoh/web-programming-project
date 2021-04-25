<?php

  include('database.php');

  // Get employeeID
  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT);
  }

  $startDate = filter_input(INPUT_POST, 'searchStart');
  $endDate = filter_input(INPUT_POST, 'searchEnd');

    // Use one if only one date is specified
  if (!$startDate(empty) && $endDate(empty)){

  } else if ($startDate(empty) && !$endDate(empty)){
    // Just use $endDate
  } else if (!$startDate(empty) && !$endDate(empty))
    // Use both to search
  }

?>
