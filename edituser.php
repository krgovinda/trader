<?php

session_start();

if(!isset($_SESSION['admin'])){
    header('location:login.html');
}

include("connection.php");

$q = "select * from users where cid=".$_GET['id'].";";

$result = mysqli_query($con,$q);

$userdata = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Akshay Traders | Edit User</title>
    
    
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
        <!--       validation script-->
        <script src="js/validation.js"></script>
<!--           ajax-->
           <script src="js/ajax.js"></script>

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
    
    <div class="container">
       <div class="row">
           <div class="col"><h2>Edit User - <?php echo $userdata['fname']; ?></h2></div>
        </div>
        <form action="updateuser.php" method="post">
           <div class="row"><div class="col"><input type="hidden" name="cid" value="<?php echo $_GET['id']; ?>"></div></div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputFname">First Name</label>
                    <input type="text" name="fname" id="inputFname" placeholder="First Name" class="form-control" value="<?php echo $userdata['fname']; ?>" readonly minlength="4" maxlength="20" onfocusout="validateFname()">
                </div>
                <div class="form-group col">
                    <label for="inputFname">Last Name</label>
                    <input type="text" name="lname" id="inputLname" placeholder="Last Name" class="form-control" value="<?php echo $userdata['lname']; ?>" readonly  minlength="4" maxlength="20" onfocusout="validateLname()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputStore">Store Name</label>
                    <input type="text" name="sname" id="inputStore" placeholder="XYZ Store" class="form-control" value="<?php echo $userdata['sname']; ?>" required minlength="5" maxlength="20" onfocusout="validateSname()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputAddress1">Address</label>
                    <input type="text" name="address1" id="inputAddress1" placeholder="123 Colony, Street" class="form-control" value="<?php echo $userdata['address1']; ?>" required minlength="5">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputMobile">Mobile Number</label>
                    <input type="text" name="mobile" id="inputMobile" placeholder="Mobile Number" class="form-control" required value="<?php echo $userdata['mobile']; ?>" minlength="10" maxlength="10" onfocusout="validateMobile()">
                </div>
                <div class="form-group col">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" id="inputEmail" placeholder="someone@something.com" class="form-control" value="<?php echo $userdata['email']; ?>" required minlength="8" onfocusout="validateEmail()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5">
                    <label for="inputCity">City</label>
                    <input type="text" name="city" id="inputCity" class="form-control" value="<?php echo $userdata['city']; ?>" required minlength="3" onfocusout="validateCity()">
                </div>
                <div class="form-group col">
                    <label for="selectState">State</label>
                    <input type="text" name="state" id="inputState" class="form-control" value="<?php echo $userdata['state']; ?>" required minlength="4" >
                </div>
                <div class="form-group col">
                    <label for="inputPincode">Pincode</label>
                    <input type="text" name="pincode" id="inputPincode" class="form-control" value="<?php echo $userdata['pincode']; ?>" required minlength="6" maxlength="6" onfocusout="validatePincode()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPassword1">Password</label>
                    <input type="text" name="password" id="inputPassword1" class="form-control" value="<?php echo $userdata['password']; ?>" readonly minlength="8" maxlength="20" onfocusout="validatePassword()">
                </div>                
            </div>            
            <div class="form-row">
                <div class="form-group col">
                    <button type="submit" class="btn btn-info">Update</button>
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