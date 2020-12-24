<?php
session_start();

if(!isset($_GET)){
    header('location:products.php');
}

$pid = $_GET['id'];

include("connection.php");

$q1 = "select * from products where pid=".$pid.";";
$result = mysqli_query($con,$q1);

$q2 = "select * from product_price;";
$result_price = mysqli_query($con,$q2);

$rows_price = mysqli_num_rows($result_price);

$productdata = mysqli_fetch_array($result);
//$productprice = mysqli_fetch_array($result_price);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | <?php echo $productdata['name']; ?></title>
    
    
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
    
    <header class="container-fluid">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
    
    <div class="container-fluid sticky-top">
        <div class="row">
            
            <div class="col-lg-6 col-sm-12">
                <img src="<?php echo $productdata['image_location'] ?>" alt="Product image" width="100%" class="img-responsive" onerror=" this.src = 'images/no-featured-175.jpg';">
            </div>
            
            <div class="col-lg-6 col-sm-12">
                <div class="row"><div class="col-12 product-title"><h2><?php echo ucwords($productdata['products']); ?></h2></div></div>
                <div class="row"><div class="col-12 description"><p><?php echo $productdata['description']; ?></p></div></div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                  <th scope="col">Type</th>
                                  <th scope="col">Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                            
<!--                              loop starts here-->
    <?php
       mysqli_data_seek($result_price,0);
       for($j=1;$j<=$rows_price;$j++){
           $productprice = mysqli_fetch_array($result_price);
        if($productprice['p_id'] == $productdata['pid']){
     ?>
                                <tr class="row-iteration">
                                  <td><?php echo $productprice['type']; ?></td>
                                  <td><i class="fas fa-rupee-sign"></i><?php echo $productprice['price']; ?></td>
                                </tr>
   <?php
            }
        
       };
   ?>
                           
<!--                           loop ends here-->
                            </tbody>
                        </table>
            </div>
            
        </div>
    </div>
    
    
        </div></div>
    
    
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
</body>
</html>