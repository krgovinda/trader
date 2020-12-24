<?php

session_start();

//if(!isset($_SESSION['userid'])){
//    header('location:http://localhost/Project-%20Akshay%20traders/login.html');
//}

//$con = mysqli_connect('localhost','root');
//mysqli_select_db($con,'akshay_traders');

include("connection.php");

$q1 = "select * from products;";
$q2 = "select * from product_price;";

$result = mysqli_query($con,$q1);
$rows = mysqli_num_rows($result); 

$result_price = mysqli_query($con,$q2);
$rows_price = mysqli_num_rows($result_price);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders |</title>
    
    
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
    
    <h1>MAXIMUM RETAIL PRICE LIST</h1>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
               
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Products</th>
                      <th scope="col">50 kg</th>
                      <th scope="col">30 kg</th>
                      <th scope="col">20 kg</th>
                      <th scope="col">10 kg</th>
                      <th scope="col">5 kg</th>
                      <th scope="col">2 kg</th>
                      <th scope="col">1 kg</th>
                      <th scope="col">500 g</th>
                      <th scope="col">250 g</th>
                      <th scope="col">125 g</th>
                      <th scope="col">50 g</th>
                      <th scope="col">1 kg pp</th>
                      <th scope="col">500 g pp</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      for($i=0;$i<=$rows;$i++){
                          $productdata = mysqli_fetch_array($result);
                      ?>
                    <tr>
                      <th scope="row"><?php echo ucwords($productdata['products']); ?></th>
                      
                      <?php
                       mysqli_data_seek($result_price,0);
                       for($j=1;$j<=$rows_price;$j++){
                           $productprice = mysqli_fetch_array($result_price);
                        if($productprice['p_id'] == $productdata['pid']){ 
                                ?>
                      <td><?php echo $productprice['price']  ?></td>
                      <?php
                        }
                       }
                           ?>
                      
                    </tr>
                    <?php
                      }
                      ?>
                  </tbody>
                </table>
                
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    <footer class="container-fluid">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>