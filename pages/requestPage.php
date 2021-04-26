<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  $query = "SELECT * FROM HR_Tables.requests WHERE employeeID=$employeeID";
  $requests = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <style>
    <?php include '../stylesheets/requestPagecss.css'; ?>
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
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>">Timesheet</a></li>
          <li><a href="../pages/requestPage.php?employeeID=<?php echo $employeeID ?>" class="current">Requests</a></li>
          <li><a href="../pages/payInfo.php?employeeID=<?php echo $employeeID ?>">Pay Info</a></li>
		      <li><a href="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
  </header>

  <main>
    <div class="new_request">
      <h1>
        Employee Requests
      </h1>
      <br>
      <br>
      <form action="../db_connection/newRequest.php?employeeID=<?php echo $employeeID ?>" method="post">
        <p>Subject:</p>
        <textarea id="subject" name="subject" rows="2" cols="30"></textarea><br><br>
        <p>Submit your request below :</p>
        <textarea id="request" name="request" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit request">
      </form>
    </div>
    <div class="request_table">
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th class="request">Request</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($requests as $req){ ?>
            <tr>
              <td><?php echo $req['date'] ?></td>
              <td class="left"><?php echo $req['reqSubject'] . ":<br>" . $req['details'] ?></td>
              <td><?php echo $req['reqStatus'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
  </footer>

</body>

</html>
