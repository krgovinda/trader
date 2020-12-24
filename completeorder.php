<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

$oid = $_GET['oid'];
$do =$_GET['boolean'];

include("connection.php");

if($do==0){
    $query = "update orders set done = 1 where oid ='".$oid."';";
}

$result = mysqli_query($con,$query) or die(mysqli_error());
if($result==1){
    header('location:orderlist.php');
}

?>