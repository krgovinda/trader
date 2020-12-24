<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

include("connection.php");

$q = "select * from users where mobile=".$_SESSION['userid'].";";

$result = mysqli_query($con,$q);
//$rows = mysqli_num_rows($result);

$userdata = mysqli_fetch_array($result);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?php echo $userdata['fname']; ?> | Akshay Traders</title>
    
    <style>
        .card{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
/*            min-width: 100%;*/
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 20px;
        }
        
        .user-avatar{
            border-radius: 50%;
/*
            height: 200px;
            width: 200px;
*/
        }
        
        .user-name h3{
            font-size: 40px;
        }

    </style>
    
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
   
       <!--    google map-->
       <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>


           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>

</head>
<body>
 
     <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username']))echo "hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
     </header>
  
  <div class="container card">
      <div class="row"><div class="col-12"><img src="images/users/no_profile_img1.jpg" height="100px" width="100px" alt="user-image" class="img-responsive user-avatar" ></div></div>
      
      <div class="row user-name"><div class="col-12"><h3><?php echo $userdata['fname'] ?></h3></div></div>
      
      <div class="row user-email"><div class="col-12"><?php echo $userdata['email'] ?></div></div>
      
      <div class="row user-mobile"><div class="col-12"><?php echo $userdata['mobile'] ?></div></div>
      
      <div class="row user-sname"><div class="col-12"><?php echo $userdata['sname'] ?></div></div>
      
      <div class="row user-address"><div class="col-12"><?php echo $userdata['address1'] ?></div></div>
      
      <div class="row user-state"><div class="col-12"><?php echo $userdata['state'] ?></div></div>
      
      <div class="row user-city"><div class="col-12"><?php echo $userdata['city'] ?></div></div>
      
      <div class="row user-pincode"><div class="col-12"><?php echo $userdata['pincode'] ?></div></div>
      
      <div class="row user-edit"><div class="col-12"><a href="editmyprofile.php?id=<?php echo $_SESSION['usercode']; ?>" style="color:blue">Edit Profile</a></div></div>
      
      <div class="row"><div class="col"><a href="cpass.php" class="" style="color:forestgreen;">Change Password</a></div></div>      
      
      <?php if(isset($_SESSION['admin'])) echo "<div class='row user-pow'><div class='col-12'><a href='admin.php' target='_blank' style='color: forestgreen;'>Admin Page</a></div></div>" ;?>
      
      
      <div class="row">
           <div class="col">
          <a href="order-history.php" class="btn btn-secondary float-left">Your Orders</a>
             </div>
            <div class="col"><a href="logout.php" class="btn btn-secondary logout-btn float-right" >Log out</a></div>
             
      </div>
  </div>
  
  
<!--
    <div class="container">
        <table class="table table-borderless">
            <thead><tr>Customer Name</tr></thead>
            <tbody>
                <tr><td>mobile Number</td></tr>
                <tr><td>email</td></tr>
                <tr><td>store Name</td></tr>
                <tr><td>address</td></tr>
                <tr><td>city</td></tr>
                <tr><td>state</td></tr>
                <tr><td>pincode</td></tr>
            </tbody>
        </table>
    </div>
-->
    
    
    <footer class="container-fluid text-center" style="margin-top:20px;">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
</body>
</html>