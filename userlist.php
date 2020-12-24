<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

include("connection.php");

$query = "select * from users";
$result = mysqli_query($con,$query);
$rows = mysqli_num_rows($result);



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | List Of Users</title>
    
    
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
            footer{
                margin-top: 30px;
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
    
    <div class="container-fluid" style="margin-top:5px;"><div class="row">
    <div class="col-10"><h3>List Of Users</h3></div>
    <div class="col-2"><a href="admin.php" class="btn btn-secondary float-right" style="margin-top:10px; "><i class="fas fa-angle-right"></i> Admin</a></div>
    </div></div>
    <div class="container-fluid">
       <table class="table table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Mobile</th>
              <th scope="col">Password</th>
            </tr>
          </thead>
          <tbody>
           <?php
        for($i=1;$i<=$rows;$i++){
            $userdata = mysqli_fetch_array($result);
        
        ?>
            <tr>
            
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $userdata['fname']; ?></td>
              <td><?php echo $userdata['lname']; ?></td>
              <td><?php echo $userdata['mobile']; ?></td>
              <td><?php echo $userdata['password']; ?></td>
              <td><a href="edituser.php?id=<?php echo $userdata['cid']; ?>" class="btn btn-secondary">Edit</a></td>
              <td><a href="removeuser.php?id=<?php echo $userdata['cid']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Remove</a></td>
              <td><?php if($userdata['admin']==0){ ?><a href="makeuser.php?id=<?php echo $userdata['cid'];?>&boolean=0" class="btn btn-success" onclick="return confirm('Are you sure?');">Make Admin</a> <?php ;} else{ ?><a href="makeuser.php?id=<?php echo $userdata['cid'];?>&boolean=1" class="btn btn-info" onclick="return confirm('Are you sure?');">Remove Admin</a><?php ;} ?></td> 
            
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