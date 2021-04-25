<?php
require_once('../db_connection/database.php');
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <link rel="stylesheet" href="../stylesheets/RegConfirmationStyles.css">
    <meta name="description" content="Computer Software Company">
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
      <h2>An employee has been removed from the database. To remove another employee click on the delete button below.</h2>
	  <form action ="../pages/deleteEmpForm.php">
		<input type="submit" value="Delete" class="LogButton">
		</form>

    </main>

    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
