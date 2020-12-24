<?php

//$con = mysqli_connect('localhost','root');
//mysqli_select_db($con,'akshay_traders');


$con = mysqli_connect('localhost','root','','akshay_traders');
if(!$con){
    die ("connection_failed".mysqli_connect_error());
}

//include("connection.php");


//$url = "location:http://localhost/Project-%20Akshay%20traders/";

?>
