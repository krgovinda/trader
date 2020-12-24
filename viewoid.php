<?php

session_start();

//if(!isset($_SESSION['admin'])){
//    header('location:login.html');
//}

include("connection.php");


$oid_result = mysqli_query($con,"select * from ".$_GET['oid'].";");
$user_result = mysqli_query($con,"select * from users where cid =".$_GET['cid'].";");

$user_data= mysqli_fetch_array($user_result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | <?php echo $_GET['oid']; ?></title>
    
    
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
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
    </header>
    
    <div class="container-fluid"><div class="row">
        <div class="col">
            <h3>Customer :
            <?php echo $user_data['fname']." ".$user_data['lname']; ?></h3>
            <h3>Mobile :
            <?php echo $user_data['mobile']; ?></h3>
            <h3>Store :
            <?php echo $user_data['sname']; ?></h3>
        </div>
    </div></div>
    
    <div class="container-fluid">
       <table class="table table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Code</th>
              <th scope="col">Product name</th>
              <th scope="col">Rate</th>
              <th scope="col">Quantity</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
           <tbody>
           <tbody>
                       <?php
                       for($i=1;$i<=mysqli_num_rows($oid_result);$i++){
                           $order_data= mysqli_fetch_array($oid_result);
                           ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $order_data['pid'] ?></td>
                            <td><?php echo $order_data['pname'] ?></td>
                            <td><?php echo $order_data['rate'] ?></td>
                            <td><?php echo $order_data['quantity'] ?></td>
                            <td><?php echo $order_data['amount'] ?></td>
                        </tr>
                        
                        <?php
                               
                            }
                        ?>
                        <tr>
                            <td colspan="5"><strong><h5>Grand Total</h5></strong></td>
                            <td><strong><h5><?php echo $_GET['amount']; ?></h5></strong></td>
                        </tr>
           
           
           
           
      </tbody>
        </table>
    </div>

    
    
    
    
    
    
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
</body>
</html>