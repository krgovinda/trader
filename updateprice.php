<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

$slno = $_POST['slno'];
$price = $_POST['productprice'];

include("connection.php");

for($i=0;$i<sizeof($slno);$i++){
    $query = "update product_price set price = ".$price[$i]." where slno = ".$slno[$i].";";
    $status = mysqli_query($con,$query) or die(mysqli_error($con));
}
if($status == 1){
    header('location:editproducts.php');
}

?>