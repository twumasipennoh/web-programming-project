<?php
  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }
?>

<!doctype html>

<html lang="en">
  <head>
    <style>
      <?php include '../stylesheets/homeStyles.css'; ?>
    </style>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <!-- <link rel="stylesheet" href="../stylesheets/homeStyles.css"> -->
    <meta name="description" content="Computer Software Company">
  </head>

  <body>
    <header>

      <a href="../pages/user_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>

      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/user_home_page.php?employeeID=<?php echo $employeeID ?>" class="current">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>">Timesheet</a></li>
          <li><a href="../pages/requestPage.php?employeeID=<?php echo $employeeID ?>">Requests</a></li>
          <li><a href="../pages/payInfo.php?employeeID=<?php echo $employeeID ?>">Pay Info</a></li>
		      <li><a href="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <!-- <h1 name="employeeID" hidden><?php echo $employeeID ?></h1> -->
      <h1 class="right">Work Hard.</h1>
      <h1 class="right">Make It Happen.</h1>
      <p>Our goal is to help you achieve your goals and making the journey there as simple as possible. Here you will be able to keep track of everything from timesheets to your W-2. Just let us know if you have any questions.</p>
    </main>

    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
