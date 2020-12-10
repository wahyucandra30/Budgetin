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
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $birth = $row["birth_date"];
        $email = $row["email_address"];

        session_start();
        
        $_SESSION["currentfname"] = $fname;
        $_SESSION["currentlname"] = $lname;
        $_SESSION["currentbirth"] = $birth;
        $_SESSION["currentusername"] = $username;
        $_SESSION["currentemail"] = $email;
        $_SESSION["currentpassword"] = $username;
        
        header("Location:../dashboard.html");
    }
}
else{
    echo "Bruh";
}
?>