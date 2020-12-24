<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

$cid = $_GET['id'];

include("connection.php");

$query = "DELETE FROM users WHERE cid =".$cid.";";
$result = mysqli_query($con,$query) or die(mysqli_error());
if($result==1){
    header('location:userlist.php');
}
?>