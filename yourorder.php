<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}


$oid = $_GET['orderid'];
$grand_total = $_GET['amount'];
$date_time = $_GET['d'];

include("connection.php");

$result = mysqli_query($con,"select * from ".$oid." ;");


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
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Your order on <?php echo $date_time;?>hrs </h3>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col">
                
                
                
                <table class="table table-dark table-borderless">
                    <thead>
                        <tr>
                          <th scope="col">Slno</th>
                          <th scope="col">Product name</th>
                          <th scope="col">Product Code</th>
                          <th scope="col">Rate</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       for($i=1;$i<=mysqli_num_rows($result);$i++){
                           $order_data= mysqli_fetch_array($result);
                           ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $order_data['pname'] ?></td>
                            <td><?php echo $order_data['pid'] ?></td>
                            <td><?php echo $order_data['rate'] ?></td>
                            <td><?php echo $order_data['quantity'] ?></td>
                            <td><?php echo $order_data['amount'] ?></td>
                        </tr>
                        
                        <?php
                               
                            }
                        ?>
                        <tr>
                            <td colspan="5"><strong><h5>Grand Total</h5></strong></td>
                            <td><strong><h5><?php echo $grand_total; ?></h5></strong></td>
                        </tr>
                    </tbody>
                </table>
                
                
                
                
            </div>
        </div>
    </div>
    
    
    <div class="container" style="margin-bottom:15px;">
        <div class="row">
            <div class="col">
                <a href="order-history.php" class="btn btn-secondary">Back to Orders</a>
            </div>
            <div class="col">
                <a href="products.php" class="btn btn-secondary float-right">Order Products</a>
            </div>
        </div>
    </div>
    
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>