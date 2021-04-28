 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Artec - Registration Portal</title>
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
          			<li><a href="../pages/registrationCheck.php" class="current">Register</a></li>
          			<li><a href="../pages/login.php">Login</a></li>
				</ul>
			</nav>
	</header>

   	<main>
   		<h3>Employee Registration Portal</h3>
   		<p>Fields marked with an asterisk(*) are required.</p>

   		<form id="registrationCheck" action="../db_connection/employeeRegistrationCheck.php" onsubmit="return validateValues()" method="post">
   			<label for="eID">Employee ID:</label>
   			<input type="text" name="eID" id="eID"><span id ="iderror"></span><br>

   			<label for ="username">Username:</label>
   			<input type="text" name="username" id="username"><span id ="unerror"></span><br>

   			<label for="fname">First Name:</label>
   			<input type="text" name="fname" id="fname"><span id ="fnerror"></span><br>

   			<label for="lname">Last Name:</label>
   			<input type="text" name="lname" id="lname"><span id ="lnerror"></span><br>



   			<input type="submit" id="submit" value="Submit">
   			<input type="button" id="resetform" value="Reset">
   		</form>
   	</main>

	
	<footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
   </body>
   </html>
