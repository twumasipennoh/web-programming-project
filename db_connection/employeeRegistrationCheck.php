<?php
require_once('database.php');

// create a variable
$employee_ID = filter_input(INPUT_POST, 'eID',
                            FILTER_VALIDATE_INT);
$username = filter_input(INPUT_POST, 'username');
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');

//Search DB
$query1 = 'SELECT * FROM HR_Tables.Employee WHERE employeeID = :employeeID;
            username = :username, firstName = :firstName, lastName = :lastName';

$statement = $conn->prepare($query1);
$statement->execute([
  'employeeID' => $employee_ID,
  'username'=>$username,
  'firstName'=>$first_name,
  'lastName'=>$last_name
]);
$returned_user = $statement->fetch();

if($returned_user != NULL){
    $returned_user = true;
}



//Display the Confirmation Page
if(!$returned_user){

  $error = "Error:Wrong credintials used on you are not in the databse";
  include('../pages/registration_error.php');

} else{
     include('..\pages\Registration.php');
}


?>
