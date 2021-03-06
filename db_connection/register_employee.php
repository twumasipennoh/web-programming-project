<?php
require_once('database.php');

// create a variable
$employee_ID = filter_input(INPUT_POST, 'eID',
                            FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
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
$wage = filter_input(INPUT_POST, 'wage');

//Execute the query
$query = "INSERT INTO HR_Tables.Employee
            (firstName, lastName, username, password, jobTitle, phoneNumber, emailAddress,
            securityQuestion1, securityAnswer1, securityQuestion2, securityAnswer2, wage)
        VALUES
            (:firstName, :lastName, :username, :password, :jobTitle, :phoneNumber, :emailAddress,
            :securityQuestion1, :securityAnswer1, :securityQuestion2, :securityAnswer2, :wage)";
$statement = $conn->prepare($query);
$statement->execute([
    // 'employeeID' => $employee_ID,
    'firstName' => $first_name,
    'lastName' => $last_name,
    'username' => $username,
    'password' => $password,
    'jobTitle' => $jobtitle,
    'phoneNumber' => $phone_number,
    'emailAddress' => $email,
    'securityQuestion1' => $security_q1,
    'securityAnswer1' => $security_ans1,
    'securityQuestion2' => $security_q2,
    'securityAnswer2' => $security_ans2,
    'wage' => $wage
]);
$statement->closeCursor();

// $query2 = "INSERT INTO HR_Tables.Address
//             (streetAddress, streetAddress2, city, state, zipCode)
//         VALUES
//             (:streetAddress, :streetAddress2, :city, :state, :zipCode)";
// $statement2 = $conn->prepare($query2);
// $statement2->execute([
//     // 'employeeID' => $employee_ID,
//     'streetAddress' => $street_addr1,
//     'streetAddress2' => $street_addr2,
//     'city' => $city,
//     'state' => $state,
//     'zipCode' => $zip_code
// ]);
// $statement2->closeCursor();

//Display the Confirmation Page
if($jobtitle != Null){
  include('../pages/empAdditionConfirmation.php');
}
?>
