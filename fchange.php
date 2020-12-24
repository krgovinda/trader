<?php

//if(!isset($_POST['submit'])){
//    header('location:signup.html');
//}

session_start();

$new_password = $_POST['npwd'];

include("connection.php");

$query = "update users set password ='$new_password' where cid =".$_SESSION['guest'].";";

    
mysqli_query($con,$query) or die(mysqli_error($con));



session_destroy();
header('location:login.html');

?>