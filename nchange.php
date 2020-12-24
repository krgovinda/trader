<?php

//if(!isset($_POST['submit'])){
//    header('location:signup.html');
//}
if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

session_start();

$cur_password = $_POST['cpwd'];
$new_password = $_POST['npwd'];

include("connection.php");

$q = "select * from users where mobile='".$_SESSION['userid']."' && password='$cur_password';";
$result = mysqli_query($con,$q);
$rows = mysqli_num_rows($result);

if($rows==1){
    $query = "update users set password ='$new_password' where cid =".$_SESSION['usercode'].";";
    $res =mysqli_query($con,$query) or die(mysqli_error($con));
    session_destroy();
    header('location:login.html');
}
else{
    echo "something went wrong...";
}




?>