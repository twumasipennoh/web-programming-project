<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  // Get days shown in timesheet
  $monday = date('Y-m-d', strtotime('last monday'));
  $tuesday = date('Y-m-d', strtotime($monday. '+1 days'));
  $wednesday = date('Y-m-d', strtotime($monday. '+2 days'));
  $thursday = date('Y-m-d', strtotime($monday. '+3 days'));
  $friday = date('Y-m-d', strtotime($monday. '+4 days'));
  $saturday = date('Y-m-d', strtotime($monday. '+5 days'));
  $sunday = date('Y-m-d', strtotime($monday. '+6 days'));


  // Get the shifts the employee has worked in the current week
  if (!isset($sunShift)){
    $sunQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND HR_Tables.timesheetTable.date='$sunday'";
    $shifts = $conn -> query($sunQuery);
    $sunShift = $shifts -> fetch();
  }

  if (!isset($monShift)){
    $monQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$monday'";
    $shifts = $conn -> query($monQuery);
    $monShift = $shifts -> fetch();
  }

  if (!isset($tuesShift)){
    $tuesQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$tuesday'";
    $shifts = $conn -> query($tuesQuery);
    $tuesShift = $shifts -> fetch();
  }

  if (!isset($wedShift)){
  $wedQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$wednesday'";
  $shifts = $conn -> query($wedQuery);
  $wedShift = $shifts -> fetch();
  }

  if (!isset($thurShift)){
  $thurQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$thursday'";
  $shifts = $conn -> query($thurQuery);
  $thurShift = $shifts -> fetch();
  }

  if (!isset($friShift)){
  $friQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$friday'";
  $shifts = $conn -> query($friQuery);
  $friShift = $shifts -> fetch();
  }

  if (!isset($satShift)){
    $satQuery = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID AND `date`='$saturday'";
    $shifts = $conn -> query($satQuery);
    $satShift = $shifts -> fetch();
  }

  // Get the particular employee to get their info
  if (!isset($employee)){
    $query2 = "SELECT * FROM HR_Tables.Employee WHERE employeeID=$employeeID";
    $return = $conn -> query($query2);
    $employee = $return -> fetch();
  }


  // echo "<link rel='stylesheet' type ='text/css' href='../stylesheets/timesheetStyles.css' />";
?>


<!doctype html>

<html lang="en">
  <head>
    <style>
      <?php include '../stylesheets/timesheetStyles.css'; ?>
    </style>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <meta name="description" content="Computer Software Company">
    <script src="../javascript/timesheetData.js"></script>
  </head>
  <body>

    <header>
      <a href="../pages/user_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/user_home_page.php?employeeID=<?php echo $employeeID ?>">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>" class="current">Timesheet</a></li>
          <li><a href="../pages/requestPage.php?employeeID=<?php echo $employeeID ?>">Requests</a></li>
          <li><a href="../pages/payInfo.php?employeeID=<?php echo $employeeID ?>">Pay Info</a></li>
		      <li><a href="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <p id="startDate" hidden><?php echo $sunday ?></p>
      <p id="endDate" hidden><?php echo $saturday ?></p>
      <div class="employee">
        <h1>Employee: <?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h1>
        <h3>Title:<?php echo $employee['jobTitle']; ?></h3>
        <h3>Employee ID: <?php echo $employeeID ?></h3>
      </div>
      <form action="../db_connection/updateTimesheet.php?employeeID=<?php echo $employeeID ?>" method="post">
        <table>
          <caption id="week">Week of</caption>
          <thead>
            <tr>
              <th>Day</th>
              <th>Date</th>
              <th>Time In</th>
              <th>Lunch</th>
              <th>Lunch End</th>
              <th>Time Out</th>
              <th>Hours Worked</th>
            </tr>
          </thead>
          <tbody>
            <tr class="monday">
              <th class="day">Monday</th>
              <td id="mon_date" class="date" name="mon_date"></td>
              <td class="time_in"><input type="time" id="mon_in" name="mon_in" value="<?php if (!empty($monShift)){ echo $monShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="mon_lunch" name="mon_lunch" value="<?php if (!empty($monShift)){ echo $monShift['lunch'];} ?>" ></td>
              <td class="time_in_lunch"><input type="time" id="mon_lunch_in" name="mon_lunch_in" value="<?php if (!empty($monShift)){ echo $monShift['timeBack'];} ?>" ></td>
              <td class="out"><input type="time" id="mon_out" name="mon_out" value="<?php if (!empty($monShift)){ echo $monShift['timeOut'];} ?>" ></td>
              <td class="total"><input type="text" id="mon_total" name="mon_total" value="<?php if (!empty($monShift)){ echo $monShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="tuesday">
              <th class="day">Tuesday</th>
              <td id="tues_date" class="date" name="tues_date"></td>
              <td class="time_in"><input type="time" id="tues_in" name="tues_in" value="<?php if (!empty($tuesShift)){ echo $tuesShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="tues_lunch" name="tues_lunch" value="<?php if (!empty($tuesShift)){ echo $tuesShift['lunch'];} ?>" ></td>
              <td class="time_in_lunch"><input type="time" id="tues_lunch_in" name="tues_lunch_in" value="<?php if (!empty($tuesShift)){ echo $tuesShift['timeBack'];} ?>" ></td>
              <td class="out"><input type="time" id="tues_out" name="tues_out" value="<?php if (!empty($tuesShift)){ echo $tuesShift['timeOut'];} ?>" ></td>
              <td class="total"><input type="text" id="tues_total" name="tues_total" value="<?php if (!empty($tuesShift)){ echo $tuesShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="wednesday">
              <th class="day">Wednesday</th>
              <td id="wed_date" class="date" name="wed_date"></td>
              <td class="time_in"><input type="time" id="wed_in" name="wed_in" value="<?php if (!empty($wedShift)){ echo $wedShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="wed_lunch" name="wed_lunch" value="<?php if (!empty($wedShift)){ echo $wedShift['lunch'];} ?>" ></td>
              <td class="time_in_lunch"><input type="time" id="wed_lunch_in" name="wed_lunch_in" value="<?php if (!empty($wedShift)){ echo $wedShift['timeBack'];} ?>" ></td>
              <td class="out"><input type="time" id="wed_out" name="wed_out" value="<?php if (!empty($wedShift)){ echo $wedShift['timeOut'];} ?>" ></td>
              <td class="total"><input type="text" id="wed_total" name="wed_total" value="<?php if (!empty($wedShift)){ echo $wedShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="thursday">
              <th class="day">Thursday</th>
              <td id="thur_date" class="date" name="thur_date"></td>
              <td class="time_in"><input type="time" id="thur_in" name="thur_in" value="<?php if (!empty($thurShift)){ echo $thurShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="thur_lunch" name="thur_lunch" value="<?php if (!empty($thurShift)){ echo $thurShift['lunch'];} ?>"></td>
              <td class="time_in_lunch"><input type="time" id="thur_lunch_in" name="thur_lunch_in" value="<?php if (!empty($thurShift)){ echo $thurShift['timeBack'];} ?>"></td>
              <td class="out"><input type="time" id="thur_out" name="thur_out" value="<?php if (!empty($thurShift)){ echo $thurShift['timeOut'];} ?>"></td>
              <td class="total"><input type="text" id="thur_total" name="thur_total" value="<?php if (!empty($thurShift)){ echo $thurShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="friday">
              <th class="day">Friday</th>
              <td id="fri_date" class="date" name="fri_date"></td>
              <td class="time_in"><input type="time" id="fri_in" name="fri_in" value="<?php if (!empty($friShift)){ echo $friShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="fri_lunch" name="fri_lunch" value="<?php if (!empty($friShift)){ echo $friShift['lunch'];} ?>"></td>
              <td class="time_in_lunch"><input type="time" id="fri_lunch_in" name="fri_lunch_in" value="<?php if (!empty($friShift)){ echo $friShift['timeBack'];} ?>"></td>
              <td class="out"><input type="time" id="fri_out" name="fri_out" value="<?php if (!empty($friShift)){ echo $friShift['timeOut'];} ?>"></td>
              <td class="total"><input type="text" id="fri_total" name="fri_total" value="<?php if (!empty($friShift)){ echo $friShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="saturday">
              <th class="day">Saturday</th>
              <td id="sat_date" class="date" name="sat_date"></td>
              <td class="time_in"><input type="time" id="sat_in" name="sat_in" value="<?php if (!empty($satShift)){ echo $satShift['timeIn'];} ?>" ></td>
              <td class="lunch"><input type="time" id="sat_lunch" name="sat_lunch" value="<?php if (!empty($satShift)){ echo $satShift['lunch'];} ?>" ></td>
              <td class="time_in_lunch"><input type="time" id="sat_lunch_in" name="sat_lunch_in" value="<?php if (!empty($satShift)){ echo $satShift['timeBack'];} ?>" ></td>
              <td class="out"><input type="time" id="sat_out" name="sat_out" value="<?php if (!empty($satShift)){ echo $satShift['timeOut'];} ?>" ></td>
              <td class="total"><input type="text" id="sat_total" name="sat_total" value="<?php if (!empty($satShift)){ echo $satShift['total'];} ?>" readonly></td>
            </tr>
            <tr class="sunday">
              <th class="day">Sunday</th>
              <td id="sun_date" class="date" name="sun_date"></td>
              <td class="time_in"><input type="time" id="sun_in" name="sun_in" value="<?php if (!empty($sunShift)){ echo $sunShift['timeIn'];} ?>"></td>
              <td class="lunch"><input type="time" id="sun_lunch" name="sun_lunch" value="<?php if (!empty($sunShift)){ echo $sunShift['lunch'];} ?>" ></td>
              <td class="time_in_lunch"><input type="time" id="sun_lunch_in" name="sun_lunch_in" value="<?php if (!empty($sunShift)){ echo $sunShift['timeBack'];} ?>" ></td>
              <td class="out"><input type="time" id="sun_out" name="sun_out" value="<?php if (!empty($sunShift)){ echo $sunShift['timeOut'];} ?>" ></td>
              <td class="total"><input type='text' id="sun_total" name="sun_total" value="<?php if (!empty($sunShift)){ echo $sunShift['total'];} ?>" readonly></td>
            </tr>
          </tbody>
        </table>
        <h2 class="total_hours" id="total_hours">Total Hours: </h2>
        <input id="save_button" type="submit" name="save" value="Save Changes">
      </form>
    </main>


    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
