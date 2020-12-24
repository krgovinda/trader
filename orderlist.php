<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

include("connection.php");


$order_result = mysqli_query($con,"select * from orders;");
$user_result = mysqli_query($con,"select * from users;");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | List of Orders</title>
    
    
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
    
        <div class="container-fluid" style="margin-top:5px;"><div class="row">
    <div class="col-10"><h3>List Of Orders</h3></div>
    <div class="col-2"><a href="admin.php" class="btn btn-secondary float-right" style="margin-top:10px; "><i class="fas fa-angle-right"></i> Admin</a></div>
    </div></div>
    
       <div class="container-fluid">
       <table class="table table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order_id</th>
              <th scope="col">Customer_id</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Order Amount</th>
              <th scope="col">Date_Time</th>
            </tr>
          </thead>
           <tbody>
               <?php
        for($i=1;$i<=mysqli_num_rows($order_result);$i++){
            $order_table = mysqli_fetch_array($order_result);
        
        ?>
          <tr>
              <td scope="row"><?php echo $i; ?></td>
              <td><?php echo $order_table['oid']; ?></td>
              <td><?php echo $order_table['customer_id']; ?></td>
              <?php
            mysqli_data_seek($user_result,0);
        for($j=1;$j<=mysqli_num_rows($user_result);$j++){
            $userdata = mysqli_fetch_array($user_result);
            if($order_table['customer_id']==$userdata['cid']){
                $cid=$userdata['cid'];
        
        ?>
              
              
              <td><?php echo $userdata['fname']." ".$userdata['lname']; ?></td>
              
              <?php
            }
        }
            ?>
              
              <td><?php echo $order_table['amount']; ?></td>
              <td><?php echo $order_table['date_time_of_order']; ?></td>
              <td><a href="viewoid.php?oid=<?php echo $order_table['oid']; ?>&cid=<?php echo $cid; ?>&amount=<?php echo $order_table['amount']; ?>" class="btn btn-secondary">View</a></td>
              <td><?php if($order_table['done']==0){ ?><a href="completeorder.php?oid=<?php echo $order_table['oid'];?>&boolean=0" class="btn btn-warning" onclick="return confirm('Are you sure?');">Complete</a> <?php ;} else {?><a href="#" class="btn btn-success"><i class="fas fa-check-double"></i> Completed</a><?php } ?></td>
              
          </tr>
          <?php
        }
            ?>
          
          
          
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