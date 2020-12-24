<?php

if(!isset($_SESSION['admin'])){
    header('location:login.html');
} //check submit post down here
//if(!isset($_POST['submit'])){
//    header('location:userlist.php');
//}

$cid=$_POST['cid'];
//$fname=$_POST['fname'];
//$lname=$_POST['lname'];
$sname=$_POST['sname'];
$address1=$_POST['address1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$password=$_POST['password'];

include("connection.php");

$q ="update users set sname='$sname',
address1='$address1',
mobile='$mobile',
email='$email',
city='$city',
state='$state',
password='$password',
pincode=".$pincode."
where cid =".$cid.";" ;

$status = mysqli_query($con,$q);

mysqli_close($con);

if ($status==1)
    header('location:edituser.php?id='.$cid);
    
else
    echo "some error occured... try again";
?>