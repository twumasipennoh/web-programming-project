<?php

  include('database.php');

  // Get employeeID
  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT);
  }

  // Sunday
  $sunDate = date('Y-m-d', strtotime('last sunday'));
  $sunIn = filter_input(INPUT_POST, 'sun_in');
  $sunLunch = filter_input(INPUT_POST, 'sun_lunch');
  $sunLunchIn = filter_input(INPUT_POST, 'sun_lunch_in');
  $sunOut = filter_input(INPUT_POST, 'sun_out');
  $sunTotal = filter_input(INPUT_POST, 'sun_total');

  if ($sunDate == null || $sunIn == null || $sunLunch == null || $sunLunchIn == null || $sunOut == null || $sunTotal == null){

  } else {
    $query = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$sunDate', '$sunIn', '$sunLunch', '$sunLunchIn', '$sunOut', '$sunTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$sunDate' LIMIT 1)";
    $row = $conn -> exec($query);
  }

  // // Monday
  // $monDate = date('Y-m-d', strtotime($sunday. '+1 day'));
  // $monIn = filter_input(INPUT_POST, 'mon_in');
  // $monLunch = filter_input(INPUT_POST, 'mon_lunch');
  // $monLunchIn = filter_input(INPUT_POST, 'mon_lunch_in');
  // $monOut = filter_input(INPUT_POST, 'mon_out');
  // $monTotal = filter_input(INPUT_POST, 'mon_total');
  //
  // if ($monDate == null || $monIn == null || $monLunch == null || $monLunchIn == null || $monOut == null || $monTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query2 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$monDate', '$monIn', '$monLunch', '$monLunchIn', '$monOut', '$monTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$monDate')"; // May need to change some quotes
  // $row2 = $db -> exec($query2);

  // // Tuesday
  // $tuesDate = filter_input(INPUT_POST, 'tues_date');
  // $tuesIn = filter_input(INPUT_POST, 'tues_in');
  // $tuesLunch = filter_input(INPUT_POST, 'tues_lunch');
  // $tuesLunchIn = filter_input(INPUT_POST, 'tues_lunch_in');
  // $tuesOut = filter_input(INPUT_POST, 'tues_out');
  // $tuesTotal = filter_input(INPUT_POST, 'tues_total');
  //
  // if ($tuesDate == null || $tuesIn == null || $tuesLunch == null || $tuesLunchIn == null || $tuesOut == null || $tuesTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query3 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$tuesDate', '$tuesIn', '$tuesLunch', '$tuesLunchIn', '$tuesOut', '$tuesTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$tuesDate')"; // May need to change some quotes
  // $row3 = $db -> exec($query3);
  //
  // // Wednesday
  // $wedDate = filter_input(INPUT_POST, 'wed_date');
  // $wedIn = filter_input(INPUT_POST, 'wed_in');
  // $wedLunch = filter_input(INPUT_POST, 'wed_lunch');
  // $wedLunchIn = filter_input(INPUT_POST, 'wed_lunch_in');
  // $wedOut = filter_input(INPUT_POST, 'wed_out');
  // $wedTotal = filter_input(INPUT_POST, 'wed_total');
  //
  // if ($wedDate == null || $wedIn == null || $wedLunch == null || $wedLunchIn == null || $wedOut == null || $wedTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query4 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$wedDate', '$wedIn', '$wedLunch', '$wedLunchIn', '$wedOut', '$wedTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$wedDate')"; // May need to change some quotes
  // $row4 = $db -> exec($query4);
  //
  // // Thursday
  // $thurDate = filter_input(INPUT_POST, 'thur_date');
  // $thurIn = filter_input(INPUT_POST, 'thur_in');
  // $thurLunch = filter_input(INPUT_POST, 'thur_lunch');
  // $thurLunchIn = filter_input(INPUT_POST, 'thur_lunch_in');
  // $thurOut = filter_input(INPUT_POST, 'thur_out');
  // $thurTotal = filter_input(INPUT_POST, 'thur_total');
  //
  // if ($thurDate == null || $thurIn == null || $thurLunch == null || $thurLunchIn == null || $thurOut == null || $thurTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query5 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$thurDate', '$thurIn', '$thurLunch', '$thurLunchIn', '$thurOut', '$thurTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$thurDate')"; // May need to change some quotes
  // $row5 = $db -> exec($query5);
  //
  // // Friday
  // $friDate = filter_input(INPUT_POST, 'fri_date');
  // $friIn = filter_input(INPUT_POST, 'fri_in');
  // $friLunch = filter_input(INPUT_POST, 'fri_lunch');
  // $friLunchIn = filter_input(INPUT_POST, 'fri_lunch_in');
  // $friOut = filter_input(INPUT_POST, 'fri_out');
  // $friTotal = filter_input(INPUT_POST, 'fri_total');
  //
  // if ($friDate == null || $friIn == null || $friLunch == null || $friLunchIn == null || $friOut == null || $friTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query6 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$friDate', '$friIn', '$friLunch', '$friLunchIn', '$friOut', '$friTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$friDate')"; // May need to change some quotes
  // $row6 = $db -> exec($query6);
  //
  // // Saturday
  // $satDate = filter_input(INPUT_POST, 'sat_date');
  // $satIn = filter_input(INPUT_POST, 'sat_in');
  // $satLunch = filter_input(INPUT_POST, 'sat_lunch');
  // $satLunchIn = filter_input(INPUT_POST, 'sat_lunch_in');
  // $satOut = filter_input(INPUT_POST, 'sat_out');
  // $satTotal = filter_input(INPUT_POST, 'sat_total');
  //
  // if ($satDate == null || $satIn == null || $satLunch == null || $satLunchIn == null || $satOut == null || $satTotal == null){
  //   $error = "Invalid data. Check all fields and try again.";
  //   exit();
  // }
  //
  // $query7 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) VALUES ('$employeeID', '$satDate', '$satIn', '$satLunch', '$satLunchIn', '$satOut', '$satTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$satDate')"; // May need to change some quotes
  // $row7 = $db -> exec($query7);


  include('../pages/timesheet.php');
?>
