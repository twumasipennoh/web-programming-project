<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <link rel="stylesheet" href="../stylesheets/addEmpCss.css">
    <meta name="description" content="Computer Software Company">
    <script src="../javascript/deleteEmp.js"></script>
  </head>
  <body>

    <header>
      <img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100">
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/admin_home_page.html">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>" class="current">Timesheet</a></li>
          <li><a href="../pages/requestPage.html">Requests</a></li>
          <li><a href="../pages/admin_home_page.html">Pay Info</a></li>
          <li><a href="../pages/admin_home_page.html"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>

        </ul>
      </nav>
    </header>
    <main>
     <h3>Employee Deletion Portal</h3>
     <p>Fields marked with an asterisk(*) are required.</p>
     <br>

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

    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
    </body>
    </html>
