<html>
<head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <meta name="description" content="Computer Software Company">
 </head>
<body>

<header>

      <img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">

      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/user_home_page.php">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>">Timesheet</a></li>
          <li><a href="../pages/requestPage.php">Requests</a></li>
          <li><a href="../pages/user_home_page.php">Pay Info</a></li>
		  <li><a href="../pages/employee_directory.php" class="current">Employee Directory</a></li>
          <li><a href="../pages/user_home_page.php"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
 </header>

<?php

echo "<link rel='stylesheet' type ='text/css' href='../stylesheets/dirCSS.css' />";
require_once('../db_connection/database.php');

$query = "SELECT * FROM HR_Tables.Employee";
$employees = $conn->query($query);

?>
<main>
<h2>Employee Directory</h2>
<table>
<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>E-Mail Address</th>
	<th>Job Title</th>
	<th></th>
</tr>

<?php foreach ($employees as $employee){?>
<tr>
	<td><?php echo $employee['firstName'];?></td>
	<td><?php echo $employee['lastName'];?></td>
	<td><?php echo $employee['emailAddress'];?></td>
	<td><?php echo $employee['jobTitle'];?></td>
	<td>
	</td>
</tr>
			
<?php }?>
</table>

</main>
<footer>
  <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
</footer>
</body>
</html>