<?php

if(!isset($_POST['submit'])){
    header('location:login.html');
}

session_start();

$mobile = $_POST['mobile'];
$password = $_POST['password'];

include("connection.php");

$q = "select * from users where mobile='$mobile' && password='$password'";
$result = mysqli_query($con,$q);
$rows = mysqli_num_rows($result);

$userdata = mysqli_fetch_array($result);

if($rows==1){
    
    $_SESSION['username'] = $userdata['fname'];
    $_SESSION['userid'] = $userdata['mobile'];
    $_SESSION['usercode'] = $userdata['cid'];
//    $_SESSION['userimg'] = $userdata['image_location'];
    
    if($userdata['admin']==1){
        $_SESSION['admin'] = $userdata['cid'];
    }

    header('location:index.php');
}

else {
    header('location:login.html');
}

?>