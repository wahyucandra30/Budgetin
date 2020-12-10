<?php
include 'connect.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

session_start();
$id = $_SESSION['currentid'];

$sql = "UPDATE `users` SET `email_address` = '$email', `username` = '$username', 
        `password` = '$password' WHERE `users`.`account_id` = '$id'";

$q = $connection->query($sql);

if($q === TRUE){
    header("Location:../account.php");
}
else{
    echo $connection->error;
}
?>