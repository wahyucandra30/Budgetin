<?php
include 'connect.php';

$name = $_POST['name'];
if($name == NULL)
{
    $name = "New Transaction";
}
$type = $_POST['type'];
$income = $_POST['income'];
$expense = $_POST['expense'];
session_start();
$id = $_SESSION['currentid'];

$sql = "INSERT INTO transactions (name, type, total_income, total_expense, account_id)
        Values ('$name', '$type', '$income', '$expense', '$id')";
$q = $connection->query($sql);

if($q === TRUE){
    header("Location:../dashboard.php");
}
else{
    echo $connection->error;
}
?>