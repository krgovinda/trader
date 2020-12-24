<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:http://localhost/Project-%20Akshay%20traders/login.html');
}

$slno = $_POST['slno'];
$quantity = $_POST['quantity'];


$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'akshay_traders');


$q1 = "select * from products;";
$result = mysqli_query($con,$q1);

$q2 = "select * from product_price;";
$result_price = mysqli_query($con,$q2);


$productdata = mysqli_fetch_array($result);
$product_price = mysqli_fetch_array($result_price);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | Your Orders</title>
    
    <!--     link tags start here-->
     
        <!--    favicon-->
       <link rel="icon" href="images/pidilite_logo.png" type="image/png" >


        <!--   font awesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

          <!--    bootstrap css link-->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!--    layout.css-->
       <link rel="stylesheet" href="css/layout.css">
       
<!--       list.css-->
      <link rel="stylesheet" href="css/list.css">
   
<!--   script tags start here-->


           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>
        
        
<!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    
    
</head>
<body>
   
   <?php echo isset($_POST); 
    for($i=0;$i<=100;$i++){
        echo "\n".$slno[0];
        echo "\n".$quantity[0];
    }
    
    ?>
   
   
    
</body>
</html>