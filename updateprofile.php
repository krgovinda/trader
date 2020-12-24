<?php

session_start();
//if(!isset($_SESSION['userid'])){
//    header('location:login.html');
//} //check submit post down here
//if(!isset($_POST['submit'])){
//    header('location:userlist.php');
//}

include("connection.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sname=$_POST['sname'];
$address1=$_POST['address1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];

$q ="update users set fname='$fname',
lname='$lname',
sname='$sname',
address1='$address1',
mobile='$mobile',
email='$email',
city='$city',
state='$state',
pincode=".$pincode."
where cid =".$_SESSION['usercode'].";" ;

$status = mysqli_query($con,$q) or die(mysqli_error($con));

mysqli_close($con);

if ($status==1)
    header('location:customerprofile.php');
    
else
    echo "some error occured... try again";
?>