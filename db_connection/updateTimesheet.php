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

  $qSun = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$sunDate'";
  $res = $conn -> query($qSun);
  $r = $res -> fetch();

  if ($sunDate == null || $sunIn == null || $sunLunch == null || $sunLunchIn == null || $sunOut == null || $sunTotal == null){

  } else {
    if (empty($r)){
      $query = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$sunDate', '$sunIn', '$sunLunch', '$sunLunchIn', '$sunOut', '$sunTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$sunDate' LIMIT 1)";
      $row = $conn -> exec($query);
    } else {
      $query = "UPDATE HR_Tables.timesheetTable SET timeIn='$sunIn', lunch='$sunLunch', timeBack='$sunLunchIn', timeOut='$sunOut', total='$sunTotal' WHERE employeeID=$employeeID AND `date`='$sunDate'";
      $row = $conn -> exec($query);
    }
  }

  // Monday
  $monDate = date('Y-m-d', strtotime($sunDate . '+1 day'));
  $monIn = filter_input(INPUT_POST, 'mon_in');
  $monLunch = filter_input(INPUT_POST, 'mon_lunch');
  $monLunchIn = filter_input(INPUT_POST, 'mon_lunch_in');
  $monOut = filter_input(INPUT_POST, 'mon_out');
  $monTotal = filter_input(INPUT_POST, 'mon_total');

  $qMon = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$monDate'";
  $res2 = $conn -> query($qMon);
  $r2 = $res2 -> fetch();

  if ($monDate == null || $monIn == null || $monLunch == null || $monLunchIn == null || $monOut == null || $monTotal == null){

  } else {
    if (empty($r2)){
      $query2 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$monDate', '$monIn', '$monLunch', '$monLunchIn', '$monOut', '$monTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$monDate' LIMIT 1)";
      $row2 = $conn -> exec($query2);
    } else {
      $query2 = "UPDATE HR_Tables.timesheetTable SET timeIn='$monIn', lunch='$monLunch', timeBack='$monLunchIn', timeOut='$monOut', total='$monTotal' WHERE employeeID=$employeeID AND `date`='$monDate'";
      $row2 = $conn -> exec($query2);
    }
  }


  // Tuesday
  $tuesDate = date('Y-m-d', strtotime($sunDate . '+2 days'));
  $tuesIn = filter_input(INPUT_POST, 'tues_in');
  $tuesLunch = filter_input(INPUT_POST, 'tues_lunch');
  $tuesLunchIn = filter_input(INPUT_POST, 'tues_lunch_in');
  $tuesOut = filter_input(INPUT_POST, 'tues_out');
  $tuesTotal = filter_input(INPUT_POST, 'tues_total');

  $qTues = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$tuesDate'";
  $res3 = $conn -> query($qTues);
  $r3 = $res3 -> fetch();

  if ($tuesDate == null || $tuesIn == null || $tuesLunch == null || $tuesLunchIn == null || $tuesOut == null || $tuesTotal == null){

  } else {
    if (empty($r3)){
      $query3 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$tuesDate', '$tuesIn', '$tuesLunch', '$tuesLunchIn', '$tuesOut', '$tuesTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$tuesDate' LIMIT 1)";
      $row3 = $conn -> exec($query3);
    } else {
      $query3 = "UPDATE HR_Tables.timesheetTable SET timeIn='$tuesIn', lunch='$tuesLunch', timeBack='$tuesLunchIn', timeOut='$tuesOut', total='$tuesTotal' WHERE employeeID=$employeeID AND `date`='$tuesDate'";
      $row3 = $conn -> exec($query3);
    }
  }


  // Wednesday
  $wedDate = date('Y-m-d', strtotime($sunDate . '+3 days'));
  $wedIn = filter_input(INPUT_POST, 'wed_in');
  $wedLunch = filter_input(INPUT_POST, 'wed_lunch');
  $wedLunchIn = filter_input(INPUT_POST, 'wed_lunch_in');
  $wedOut = filter_input(INPUT_POST, 'wed_out');
  $wedTotal = filter_input(INPUT_POST, 'wed_total');

  $qWed = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$wedDate'";
  $res4 = $conn -> query($qWed);
  $r4 = $res4 -> fetch();

  if ($wedDate == null || $wedIn == null || $wedLunch == null || $wedLunchIn == null || $wedOut == null || $wedTotal == null){

  } else {
    if (empty($r4)){
      $query4 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$wedDate', '$wedIn', '$wedLunch', '$wedLunchIn', '$wedOut', '$wedTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$wedDate' LIMIT 1)";
      $row4 = $conn -> exec($query4);
    } else {
      $query4 = "UPDATE HR_Tables.timesheetTable SET timeIn='$wedIn', lunch='$wedLunch', timeBack='$wedLunchIn', timeOut='$wedOut', total='$wedTotal' WHERE employeeID=$employeeID AND `date`='$wedDate'";
      $row4 = $conn -> exec($query4);
    }
  }


  // Thursday
  $thurDate = date('Y-m-d', strtotime($sunDate . '+4 days'));
  $thurIn = filter_input(INPUT_POST, 'thur_in');
  $thurLunch = filter_input(INPUT_POST, 'thur_lunch');
  $thurLunchIn = filter_input(INPUT_POST, 'thur_lunch_in');
  $thurOut = filter_input(INPUT_POST, 'thur_out');
  $thurTotal = filter_input(INPUT_POST, 'thur_total');

  $qThur = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$thurDate'";
  $res5 = $conn -> query($qThur);
  $r5 = $res5 -> fetch();

  if ($thurDate == null || $thurIn == null || $thurLunch == null || $thurLunchIn == null || $thurOut == null || $thurTotal == null){

  } else {
    if (empty($r5)){
      $query5 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$thurDate', '$thurIn', '$thurLunch', '$thurLunchIn', '$thurOut', '$thurTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$thurDate' LIMIT 1)";
      $row5 = $conn -> exec($query5);
    } else {
      $query5 = "UPDATE HR_Tables.timesheetTable SET timeIn='$thurIn', lunch='$thurLunch', timeBack='$thurLunchIn', timeOut='$thurOut', total='$thurTotal' WHERE employeeID=$employeeID AND `date`='$thurDate'";
      $row5 = $conn -> exec($query5);
    }
  }


  // Friday
  $friDate = date('Y-m-d', strtotime($sunDate . '+5 days'));
  $friIn = filter_input(INPUT_POST, 'fri_in');
  $friLunch = filter_input(INPUT_POST, 'fri_lunch');
  $friLunchIn = filter_input(INPUT_POST, 'fri_lunch_in');
  $friOut = filter_input(INPUT_POST, 'fri_out');
  $friTotal = filter_input(INPUT_POST, 'fri_total');

  $qFri = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$friDate'";
  $res6 = $conn -> query($qFri);
  $r6 = $res6 -> fetch();

  if ($friDate == null || $friIn == null || $friLunch == null || $friLunchIn == null || $friOut == null || $friTotal == null){

  } else {
    if (empty($r6)){
      $query6 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$friDate', '$friIn', '$friLunch', '$friLunchIn', '$friOut', '$friTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$friDate' LIMIT 1)";
      $row6 = $conn -> exec($query6);
    } else {
      $query6 = "UPDATE HR_Tables.timesheetTable SET timeIn='$friIn', lunch='$friLunch', timeBack='$friLunchIn', timeOut='$friOut', total='$friTotal' WHERE employeeID=$employeeID AND `date`='$friDate'";
      $row6 = $conn -> exec($query6);
    }
  }


  // Saturday
  $satDate = date('Y-m-d', strtotime($sunDate . '+6 days'));
  $satIn = filter_input(INPUT_POST, 'sat_in');
  $satLunch = filter_input(INPUT_POST, 'sat_lunch');
  $satLunchIn = filter_input(INPUT_POST, 'sat_lunch_in');
  $satOut = filter_input(INPUT_POST, 'sat_out');
  $satTotal = filter_input(INPUT_POST, 'sat_total');

  $qSat = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$satDate'";
  $res7 = $conn -> query($qSat);
  $r7 = $res7 -> fetch();

  if ($satDate == null || $satIn == null || $satLunch == null || $satLunchIn == null || $satOut == null || $satTotal == null){

  } else {
    if (empty($r7)){
      $query7 = "INSERT INTO  HR_Tables.timesheetTable (employeeID, date, timeIn, lunch, timeBack, timeOut, total) SELECT $employeeID, '$satDate', '$satIn', '$satLunch', '$satLunchIn', '$satOut', '$satTotal' WHERE NOT EXISTS (SELECT * FROM HR_Tables.timesheetTable WHERE employeeID = $employeeID AND `date` = '$satDate' LIMIT 1)";
      $row7 = $conn -> exec($query7);
    } else {
      $query7 = "UPDATE HR_Tables.timesheetTable SET timeIn='$satIn', lunch='$satLunch', timeBack='$satLunchIn', timeOut='$satOut', total='$satTotal' WHERE employeeID=$employeeID AND `date`='$satDate'";
      $row7 = $conn -> exec($query7);
    }
  }

  include('../pages/timesheet.php');
?>
