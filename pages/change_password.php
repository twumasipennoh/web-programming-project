<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	$_SESSION['securityQuestion1'] = $securityQuestion1;
	$_SESSION['securityQuestion2'] = $securityQuestion2;
	$_SESSION['securityAnswer1'] = $securityAnswer1;
	$_SESSION['securityAnswer2'] = $securityAnswer2;
?>

<html lang="en">
<head>
	<title>Artec - Reset Password</title>
	<link rel="shortcut icon" href="../images/logo_icon.ico">
	<link rel="stylesheet" href="../stylesheets/RegCSS.css">
	<script src="../javascript/validateChangePasswordForm.js"></script>
</head>

<body>
	<header>
		<a href="../pages/user_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>
			<nav id="nav_menu">
				<ul>
					<li><a href="../pages/welcome_page.html">Home</a></li>
          			<li><a href="../pages/registration.php">Register</a></li>
          			<li><a href="../pages/login.php" class="current">Login</a></li>
				</ul>
			</nav>
	</header>

	<main>
		<h3>Change Password</h3>
        <p style="text-align: center;">Please answer the security questions below to verify your identity and change your password.</p>
        
		<p id="error-message"><?php 
								if(isset($error) and $error != ""){
									echo $error;
									$error = "";
								}
							  ?>
		</p>
		<form id="change-password" action="..\db_connection\change_password_db.php" method="post" onsubmit="return validateChangePasswordForm()">
			<label style="width: 450px; text-align: left;">Security Question 1: <?php 
											if(isset($securityQuestion1)){
												echo $securityQuestion1;
											} 
										 ?>
			</label><br>
			<label style="width: 210px;" for="security_ans1">Answer: </label>
			<input type="text" name="security_ans1" id="security_ans1"><span id ="security_ans1_error" class="error"></span><br>

			<label style="width: 450px; text-align: left;">Security Question 2: <?php 
											if(isset($securityQuestion2)){
												echo $securityQuestion2;
											}; 
										 ?>
			</label><br>
			<label style="width: 210px;" for="security_ans2">Answer: </label>
			<input type="text" name="security_ans2" id="security_ans2"><span id ="security_ans2_error" class="error"></span><br><br>

			<label style="width: 210px;" for="new_password">New Password: </label>
			<input type="password" name="new_password" id="new_password">
			<span id ="new_password_error" class="error"></span><br>

			<label style="width: 210px;" for="confirm_password">Confirm Password: </label>
			<input type="password" name="confirm_password" id="confirm_password">
			<span id ="confirm_password_error" class="error"></span><br>
			
			<input style="margin-left: 335px;" type="submit" id="change-password" value="Submit">
        </form>
	</main>
</body>
</html>