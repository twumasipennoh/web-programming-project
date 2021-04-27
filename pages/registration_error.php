<html lang="en">
<head>
	<title>Artec - Login</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
  <script src="../javascript/RegistrationCheck.js"></script>
</head>

<body>
	<header>
		<img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/welcome_page.html">Home</a></li>

				</ul>
			</nav>
	</header>

	<main>
		<h3>Employee Registration Portal</h3>

		<p id="error-message"><?php echo $error;
							        $error = "";
							  ?>
		</p>
    <form id="registration" action="../db_connection/employeeRegistrationCheck.php" onsubmit="return validateValues()" method="post">
  

      <label for="eID">Username:</label>
      <input type="text" name="username" id="username"><span id ="unerror"></span><br>

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
