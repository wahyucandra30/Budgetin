<?php
include 'connect.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$birth = $_POST['birth'];

session_start();
$id = $_SESSION['currentid'];

$sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', 
        `birth_date` = '$birth' WHERE `users`.`account_id` = '$id'";

$q = $connection->query($sql);

if($q === TRUE){
    header("Location:../account.php");
}
else{
    echo $connection->error;
}
?>