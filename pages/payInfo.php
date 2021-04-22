<?php
  include('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  // Get the employee information
  if (!isset($employee)){
    $q = "SELECT * FROM HR_Tables.Employee WHERE employeeID=$employeeID";
    $return = $conn -> query($q);
    $employee = $return -> fetch();
  }

  // Get all the shift the employee has worked
  if (!isset($shifts)){
    $q2 = "SELECT * FROM HR_Tables.timesheetTable WHERE employeeID=$employeeID";
    $shifts = $conn -> query($q2);
    // $shifts = $return2 -> fetch();
  }

  $pay = $employee['wage'];
?>

<!-- ******************************************************************************************* -->

<!doctype html>

<html lang="en">
  <head>
    <style>
      <?php include '../stylesheets/payInfoStyles.css'; ?>
    </style>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <!-- <link rel="stylesheet" href="../stylesheets/timesheetStyles.css" type="text/css"> -->
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
          <li><a href="../pages/user_home_page.php?employeeID=<?php echo $employeeID ?>">Pay Info</a></li>
		      <li><a href="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="employee">
        <h1>Shifts Worked - <?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h1>
        <?php if (!empty($pay)){?>
          <h3>Hourly Wage: <?php echo $employee['wage']; ?></h3>
        <?php } ?>
      </div>
      <table>
        <caption>Search dates:<input type="date" name="searchStart"><input type="date" name="searchEnd"></caption>
        <thead>
          <tr>
            <th>Date</th>
            <th>Hours Worked</th>
            <th>Net Pay</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($shifts as $shift){?>
            <tr>
              <td><?php echo $shift['date']; ?></td>
              <td><?php echo $shift['total']; ?></td>
              <td>$<?php
                $split = explode(':' , $shift['total']);
                $worked = (int)$split[0] + ((int)$split[1] / 60);
                echo number_format((float)($worked * $pay), 2, '.', ' ' )  ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </main>


    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
