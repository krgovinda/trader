<?php

//include("connection.php");

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}


//sort it out
//if(!isset($_POST['quantity'])){
//    header('location:http://localhost/Project-%20Akshay%20traders/products.php');
//}

$slno = $_POST['slno'];
$products = $_POST['products'];
$quantity = $_POST['quantity'];
$type = $_POST['type'];
$price = $_POST['price'];

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
        
        <style>
            .input-field{
                display: inline;
                text-align: center;
                border: none;
                background: transparent;
                color: #000;
                outline: none;
            }
        </style>
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php" onerror="this.href=index.html">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
        
    <div class="container">
        
        <div class="row">
            <div class="col-12"><h2>Your Order</h2></div>
        </div>
        
        
        <form action="tookorder.php" method="post">
        
        <div class="col-12">
            <table class="table table-hover table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                
                <thead>
                    <tr>
                      <th scope="col">Slno</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Product Type</th>
                      <th scope="col">Rate</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Amount</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $j=0;
                    for($i=0;$i<sizeof($slno);$i++){
                        if($quantity[$i]!=0){
                            $j++;
                    ?>    
                     <tr>
                        <td><?php echo $j; ?></td>
                        <td><input type="text" name="pname[]" id="" class="input-field" value="<?php echo ucwords($products[$i]); ?>" readonly size="8" maxlength="8"></td>
                        <td><input type="text" name="type[]" id="" class="input-field" value="<?php echo $type[$i]; ?>" readonly size="8" maxlength="8"></td>
                        <td id="rate<?php echo $j; ?>"><input type="text" name="price[]" id="" class="input-field" value="<?php echo $price[$i]; ?>" readonly size="7" maxlength="7"></td>
                        <td id= "quantity<?php echo $j; ?>"><input type="text" name="quantity[]" id="" class="input-field" value="<?php echo $quantity[$i]; ?>" readonly size="3" maxlength="3"></td>
                        <td id="amount<?php echo $j; ?>"><input type="text" name="amount[]" id="" class="input-field" value="<?php echo $price[$i] * $quantity[$i] ?>" readonly size="5" maxlength="5"></td>
                        <input type="hidden" name="slno[]" value="<?php echo $slno[$i]; ?>">
                    </tr>
                  <?php
                        }
                        
                    }
                        
                        ?>
                    
                    <tr>
                        <td colspan="5"><h5><strong>Grand Total</strong></h5></td>
                        <?php $grand_total=0; for($k=0;$k<sizeof($price);$k++){ $grand_total = $grand_total + ($price[$k] * $quantity[$k]);} ?>
                        <td><h5><strong><?php echo $grand_total; ?></strong></h5></td>
                        <input type="hidden" name="grandtotal" id="" class="input-field" value="<?php echo $grand_total; ?>" readonly size="6" maxlength="6">
                    </tr>
                    
                </tbody>
                
            </table>
            
        </div>
        
        <div class="row">
            <div class="col">
                <a href="products.php"><button type="button" class="btn btn-danger float-left">Cancel</button></a>
                <button class="btn btn-primary float-right">Confirm Order</button>
            </div>
        </div>
        
        </form>
        
        
    </div>
    
    
    
    
    
    
    
    
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>