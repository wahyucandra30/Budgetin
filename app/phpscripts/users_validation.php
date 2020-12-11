<?php
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$selectUser = "SELECT * FROM `users` WHERE `username` = '$username'";

$userQuery = $connection->query($selectUser);

if ($userQuery->num_rows > 0) {
    $row = $userQuery->fetch_assoc();
    $correctPassword = $row["password"];
    session_start();
    $_SESSION["userfound"] = TRUE;

    if($password != $correctPassword)
    {
        session_start();
        $_SESSION["passwordiscorrect"] = FALSE;
        header("Location:../login.php");
    }
    else
    {
        $id = $row["account_id"];

        session_start();
        
        $_SESSION["currentid"] = $id;
        $_SESSION["passwordiscorrect"] = TRUE;
        
        header("Location:../dashboard.php");
    }
}
else{
    session_start();
    $_SESSION["userfound"] = FALSE;
    header("Location:../login.php");
}
?>