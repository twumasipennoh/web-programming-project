<?php
require_once('database.php');

// create a variable
$employee_ID = filter_input(INPUT_POST, 'eID',
                            FILTER_VALIDATE_INT);
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');


$query1 = 'SELECT * FROM HR_Tables.Employee WHERE employeeID = :employeeID; ';

$statement = $conn->prepare($query1);
$statement->execute([
  'employeeID' => $employee_ID,
]);
$returned_user = $statement->fetch();

if($returned_user != NULL){
    $returned_user = true;
}

$statement->closeCursor();

//Execute the query
$query2 = 'DELETE FROM HR_Tables.Employee WHERE employeeID = :employeeID; ';

$statement = $conn->prepare($query2);
$statement->execute([
  'employeeID' => $employee_ID,
]);

//Execute the query
$query3 = 'DELETE FROM HR_Tables.Address WHERE employeeID = :employeeID; ';

$statement = $conn->prepare($query3);
$statement->execute([
  'employeeID' => $employee_ID,
]);


$statement->closeCursor();

if(!$returned_user){

  $error = "Error: Wrong employee name or id ";
  include('../pages/delete_error.php');

} else{
     include('..\pages\DeletionConfirmation.php');
}

?>
