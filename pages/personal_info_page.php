<?php  
  require_once('../db_connection/database.php');

  if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
  }

  // Get the particular employee to get their info
  if (!isset($employee)){
    $query2 = "SELECT * FROM HR_Tables.Employee WHERE employeeID=$employeeID";
    $return = $conn -> query($query2);
    $employee = $return -> fetch();
  }

  $query3 = "SELECT * FROM HR_Tables.Address WHERE employeeID=$employeeID";
  $return = $conn -> query($query3);
  $address = $return -> fetch();
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Artec</title>
    <link rel="shortcut icon" href="../images/logo_icon.ico">
    <link rel="stylesheet" href="../stylesheets/personalInfoStyles.css">
    <meta name="description" content="Computer Software Company">
    <script src="../javascript/validatePersonalInfo.js"></script>
  </head>
  <body>

    <header>
      <a href="../pages/user_home_page.php"><img id="logo" src="../images/artec_logo.png" alt="Company Logo" width="100"></a>
      <nav id="nav_menu">
        <ul>
          <li><a href="../pages/user_home_page.php?employeeID=<?php echo $employeeID ?>">Home</a></li>
          <li><a href="../pages/timesheet.php?employeeID=<?php echo $employeeID ?>">Timesheet</a></li>
          <li><a href="../pages/requestPage.php?employeeID=<?php echo $employeeID ?>">Requests</a></li>
          <li><a href="../pages/payInfo.php?employeeID=<?php echo $employeeID ?>">Pay Info</a></li>
		      <li><a href="../pages/employee_directory.php?employeeID=<?php echo $employeeID ?>">Employee Directory</a></li>
          <li><a href="../pages/personal_info_page.php?employeeID=<?php echo $employeeID ?>"><img src="../images/profile_img.png" alt="Profile Image" width="30"></a></li>
          <li><a href="../pages/welcome_page.html">Log out</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div id="title">
        <h1>Personal Information</h1>
      </div>

      <div class="info">
        <h2>Employee: <?php echo $employee['firstName'] . " " . $employee['lastName']; ?></h2>
        <h3>Title: <?php echo $employee['jobTitle']; ?></h3>
        <h3>Employee ID: <?php echo $employeeID ?></h3>
      </div>

      <form id="change-personal-info" action="../db_connection/change_personal_info.php?employeeID=<?php echo $employeeID ?>" onsubmit="return validatePersonalInfo()" method="post">
        <div class="info">
          <p style="color: red" id="error-message"><?php 
                  if(isset($error) and $error != ""){
                    echo $error;
                    $error = "";
                  }
                  ?>
          </p>
          <p style="color: green" id="success-message">
                <?php 
                  if(isset($successful) and $successful != ""){
                    echo $successful;
                    $successful = "";
                  }
                ?>
          </p>
          <h2>Change Basic Information</h2>
            <label for ="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $employee['username']; ?>">
            <span class="error" id ="unerror">
                <?php 
                  if(isset($username_error) and $username_error != ""){
                    echo $username_error;
                    $username_error = "";
                  }
                ?>
            </span><br>

            <label for="email">E-Mail:</label>
            <input type="email" id ="email" name="email" value="<?php echo $employee['emailAddress']; ?>">
            <span style="color: red" class="error" id ="emailerror">
                <?php 
                  if(isset($email_error) and $email_error != ""){
                    echo $email_error;
                    $email_error = "";
                  }
                ?>
            </span><br>
            
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $employee['phoneNumber']; ?>"><span id ="phoneerror"></span><br>

            <label for="st1">Street Address 1:</label>
            <input type="text" id="st1" name="st1" value="<?php echo $address['streetAddress']; ?>">
            <span style="color: red" class="error" id ="streeterror">
                <?php 
                  if(isset($street_addr1_error) and $street_addr1_error != ""){
                    echo $street_addr1_error;
                    $street_addr1_error = "";
                  }
                ?>
            </span><br>

            <label for="st2">Street Address 2:</label>
            <input type="text" id="st2" name="st2" value="<?php echo $address['streetAddress2']; ?>"><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo $address['city']; ?>"><span class="error" id ="cityerror"></span><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="<?php echo $address['state']; ?>"><span class="error" id ="stateerror"></span><br>

            <label for="zip">Zip Code:</label>
            <input type="text" id="zip" name="zip" value="<?php echo $address['zipCode']; ?>"><span class="error" id ="zipCodeerror"></span><br>
        </div>

        <div class="info">
          <h2>Change Security Questions</h2>
            <label for="security-q1">Security Question 1: </label>
            <select name="security-q1" id="security-q1">
              <option value="" selected></option>
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
            <input type="text" id="security-q1-answer" name="security-q1-answer">
            <span style="color: red" class="error" id ="sec-q1-error">
                <?php 
                  if(isset($security_q1_answer_error) and $security_q1_answer_error != ""){
                    echo $security_q1_answer_error;
                    $security_q1_answer_error = "";
                  }
                ?>
            </span><br>

            <label for="security-q2">Security Question 2: </label>
            <select name="security-q2" id="security-q2">
              <option value="" selected></option>
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
            <input type="text" id="security-q2-answer" name="security-q2-answer">
            <span style="color: red" class="error" id ="sec-q2-error">
                <?php 
                  if(isset($security_q2_answer_error) and $security_q2_answer_error != ""){
                    echo $security_q2_answer_error;
                    $security_q2_answer_error = "";
                  }
                ?>
            </span><br>
        </div>

        <div class="info">
          <h2>Change Password</h2>
            <label for ="current-password">Current Password:</label>
            <input type="password" name="current-password" id="current-pw">
            <span style="color: red" class="error" id ="current-pw-error">
                <?php 
                  if(isset($current_password_error) and $current_password_error != ""){
                    echo $current_password_error;
                    $current_password_error = "";
                  }
                ?>   
            </span><br>

            <label for ="password">New Password:</label>
            <input type="password" name="password" id="pw">
            <span style="color: red" class="error" id ="pwerror">
                <?php 
                  if(isset($password_error) and $password_error != ""){
                    echo $password_error;
                    $password_error = "";
                  }
                ?> 
            </span><br>

            <label for ="password2">Confirm New Password:</label>
            <input type="password" name="password2" id ="pw2">
            <span style="color: red" class="error" id ="pw2error">
                <?php 
                  if(isset($confirm_password_error) and $confirm_password_error != ""){
                    echo $confirm_password_error;
                    $confirm_password_error = "";
                  }
                ?> 
            </span><br>

            <input id="save-button" type="submit" value="Save All Changes">
        </div>
      </form>
    </main>


    <footer>
      <p>Copyright &copy; 2021 Artec, Inc. All rights reserved.</p>
    </footer>
  </body>
</html>
