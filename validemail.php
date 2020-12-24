<?php

$email = $_GET['e'];

include("connection.php");

$q = "select * from users where email='$email';";
$result = mysqli_query($con,$q);
$rows = mysqli_num_rows($result);

if($rows==1) echo "Exist";
else echo "Doesn't exist";
?>