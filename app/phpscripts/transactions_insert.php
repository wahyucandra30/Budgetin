<?php
include 'connect.php';

$name = $_POST['name'];
$type = $_POST['type'];
$income = $_POST['income'];
$expense = $_POST['expense'];
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