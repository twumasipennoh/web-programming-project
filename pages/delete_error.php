<html lang="en">
<head>
	<title>Artec - Login</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
  <script src="../javascript/deleteEmp.js"></script>
</head>

<body>
	<header>
		<img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/admin_home_page.html">Home</a></li>
                <img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
                <li><a href="../pages/welcome_page.html">Log out</a></li>

				</ul>
			</nav>
	</header>

	<main>
		<h3>Employee Login Portal</h3>

		<p id="error-message"><?php echo $error;
							        $error = "";
							  ?>
		</p>
    <form id="registration" action="../db_connection/deleteEmp.php" onsubmit="return validateValues()" method="post">
      <label for="eID">Employee ID:</label>
      <input type="text" name="eID" id="eID"><span id ="iderror"></span><br>

      <label for="fname">First Name:</label>
      <input type="text" name="fname" id="fname"><span id ="fnerror"></span><br>

      <label for="lname">Last Name:</label>
      <input type="text" name="lname" id="lname"><span id ="lnerror"></span><br>



      <input type="submit" id="submit" value="Submit">
      <br>
    </form>
	</main>
</body>
</html>
