<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

include("connection.php");


$order_result = mysqli_query($con,"select * from orders;");

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
   
<!--   script tags start here-->


           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>
        
        
<!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        
        <style>
            .order_card{
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin-bottom: 5px;
                margin-top: 5px;
                padding: 10px;
            }
        </style>
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
    <div class="container"><div class="row"><div class="col"><h2>Your Order history</h2></div></div></div>
    
    <?php
    
    for($i=1;$i<=mysqli_num_rows($order_result);$i++){
        $order_data= mysqli_fetch_array($order_result);
        
        if($order_data['customer_id'] == $_SESSION['usercode']){
    ?>
    
    <a href="yourorder.php?orderid=<?php echo $order_data['oid']; ?>&amount=<?php echo $order_data['amount']; ?>&d=<?php echo $order_data['date_time_of_order']; ?>" style="color:black"><div class="container order_card">
        
        <div class="row">
            
            <div class="col">
                <h4><strong>Order no : </strong><?php echo $order_data['oid']; ?></h4>
                <h4><strong>Order date : </strong><?php echo $order_data['date_time_of_order']; ?></h4>
                <h4><strong>Amount </strong><?php echo $order_data['amount']; ?></h4>
            </div>

            
        </div>
        
        
    </div></a>
    
    <?php
            }
      }  
    
    $count=0;
    mysqli_data_seek($order_result,0);
    for($i=1;$i<=mysqli_num_rows($order_result);$i++){
        $order_data= mysqli_fetch_array($order_result);
        
        if($order_data['customer_id'] == $_SESSION['usercode']) $count++;
    }
    
    if($count==0) {
    ?>
        <div class="container"><div class="row"><div class="col"><h4>Oops ! Look like you haven't ordered yet.</h4></div></div></div>
    <?php
    }
    
    
    ?>
    
    <div class="container"><div class="row"><div class="col"><a href="products.php" class="btn btn-secondary">Order</a></div></div></div>
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>