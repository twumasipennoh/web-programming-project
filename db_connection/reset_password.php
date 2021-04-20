<?php
require_once('database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// create a variable
$usernameOrEmail = filter_input(INPUT_POST, 'username/email');
$_SESSION['usernameOrEmail'] = $usernameOrEmail;
$error = "";

//Execute the query
$query = "SELECT * FROM HR_Tables.Employee
          WHERE username=:username or emailAddress=:email";
$statement = $conn->prepare($query);
$statement->execute([
    'username' => $usernameOrEmail,
    'email' => $usernameOrEmail
]);
$returned_user = $statement->fetch();
$statement->closeCursor();

if($returned_user == NULL){ //if provided username and password is wrong
    //Display the password reset page with an error message
    $error = "Invalid username or email";
    include('../pages/password_reset.php');
} else{
    //Display the logged in homepage
    $securityQuestion1 = $returned_user['securityQuestion1'];
    $securityAnswer1 = $returned_user['securityAnswer1'];
    $securityQuestion2 = $returned_user['securityQuestion2'];
    $securityAnswer2 = $returned_user['securityAnswer2'];
    include('../pages/change_password.php');
}

?>