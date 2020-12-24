<?php

$mobile =$_GET['user'];


include("connection.php");

$q = "select * from users where mobile=".$mobile.";";
$result = mysqli_query($con,$q);
$rows = mysqli_num_rows($result);

if($rows==1){
    echo "Looks good so far";
}

?>