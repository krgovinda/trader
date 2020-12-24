<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

include("connection.php");

$query1 = "select * from products;";
$query2 = "select * from product_price;";
 
$result = mysqli_query($con,$query1);
$rows = mysqli_num_rows($result);   

$result_price = mysqli_query($con,$query2);
$rows_price = mysqli_num_rows($result_price);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | Edit Products</title>
    
    
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        
<!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <style>
            input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            input[type="number"] {
                -moz-appearance: textfield;
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
    <a id="top"></a>
    <div class="container"><div class="row"></div></div>
    <div class="container"><div class="row"><div class="col-10"><h2 style="margin-top:20px;margin-bottom:30px;">List Of Products</h2></div><div class="col-2"><a href="admin.php" class="btn btn-secondary float-right" style="margin-top:10px; "><i class="fas fa-angle-right"></i> Admin</a></div></div></div>
<!--    outer loop starts here-->
      <?php
   for($i=1;$i<=$rows;$i++){
       $productdata = mysqli_fetch_array($result);
    ?>
    <div class="container">
                <div class="row"><div class="col-12 product-title"><h3><?php echo ucwords($productdata['products']); ?></h3></div></div>
                
                <div class="row" id="table<?php echo $i; ?>" style="margin-bottom:30px;">
                    <div class="col-12">
                        <table class="table table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                            <thead>
                                <tr>
                                  <th scope="col">Type</th>
                                  <th scope="col">Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form action="updateprice.php" method="post">
                            
<!--                              inner loop starts here-->
                               <?php
       mysqli_data_seek($result_price,0);
       for($j=1;$j<=$rows_price;$j++){
           $productprice = mysqli_fetch_array($result_price);
        if($productprice['p_id'] == $productdata['pid']){ 
                                ?>
                                <tr class="row-iteration">
                                  <input type="hidden" name="slno[]" id="" value="<?php echo $productprice['slno'] ?>" class="form-control">
                                  <td><?php echo $productprice['type']; ?></td>
                                  <td><i class="fas fa-rupee-sign"></i><input type="number" name="productprice[]" id="" value="<?php echo $productprice['price']; ?>"></td>
                                </tr>
                                <?php
            }
        
       };
           ?>
                           
<!--                           inner loop ends here-->
                               <tr>
                                   <td colspan="2"><input type="submit" class="btn btn-success" value="Update"></td>
                               </tr>
                               </form>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>                
    </div>
    
    <?php }; ?>
    <!--   outer loop ends here-->   
    <div class="container"><div class="row"><div class="col"><a href="#top" class="btn btn-secondary float-right" style="margin-bottom:10px; border-radius:50%;"><i class="fas fa-angle-double-up"></i></a></div></div></div>
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>