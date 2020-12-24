<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

include("connection.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | Change Password</title>
    
    
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
      
      <!--   form css-->
        <link rel="stylesheet" href="css/form.css">
   
<!--   script tags start here-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        
<!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;font-size:17px;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
    <div class="container form card">
       
       <h3><strong>Change Password</strong></h3>
       <p></p>
        <form action="nchange.php" method="post">
           <div class="form-row">
                <div class="form-group col">
                    <label for="inputCurrentPasword">Current Password</label>
                    <input type="password" name="cpwd" id="inputCurrentPasword" class="form-control" required minlength="8" maxlength="20" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPassword">New Password</label>
                    <input type="password" name="npwd" id="inputPassword" class="form-control" required minlength="8" maxlength="20" onfocusout="validatePassword()">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPassword1">Confirm Password</label>
                    <input type="password" name="cfnm" id="inputPassword1" class="form-control" required minlength="8" maxlength="20" onfocusout="validateConfirmPassword()">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group"><button type="submit" class="btn btn-success">Change</button></div>
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