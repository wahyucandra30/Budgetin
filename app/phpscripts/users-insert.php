<?php
include 'connect.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$birth = $_POST['birth'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (first_name, last_name, birth_date, username, email_address, password)
        Values ('$fname', '$lname', '$birth', '$username', '$email', '$password')";
$q = $connection->query($sql);

if($q === TRUE){
    header("Location:../registration-successful.html");
}
else{
    echo $connection->error;
}
?>