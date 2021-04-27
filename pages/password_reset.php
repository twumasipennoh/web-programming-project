<html lang="en">
<head>
	<title>Artec - Change Password</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
	<script src="../javascript/validateResetPasswordForm.js"></script>
</head>

<body>
	<header>
		<a href="../pages/user_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/welcome_page.html">Home</a></li>
          			<li><a href="../pages/registrationCheck.php">Register</a></li>
          			<li><a href="../pages/login.php" class="current">Login</a></li>
				</ul>
			</nav>
	</header>

	<main>
		<h3>Reset Password</h3>
        <p style="text-align: center;">Please enter your email address or username to request a password reset.</p>
        
		<p id="error-message"><?php 
								if(isset($error) and $error != ""){
									echo $error;
									$error = "";
								}
							  ?>
		</p>
		<form id="reset-password" action="..\db_connection\reset_password.php" method="post" onsubmit="return validateResetPasswordForm()">
			<label style="width: 210px; margin-left: 130px;" for ="username/email">Username or Email Address:</label>
			<input type="text" name="username/email" id="username/email"><span id ="unerror"></span><br>

			<input style="margin-left: 445px;" type="submit" id="reset-button" value="Reset Password">
        </form>
	</main>

	<footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
</body>
</html>