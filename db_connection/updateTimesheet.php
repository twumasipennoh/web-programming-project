<?php

  // Sunday
  $sunDate = filter_input(INPUT_POST, 'sun_date');
  $sunIn = filter_input(INPUT_POST, 'sun_in');
  $sunLunch = filter_input(INPUT_POST, 'sun_lunch');
  $sunLunchIn = filter_input(INPUT_POST, 'sun_lunch_in');
  $sunOut = filter_input(INPUT_POST, 'sun_out');
  $sunTotal = filter_input(INPUT_POST, 'sun_total');

  if ($sunIn == null || $sunLunch == null || $sunLunchIn == null || $sunOut == null){
    $error = "Invalid data. Check all fields and try again.";
  } else {
    include('database.php');
  }

  $query = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$sunDate', '$sunIn', '$sunLunch', '$sunLunchIn', '$sunOut', '$sunTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$sunDate')"; // May need to change some quotes
  $row = $db -> exec($query);

  // Monday
  $monDate = filter_input(INPUT_POST, 'mon_date');
  $monIn = filter_input(INPUT_POST, 'mon_in');
  $monLunch = filter_input(INPUT_POST, 'mon_lunch');
  $monLunchIn = filter_input(INPUT_POST, 'mon_lunch_in');
  $monOut = filter_input(INPUT_POST, 'mon_out');
  $monTotal = filter_input(INPUT_POST, 'mon_total');

  $query2 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$monDate', '$monIn', '$monLunch', '$monLunchIn', '$monOut', '$monTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$monDate')"; // May need to change some quotes
  $row2 = $db -> exec($query2);

  // Tuesday
  $tuesDate = filter_input(INPUT_POST, 'tues_date');
  $tuesIn = filter_input(INPUT_POST, 'tues_in');
  $tuesLunch = filter_input(INPUT_POST, 'tues_lunch');
  $tuesLunchIn = filter_input(INPUT_POST, 'tues_lunch_in');
  $tuesOut = filter_input(INPUT_POST, 'tues_out');
  $tuesTotal = filter_input(INPUT_POST, 'tues_total');

  $query3 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$tuesDate', '$tuesIn', '$tuesLunch', '$tuesLunchIn', '$tuesOut', '$tuesTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$tuesDate')"; // May need to change some quotes
  $row3 = $db -> exec($query3);

  // Wednesday
  $wedDate = filter_input(INPUT_POST, 'wed_date');
  $wedIn = filter_input(INPUT_POST, 'wed_in');
  $wedLunch = filter_input(INPUT_POST, 'wed_lunch');
  $wedLunchIn = filter_input(INPUT_POST, 'wed_lunch_in');
  $wedOut = filter_input(INPUT_POST, 'wed_out');
  $wedTotal = filter_input(INPUT_POST, 'wed_total');

  $query4 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$wedDate', '$wedIn', '$wedLunch', '$wedLunchIn', '$wedOut', '$wedTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$wedDate')"; // May need to change some quotes
  $row4 = $db -> exec($query4);

  // Thursday
  $thurDate = filter_input(INPUT_POST, 'thur_date');
  $thurIn = filter_input(INPUT_POST, 'thur_in');
  $thurLunch = filter_input(INPUT_POST, 'thur_lunch');
  $thurLunchIn = filter_input(INPUT_POST, 'thur_lunch_in');
  $thurOut = filter_input(INPUT_POST, 'thur_out');
  $thurTotal = filter_input(INPUT_POST, 'thur_total');

  $query5 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$thurDate', '$thurIn', '$thurLunch', '$thurLunchIn', '$thurOut', '$thurTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$thurDate')"; // May need to change some quotes
  $row5 = $db -> exec($query5);

  // Friday
  $friDate = filter_input(INPUT_POST, 'fri_date');
  $friIn = filter_input(INPUT_POST, 'fri_in');
  $friLunch = filter_input(INPUT_POST, 'fri_lunch');
  $friLunchIn = filter_input(INPUT_POST, 'fri_lunch_in');
  $friOut = filter_input(INPUT_POST, 'fri_out');
  $friTotal = filter_input(INPUT_POST, 'fri_total');

  $query6 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$friDate', '$friIn', '$friLunch', '$friLunchIn', '$friOut', '$friTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$friDate')"; // May need to change some quotes
  $row6 = $db -> exec($query6);

  // Saturday
  $satDate = filter_input(INPUT_POST, 'sat_date');
  $satIn = filter_input(INPUT_POST, 'sat_in');
  $satLunch = filter_input(INPUT_POST, 'sat_lunch');
  $satLunchIn = filter_input(INPUT_POST, 'sat_lunch_in');
  $satOut = filter_input(INPUT_POST, 'sat_out');
  $satTotal = filter_input(INPUT_POST, 'sat_total');

  $query7 = "INSERT INTO  timesheetTable (employeeID, date, timeIn, lunch, lunchEnd, timeOut, total) VALUES ('$employeeID', '$satDate', '$satIn', '$satLunch', '$satLunchIn', '$satOut', '$satTotal') WHERE NOT EXISTS (SELECT * FROM timesheetTable WHERE employeeID = '$employeeID' AND '$satDate')"; // May need to change some quotes
  $row7 = $db -> exec($query7);


  include('timesheet.php');
?>
