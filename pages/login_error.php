<html lang="en">
<head>
	<title>Artec - Login</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
	<script src="../javascript/validateLoginForm.js"></script>
</head>

<body>
	<header>
		<a href="../pages/welcome_page.html"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/welcome_page.html">Home</a></li>
          			<li><a href="../pages/registration.php">Register</a></li>
          			<li><a href="../pages/login.php" class="current">Login</a></li>
				</ul>
			</nav>
	</header>

	<main>
		<h3>Employee Login Portal</h3>

		<p id="error-message"><?php echo $error; 
							        $error = "";
							  ?>
		</p>
		<form id="login" action="..\db_connection\login_employee.php" method="post" onsubmit="return validateLoginForm()">
			<label for ="username">Username:</label>
			<input type="text" name="username" id="username"><span id ="unerror"></span><br>

			
			<label for ="password">Password:</label>
			<input type="password" name="password" id="pw"><span id ="pwerror"></span><br>

			<p id="forgot-password"><a style="text-decoration: none; color: red" href="../pages/password_reset.php">Forgot Password?</a></p>
			<input type="submit" id="login-button" value="Login">
		</form>
	</main>

	<footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
</body>
</html>
