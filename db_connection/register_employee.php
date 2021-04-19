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
$phone_number = filter_input(INPUT_POST, 'phone');
$street_addr1 = filter_input(INPUT_POST, 'st1');
$street_addr2 = filter_input(INPUT_POST, 'st2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip_code = filter_input(INPUT_POST, 'zip');

//Execute the query
$query = "INSERT INTO HR_Tables.Employee
            (employeeID, firstName, lastName, username, password, phoneNumber, emailAddress) 
        VALUES 
            (:employeeID, :firstName, :lastName, :username, :password, :phoneNumber, :emailAddress)";
$statement = $conn->prepare($query);
$statement->execute([
    'employeeID' => $employee_ID,
    'firstName' => $first_name,
    'lastName' => $last_name,
    'username' => $username,
    'password' => $password,
    'phoneNumber' => $phone_number,
    'emailAddress' => $email
]);
$statement->closeCursor();

$query2 = "INSERT INTO HR_Tables.Address
            (employeeID, streetAddress, streetAddress2, city, state, zipCode) 
        VALUES 
            (:employeeID, :streetAddress, :streetAddress2, :city, :state, :zipCode)";
$statement2 = $conn->prepare($query2);
$statement2->execute([
    'employeeID' => $employee_ID,
    'streetAddress' => $street_addr1,
    'streetAddress2' => $street_addr2,
    'city' => $city,
    'state' => $state,
    'zipCode' => $zip_code
]);
$statement2->closeCursor();

//Display the Registration Form (WILL CHANGE TO Confirmation Page) again 
include('..\pages\RegConfirmation.html');

?>