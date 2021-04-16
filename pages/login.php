<html lang="en">
<head>
	<title>Artec - Login</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
	<script src="../javascript/RegJS.js"></script>
</head>

<body>
	<header>
		<img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
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

		<form id="login" action="..\db_connection\login_employee.php" method="post">
			<label for ="username">Username:</label>
			<input type="text" name="username" id="username"><span id ="unerror"></span><br>

			<label for ="password">Password:</label>
			<input type="password" name="password" id="pw"><span id ="pwerror"></span><br>

			<input type="submit" id="login" value="Login">
		</form>
	</main>
</body>
</html>
