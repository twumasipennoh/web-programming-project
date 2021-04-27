<?php
  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <meta name="description" content="Computer Software Company">
 </head>
<body>

<header>

	<a href="../pages/admin_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>

      <nav id="nav_menu">
        <ul>
			<li><a href="../pages/admin_home_page.php?employeeID=<?php echo $employeeID ?>">Home</a></li>
			<li><a href="../pages/adminRequestPage.php?employeeID=<?php echo $employeeID ?>">Requests</a></li>

			<li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
			<li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
 </header>

<?php


echo "<link rel='stylesheet' type ='text/css' href='../stylesheets/dirCSS.css' />";
require_once('../db_connection/database.php');

if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
}


?>
<main>
<h2>Employee Directory</h2>
<p>Use the dropdown and the search bar to filter your results. To return to the full directory list after filtering, select 'None' in the dropdown and leave the searchbar blank.</p>

<!-- <?php echo $_SERVER['PHP_SELF'];?> -->
<form action="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>" name="filter" method="POST">
	<label for ="FilterBy">Filter directory by:</label>
	<select name ="FilterBy">
		<option value="nan">None</option>
		<option value="title">Job Title</option>
		<option value="firstname">First Name</option>
		<option value="lastname">Last Name</option>
	</select>
	<label for ="search">Enter keyword to search within the filter you chose: </label>
	<input type="text" name="search">
	<input type="submit" name="fsubmit">
</form>


<table>
<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>E-Mail Address</th>
	<th>Job Title</th>
	<th></th>
</tr>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && isset($_POST['FilterBy'])) {

	if($_POST['FilterBy'] == 'title'){
		$query = "SELECT * FROM HR_Tables.Employee WHERE jobTitle ='" . $_POST['search'] ."'";
		$employees = $conn->query($query);


	}
	elseif($_POST['FilterBy'] == 'firstname'){
		$query = "SELECT * FROM HR_Tables.Employee WHERE firstName ='" . $_POST['search']."'";
		$employees = $conn->query($query);


	}
	elseif($_POST['FilterBy'] == 'lastname'){
		$query = "SELECT * FROM HR_Tables.Employee WHERE lastName ='" . $_POST['search']."'";
		$employees = $conn->query($query);


	}
	else{

		$query = "SELECT * FROM HR_Tables.Employee";
		$employees = $conn->query($query);

	}

}

else {
	$query = "SELECT * FROM HR_Tables.Employee";
	$employees = $conn->query($query);


}

?>
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
<?php

unset($_POST['FilterBy']);
unset($_POST['search']);

?>
</main>
<footer>
  <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
</footer>
</body>
</html>
