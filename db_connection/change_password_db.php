<?php
require_once('database.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// create a variable
// if (!isset($securityAnswer1)){
//     $securityAnswer1 = filter_input(INPUT_GET, 'securityAnswer1'); // Gets securityAnswer2 from previous pages
// }
// if (!isset($securityAnswer2)){
//     $securityAnswer2 = filter_input(INPUT_GET, 'securityAnswer2'); // Gets securityAnswer2 from previous pages
// }
// if (!isset($usernameOrEmail)){
//     $usernameOrEmail = filter_input(INPUT_GET, 'usernameOrEmail'); // Gets securityAnswer2 from previous pages
// }
$securityQuestion1 = $_SESSION['securityQuestion1'];
$securityQuestion2 = $_SESSION['securityQuestion2'];
$securityAnswer1 = $_SESSION['securityAnswer1'];
$securityAnswer2 = $_SESSION['securityAnswer2'];
$usernameOrEmail = $_SESSION['usernameOrEmail'];
$userAnswer1 = filter_input(INPUT_POST, 'security_ans1');
$userAnswer2 = filter_input(INPUT_POST, 'security_ans2');
$newPassword = filter_input(INPUT_POST, 'new_password');
$error = "";

if( (strcasecmp($securityAnswer1, $userAnswer1) == 0) and (strcasecmp($securityAnswer2, $userAnswer2) == 0) ){
    //Execute the query
    $query = "UPDATE HR_Tables.Employee
              SET password=:password
              WHERE username=:username or emailAddress=:email";
    $statement = $conn->prepare($query);
    $statement->execute([
    'password'=> $newPassword,
    'username' => $usernameOrEmail,
    'email' => $usernameOrEmail
    ]);
    $returned_user = $statement->fetch();
    $statement->closeCursor();
    include('../pages/change_password_confirmation.html');
} else {
    $error = "Invalid answer for Security Question 1 or Security Question 2. Please try again.";
    include('../pages/change_password.php');
}

?>