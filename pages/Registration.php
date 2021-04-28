<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		<?php include '../stylesheets/RegCSS.css'; ?>
	</style>
	<title>Artec - Registration Portal</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<!-- <link rel="stylesheet" href="../stylesheets/RegCSS.css"> -->
	<script src="../javascript/RegJS.js"></script>

	</script>

</head>

<body>
	<header>
		<img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/welcome_page.html">Home</a></li>
          			<li><a href="../pages/registrationCheck.php" class="current">Register</a></li>
          			<li><a href="../pages/login.php">Login</a></li>
				</ul>
			</nav>
	</header>

	<main>
		<?php
		$username_error = "";
		$email_error = "";
		?>

		<h3>Employee Registration Portal</h3>
		<p>Fields marked with an asterisk(*) are required.</p>
		<form id="registration" action="../db_connection/registrationUpdate.php" onsubmit="return validateValues()" method="post">
			<label for="eID">Employee ID:</label>
			<input type="text" name="eID" id="eID"><span id ="iderror"></span><br>
			<label for="email">E-Mail:</label>
			<input type="email" id ="email" name="email"><span id ="emailerror"></span><br>
			<p id="error-email"><?php echo $email_error;
										$email_error = "";
								  ?>
			</p>
			<!-- <label for ="username">Username:</label>
			<input type="text" name="username" id="username"><span id ="unerror"></span><br>
			<p id="error-username">
			</p> -->
			<label for ="password">Password:</label>
			<input type="password" name="password" id="pw"><span id ="pwerror"></span><br>
			<label for ="password2">Confirm Password:</label>
			<input type="password" name="password2" id ="pw2"><span id ="pw2error"></span><br>

			<!-- <label for="fname">First Name:</label>
			<input type="text" name="fname" id="fname"><span id ="fnerror"></span><br>
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" id="lname"><span id ="lnerror"></span><br> -->

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

			<label for="security-q1">Security Question 1: </label>
			<select name="security-q1" id="security-q1">
				<option value="What elementary school did you attend?">
					What elementary school did you attend?
				</option>
				<option value="In what town or city was your first full time job?">
					In what town or city was your first full time job?
				</option>
				<option value="In what town or city did you meet your spouse or partner?">
					In what town or city did you meet your spouse or partner?
				</option>
				<option value="What was your childhood nickname?">
					What was your childhood nickname?
				</option>
				<option value="What is your mother's middle name?">
					What is your mother's middle name?
				</option>
			</select><br>
			<label for="security-q1-answer">Answer: </label>
			<input type="text" id="security-q1-answer" name="security-q1-answer"><span id ="sec-q1-error"></span><br>

			<label for="security-q2">Security Question 2: </label>
			<select name="security-q2" id="security-q2">
				<option value="In what town or city did your parents meet?">
					In what town or city did your parents meet?
				</option>
				<option value="What was the name of your first pet?">
					What was the name of your first pet?
				</option>
				<option value="What is your favorite movie?">
					What is your favorite movie?
				</option>
				<option value="What is the name of your favorite childhood friend?">
					What is the name of your favorite childhood friend?
				</option>
				<option value="What city or town was your first job in?">
					What city or town was your first job in?
				</option>
			</select><br>
			<label for="security-q2-answer">Answer: </label>
			<input type="text" id="security-q2-answer" name="security-q2-answer"><span id ="sec-q2-error"></span><br>

			<input type="submit" id="submit" value="Submit">
			<input type="button" id="resetform" value="Reset">
		</form>
	</main>

	<footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
</body>
</html>
