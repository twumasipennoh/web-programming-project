<?php
require_once('database.php');

// create a variable
$employee_ID = filter_input(INPUT_POST, 'eID',
                            FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, 'email');
// $username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');
$jobtitle = filter_input(INPUT_POST,"jobTitle");
$phone_number = filter_input(INPUT_POST, 'phone');
$street_addr1 = filter_input(INPUT_POST, 'st1');
$street_addr2 = filter_input(INPUT_POST, 'st2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip_code = filter_input(INPUT_POST, 'zip');
$security_q1 = filter_input(INPUT_POST, 'security-q1');
$security_ans1 = filter_input(INPUT_POST, 'security-q1-answer');
$security_q2 = filter_input(INPUT_POST, 'security-q2');
$security_ans2 = filter_input(INPUT_POST, 'security-q2-answer');

//Execute the query
$query = "UPDATE HR_Tables.Employee
 SET password=:password, phoneNumber=:phoneNumber, emailAddress=:emailAddress,
 securityQuestion1=:securityQuestion1, securityAnswer1=:securityAnswer1, securityQuestion2=:securityQuestion2,
 securityAnswer2=:securityAnswer2
 WHERE employeeID=:employeeID";
$statement = $conn->prepare($query);
$statement->execute([
'password' => $password,
'phoneNumber' => $phone_number,
'emailAddress' => $email,
'securityQuestion1' => $security_q1,
'securityAnswer1' => $security_ans1,
'securityQuestion2' => $security_q2,
'securityAnswer2' => $security_ans2,
'employeeID' => $employee_ID
]);
$returned_user = $statement->fetch();
$statement->closeCursor();

$query2 ="UPDATE HR_Tables.Address
              SET streetAddress=:streetAddress, streetAddress2=:streetAddress2, city=:city, state=:state,
              zipCode=:zipCode
                WHERE employeeID=:employeeID";
$statement = $conn->prepare($query2);
$statement->execute([
    'streetAddress' => $street_addr1,
    'streetAddress2' => $street_addr2,
    'city' => $city,
    'state' => $state,
    'zipCode' => $zip_code,
    'employeeID' => $employee_ID
]);
$returned_user = $statement->fetch();
$statement->closeCursor();

$successful = "All changes have been saved successfully";

$returned_user = $statement->fetch();

  include('..\pages\RegConfirmation.html');



?>
