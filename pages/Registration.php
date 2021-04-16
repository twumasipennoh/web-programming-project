<html lang="en">
<head>
	<title>Artec - Registration Portal</title>
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
          			<li><a href="../pages/registration.php" class="current">Register</a></li>
          			<li><a href="../pages/login.php">Login</a></li>
				</ul>
			</nav>
	</header>

	<main>
		<h3>Employee Registration Portal</h3>
		<p>Fields marked with an asterisk(*) are required.</p>

		<form id="registration" action="..\db_connection\register_employee.php" method="post">
			<label for="eID">Employee ID:</label>
			<input type="text" name="eID" id="eID" required><span id ="iderror"></span><br>
			<label for="email">E-Mail:</label>
			<input type="email" id ="email" name="email" required><span id ="emailerror"></span><br>
			<label for ="username">Username:</label>
			<input type="text" name="username" id="username" required><span id ="unerror"></span><br>
			<label for ="password">Password:</label>
			<input type="password" name="password" id="pw" required><span id ="pwerror"></span><br>
			<label for ="password2">Confirm Password:</label>
			<input type="password" name="password2" id ="pw2" required><span id ="pw2error"></span><br>
			<label for="fname">First Name:</label>
			<input type="text" name="fname" id="fname" required><span id ="fnerror"></span><br>
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" id="lname" required><span id ="lnerror"></span><br>
			<label for="phone">Phone Number:</label>
			<input type="tel" id="phone" name="phone"><br>
			<label for="st1">Street Address 1:</label>
			<input type="text" id="st1" name="st1"><br>
			<label for="st2">Street Address 2:</label>
			<input type="text" id="st2" name="st2"><br>
			<label for="city">City:</label>
			<input type="text" id="city" name="city"><br>
			<label for="state">State:</label>
			<input type="text" id="state" name="state"><br>
			<label for="zip">Zip Code:</label>
			<input type="text" id="zip" name="zip"><br>

			<input type="submit" id="submit" value="Submit">
			<input type="button" id="resetform" value="Reset">
		</form>
	</main>
</body>
</html>
