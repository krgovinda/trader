<?php

if(!isset($_POST['submit'])){
    header('location:signup.html');
}

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sname=$_POST['sname'];
$address1=$_POST['address1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$password=$_POST['password'];

$question = $_POST['ques'];
$answer = $_POST['ans2que'];

include("connection.php");

$q = "insert into users (fname,lname,sname,address1,mobile,email,city,state,pincode,password,".$question.") values('$fname','$lname','$sname','$address1','$mobile','$email','$city','$state',$pincode,'$password','$answer');";

$status = mysqli_query($con,$q);

mysqli_close($con);

if ($status==1)
    header('location:login.html');
    
else
    echo "some error occured... try again";
?>