<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

$cid = $_GET['id'];
$admin =$_GET['boolean'];

include("connection.php");

if($admin==0){
    $query = "update users set admin = 1 where cid =".$cid.";";
}

elseif($admin==1){
    $query = "update users set admin = 0 where cid =".$cid.";";
}
$result = mysqli_query($con,$query) or die(mysqli_error());
if($result==1){
    header('location:userlist.php');
}

?>