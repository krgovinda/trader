<?php

$mobile = $_GET['id'];

include("connection.php");

$q = "select * from users where mobile='$mobile';";
$result = mysqli_query($con,$q);
$rows = mysqli_num_rows($result);

if($rows==1) echo "Exist";
else echo "Doesn't exist";

?>