<?php
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$selectUser = "SELECT * FROM `users` WHERE `username` = '$username'";

$userQuery = $connection->query($selectUser);

if ($userQuery->num_rows > 0) {
    $row = $userQuery->fetch_assoc();
    $correctPassword = $row["password"];

    if($password != $correctPassword)
    {
         echo("Salah pass");
    }
    else
    {
        $id = $row["account_id"];

        session_start();
        
        $_SESSION["currentid"] = $id;
        
        header("Location:../dashboard.php");
    }
}
else{
    echo "Bruh";
}
?>