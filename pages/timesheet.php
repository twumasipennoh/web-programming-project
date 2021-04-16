<?php
  require_once('../db_connection/database.php');

  $employeeID = $_GET['employeeID']; // Gets the employeeID from previous pages

  // Get the shifts the employee has worked
  $query = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID";
  $shifts = $conn -> query($query);

  // Get the particular employee to get their info
  $query2 = "SELECT * FROM HR_Tables.Employee WHERE employeeID=$employeeID";
  $return = $conn -> query($query2);
  $employee = $return -> fetch();
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <link rel="stylesheet" href="../stylesheets/timesheetStyles.css">
    <meta name="description" content="Computer Software Company">
    <script src="../javascript/timesheetData.js"></script>
  </head>
  <body>

    <header>
      <img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/user_home_page.php">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>" class="current">Timesheet</a></li>
          <li><a href="../pages/requestPage.html">Requests</a></li>
          <li><a href="../pages/user_home_page.php">Pay Info</a></li>
          <li><a href="../pages/user_home_page.php"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="employee">
        <h1>Employee: <?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h1>
        <h3>Title:<?php echo $employee['jobTitle']; ?></h3>
        <h3>Employee ID: <?php echo $employeeID ?></h3>
      </div>
      <form action="../db_connection/updateTimesheet.php" method="post">
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
            <tr class="sunday">
              <th class="day">Sunday</th>
              <td id="sun_date" class="date" name="sun_date"></td>
              <td class="time_in"><input type="time" id="sun_in" name="sun_in" required></td>
              <td class="lunch"><input type="time" id="sun_lunch" name="sun_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="sun_lunch_in" name="sun_lunch_in" required></td>
              <td class="out"><input type="time" id="sun_out" name="sun_out" required></td>
              <td id="sun_total" class="total" name="sun_total"></td>
            </tr>
            <tr class="monday">
              <th class="day">Monday</th>
              <td id="mon_date" class="date" name="mon_date"></td>
              <td class="time_in"><input type="time" id="mon_in" name="mon_in" required></td>
              <td class="lunch"><input type="time" id="mon_lunch" name="mon_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="mon_lunch_in" name="mon_lunch_in" required></td>
              <td class="out"><input type="time" id="mon_out" name="mon_out" required></td>
              <td id="mon_total" class="total" name="mon_total"></td>
            </tr>
            <tr class="tuesday">
              <th class="day">Tuesday</th>
              <td id="tues_date" class="date" name="tues_date"></td>
              <td class="time_in"><input type="time" id="tues_in" name="tues_in" required></td>
              <td class="lunch"><input type="time" id="tues_lunch" name="tues_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="tues_lunch_in" name="tues_lunch_in" required></td>
              <td class="out"><input type="time" id="tues_out" name="tues_out" required></td>
              <td id="tues_total" class="total" name="tues_total"></td>
            </tr>
            <tr class="wednesday">
              <th class="day">Wednesday</th>
              <td id="wed_date" class="date" name="wed_date"></td>
              <td class="time_in"><input type="time" id="wed_in" name="wed_in" required></td>
              <td class="lunch"><input type="time" id="wed_lunch" name="wed_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="wed_lunch_in" name="wed_lunch_in" required></td>
              <td class="out"><input type="time" id="wed_out" name="wed_out" required></td>
              <td id="wed_total" class="total" name="wed_total"></td>
            </tr>
            <tr class="thursday">
              <th class="day">Thursday</th>
              <td id="thur_date" class="date" name="thur_date"></td>
              <td class="time_in"><input type="time" id="thur_in" name="thur_in" required></td>
              <td class="lunch"><input type="time" id="thur_lunch" name="thur_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="thur_lunch_in" name="thur_lunch_in" required></td>
              <td class="out"><input type="time" id="thur_out" name="thur_out" required></td>
              <td id="thur_total" class="total" name="thur_total"></td>
            </tr>
            <tr class="friday">
              <th class="day">Friday</th>
              <td id="fri_date" class="date" name="fri_date"></td>
              <td class="time_in"><input type="time" id="fri_in" name="fri_in" required></td>
              <td class="lunch"><input type="time" id="fri_lunch" name="fri_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="fri_lunch_in" name="fri_lunch_in" required></td>
              <td class="out"><input type="time" id="fri_out" name="fri_out" required></td>
              <td id="fri_total" class="total" name="fri_total"></td>
            </tr>
            <tr class="saturday">
              <th class="day">Saturday</th>
              <td id="sat_date" class="date" name="sat_date"></td>
              <td class="time_in"><input type="time" id="sat_in" name="sat_in" required></td>
              <td class="lunch"><input type="time" id="sat_lunch" name="sat_lunch" required></td>
              <td class="time_in_lunch"><input type="time" id="sat_lunch_in" name="sat_lunch_in" required></td>
              <td class="out"><input type="time" id="sat_out" name="sat_out" required></td>
              <td id="sat_total" class="total" name="sat_total"></td>
            </tr>
          </tbody>
        </table>
        <h2 class="total_hours" id="total_hours">Total Hours: 0:00</h2>
        <input id="save_button" type="submit" name="save" value="Save Changes">
      </form>
    </main>


    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
