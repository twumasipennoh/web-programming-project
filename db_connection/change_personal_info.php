<?php
require_once('database.php');

if (!isset($employeeID)){
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT); // Gets the employeeID from previous pages
}


// create a variable
$username = filter_input(INPUT_POST, 'username');
$username_error = "";

$email = filter_input(INPUT_POST, 'email');
$email_error = "";

$phone = filter_input(INPUT_POST, 'phone');

$street_addr1 = filter_input(INPUT_POST, 'st1');
$street_addr1_error = "";

$street_addr2 = filter_input(INPUT_POST, 'st2');

$city = filter_input(INPUT_POST, 'city');
$city_error = "";

$state = filter_input(INPUT_POST, 'state');
$state_error = "";

$zip = filter_input(INPUT_POST, 'zip');
$zip_error = "";

$security_q1 = filter_input(INPUT_POST, 'security-q1');

$security_q1_answer = filter_input(INPUT_POST, 'security-q1-answer');
$security_q1_answer_error = "";

$security_q2 = filter_input(INPUT_POST, 'security-q2');

$security_q2_answer = filter_input(INPUT_POST, 'security-q2-answer');
$security_q2_answer_error = "";

$current_password = filter_input(INPUT_POST, 'current-password');
$current_password_error = "";

$password = filter_input(INPUT_POST, 'password');
$password_error = "";

$confirm_password = filter_input(INPUT_POST, 'password2');
$confirm_password_error = "";

$error_message = false;
$successful = "";
$error = "";

//Validate inputs
if ($username == ""){
    $username_error = " This field is required.";
} else {
    $username_check_query = "SELECT * FROM HR_Tables.Employee
          WHERE username=:username;";
    $statement = $conn->prepare($username_check_query);
    $statement->execute([
        'username' => $username
    ]);
    $returned_user = $statement->fetch();
    $statement->closeCursor();

    if( $returned_user != NULL and $returned_user['employeeID'] != $employeeID ){
        $username_error = " This username is already taken";
    }
}

if ($email == ""){
    $email_error = " This field is required.";
    $error_message = true;
} else {
    $email_check_query = "SELECT * FROM HR_Tables.Employee
          WHERE emailAddress=:emailAddress;";
    $statement = $conn->prepare($email_check_query);
    $statement->execute([
        'emailAddress' => $email
    ]);
    $returned_user = $statement->fetch();
    $statement->closeCursor();

    if( $returned_user != NULL and $returned_user['employeeID'] != $employeeID ){
        $email_error = " This email is already taken";
        $error_message = true;
    }
}

//check if security question 1 or security question2 is already in database for user
$sq1_check_query = "SELECT * FROM HR_Tables.Employee
                    WHERE employeeID=:employeeID;";
$statement = $conn->prepare($sq1_check_query);
$statement->execute([
    'employeeID' => $employeeID
]);
$returned_user = $statement->fetch();
$statement->closeCursor();

if($security_q1 != "" and $returned_user['securityQuestion1'] != $security_q1 and $security_q1_answer == ""){
    $security_q1_answer_error = " Please provide answer for new security question selected.";
    $error_message = true;
}

if($security_q2 != "" and $returned_user['securityQuestion2'] != $security_q2 and $security_q2_answer == ""){
    $security_q2_answer_error = " Please provide answer for new security question selected.";
    $error_message = true;
}

//check if password is valid
if ($current_password != "" and $current_password != $returned_user['password']){
    $current_password_error = "Current password entered is invalid";
    $error_message = true;
}
else if($current_password != "" and $current_password == $password){ //if current pw is entered and it is equal to new password
    $password_error = " New password cannot be the same as current password";
    $error_message = true;
} else if ($current_password != "" and $password == ""){//if current pw is entered but new pw is empty
    $password_error = " New password must be entered";
    $error_message = true;
} else if($current_password == "" and ($password != "" or $confirm_password != "")){ //if new password has been entered but current pw is not entered
    $current_password_error = " Current password must be entered";
    $error_message = true;
} else if ($current_password == "" and $password == "" and $confirm_password == ""){
    $password = $returned_user['password'];
}

if(!$error_message){
        //update employees table
        $update_employee_info_query = 
                        "UPDATE HR_Tables.Employee
                         SET username=:username, password=:password, phoneNumber=:phoneNumber, emailAddress=:emailAddress, 
                         securityQuestion1=:securityQuestion1, securityAnswer1=:securityAnswer1, securityQuestion2=:securityQuestion2,
                         securityAnswer2=:securityAnswer2
                         WHERE employeeID=:employeeID";
        $statement = $conn->prepare($update_employee_info_query);
        $statement->execute([
            'username' => $username,
            'password' => $password,
            'phoneNumber' => $phone,
            'emailAddress' => $email,
            'securityQuestion1' => $security_q1,
            'securityAnswer1' => $security_q1_answer,
            'securityQuestion2' => $security_q2,
            'securityAnswer2' => $security_q2_answer,
            'employeeID' => $employeeID
        ]);
        $returned_user = $statement->fetch();
        $statement->closeCursor();

        //update address table
        $update_address_info_query = 
                        "UPDATE HR_Tables.Address
                         SET streetAddress=:streetAddress, streetAddress2=:streetAddress2, city=:city, state=:state, 
                         zipCode=:zipCode
                         WHERE employeeID=:employeeID";
        $statement = $conn->prepare($update_address_info_query);
        $statement->execute([
            'streetAddress' => $street_addr1,
            'streetAddress2' => $street_addr2,
            'city' => $city,
            'state' => $state,
            'zipCode' => $zip,
            'employeeID' => $employeeID
        ]);
        $returned_user = $statement->fetch();
        $statement->closeCursor();
        
        $successful = "All changes have been saved successfully";
}
else {
    $error = "Changes were not saved";
}

include('../pages/personal_info_page.php');
?>
