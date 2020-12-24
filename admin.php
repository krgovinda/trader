<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | Admin</title>
    
    
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
           .admin a, ahover,aactive,avisited{
                color: black;
                text-decoration: none;
            }    
            footer{
                margin-top: 30px;
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
    
    <div class="container admin">
        <div class="row">
            <div class="col"><h2>Admin</h2></div>
        </div>
        <div class="row">
            <div class="col"><p><strong>Database : </strong> akshay_traders</p></div>
        </div>
        <div class="row">
            <div class="col"><p><strong>Server name : </strong> localhost</p></div>
        </div>
        
        <div class="row">
           
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <a href="userlist.php">
                   <div class="container-fluid card">
                    <div class="row"><div class="col"><img class="card-img-top" src="images/users-img-pexels.jpg" alt="Picture" style="max-height:auto;width:100%"></div></div>
                    <div class="row"><div class="col"><br><h4 class="card-title">List of Users</h4></div></div>
                    </div>
                    </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <a href="editproducts.php">
                   <div class="container-fluid card">
                    <div class="row"><div class="col"><img class="card-img-top" src="images/products-misleading.jpg" alt="Picture" style="max-height:auto;width:100%"></div></div>
                    <div class="row"><div class="col"><br><h4 class="card-title">List of Products</h4></div></div>
                </div>
                </a>
            </div>
            
        </div>
        
        <div class="row">
            
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <a href="orderlist.php">
                   <div class="container-fluid card">
                    <div class="row"><div class="col"><img class="card-img-top" src="images/agreement-business-clapping-990817.jpg" alt="Picture" style="max-height:auto;width:100%"></div></div>
                    <div class="row"><div class="col"><br><h4 class="card-title">List of Orders</h4></div></div>
                </div>
                </a>
            </div>
        </div>
        
    </div>
    
    
    
    
    
    
<!--    agreement-business-clapping-990817.jpg-->
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>