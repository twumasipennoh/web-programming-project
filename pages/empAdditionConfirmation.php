<?php
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <link rel="stylesheet" href="../stylesheets/empAddConfirmCSS.css">
    <meta name="description" content="Computer Software Company">
  </head>

  <body>
  <header>
      <img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/admin_home_page.php?employeeID=<?php echo $employeeID ?>">Home</a></li>
          <li><a href="../pages/add_employee.php?employeeID=<?php echo $employeeID ?>" class="current">Add Employee</a></li>
          <li><a href="../pages/deleteEmpForm.php?employeeID=<?php echo $employeeID ?>">Delete Employee</a></li>
		      <li><a href="../pages/adminRequestPage.php?employeeID=<?php echo $employeeID ?>">Requests</a></li>
          <li><a href="../pages/adminEmpDirectory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/admin_home_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>

        </ul>
      </nav>
    </header>

    <main>
      <h2>Employee has been added into the database. To add another employee click the add button below.</h2>
	  <form action ="../pages/add_employee.php?employeeID=<?php echo $employeeID ?>">
		<input type="submit" value="Add" class="LogButton">
		</form>
	    
<form action ="../pages/adminEmpDirectory.php?employeeID=<?php echo $employeeID ?>">
    <input type="submit" value="View Employee Directory " class="LogButton">
	</main>
    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
