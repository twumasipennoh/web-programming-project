<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  $query = "SELECT * FROM HR_Tables.requests";
  $requests = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <style>
    <?php include '../stylesheets/adminRequestPagecss.css'; ?>
  </style>
  <meta charset="utf-8">
  <title>Artec</title>
  <link rel="shortcut icon" href="../images/logo_icon.ico">
  <meta name="description" content="Computer Software Company">
  <script src="../javascript/timesheetData.js"></script>
</head>

<body>
<header>
      <img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/admin_home_page.php?employeeID=<?php echo $employeeID ?>">Home</a></li>
          <li><a href="../pages/add_employee.php?employeeID=<?php echo $employeeID ?>">Add Employee</a></li>
          <li><a href="../pages/deleteEmpForm.php?employeeID=<?php echo $employeeID ?>">Delete Employee</a></li>
          <li><a href="../pages/adminRequestPage.php?employeeID=<?php echo $employeeID ?>" class="current">Requests</a></li>
		      <li><a href="../pages/adminEmpDirectory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/admin_home_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>

        </ul>
      </nav>
    </header>

  <main>
    <!-- <h1>Employee Requests</h1> -->
    <!-- <div class="new_request">
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
    </div> -->
    <div class="request_table">
      <table>
        <caption>Employee Requests</caption>
        <thead>
          <tr>
            <th>Employee ID</th>
            <th>Date</th>
            <th class="request">Request</th>
            <th class="status">Status</th>
            <th>Modify</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($requests as $req){ ?>
            <tr>
              <td><?php echo $req['employeeID']; ?></td>
              <td><?php echo $req['date']; ?></td>
              <td class="left"><?php echo $req['reqSubject'] . ":<br>" . $req['details']; ?></td>
              <td><?php echo $req['reqStatus']; ?></td>
              <form action="../db_connection/modRequest.php?employeeID=<?php echo $employeeID; ?>" method="post">
                <td>
                  <input type="hidden" name="id" value="<?php echo $req['employeeID']; ?>">
                  <input type="hidden" name="subject" value="<?php echo $req['reqSubject']; ?>">
                  <select class="status" name="status" onchange="this.form.submit()">
                    <option disabled selected>-- Options --</option>
                    <option value="Pending">Pending</option>
                    <option value="In-Progress">In-Progress</option>
                    <option value="Completed">Completed</option>
                  </select>
                </td>
              </form>
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
