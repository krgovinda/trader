<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}
elseif(!isset($_GET['id'])){
    header('location:customerprofile.php');
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
    <title>Akshay Traders | Edit Profile</title>
    
    
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
           <div class="col"><h2><strong>Edit Profile</strong></h2></div>
        </div>
        <br>
        <form action="updateprofile.php" method="post">
           <div class="row"><div class="col"><input type="hidden" name="cid" value="<?php echo $_GET['id']; ?>"></div></div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputFname">First Name</label>
                    <input type="text" name="fname" id="inputFname" placeholder="First Name" class="form-control" value="<?php echo $userdata['fname']; ?>" required minlength="4" maxlength="20" onfocusout="validateFname()">
                </div>
                <div class="form-group col">
                    <label for="inputFname">Last Name</label>
                    <input type="text" name="lname" id="inputLname" placeholder="Last Name" class="form-control" value="<?php echo $userdata['lname']; ?>" required minlength="4" maxlength="20" onfocusout="validateLname()">
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
                    <input type="text" name="address1" id="inputAddress1" placeholder="123 Colony, Street" class="form-control" value="<?php echo $userdata['address1']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputMobile">Mobile Number</label>
                    <input type="text" name="mobile" id="inputMobile" placeholder="Mobile Number" class="form-control" required value="<?php echo $userdata['mobile']; ?>" required minlength="10" maxlength="10" onfocusout="validateMobile()">
                </div>
                <div class="form-group col">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" id="inputEmail" placeholder="someone@something.com" class="form-control" value="<?php echo $userdata['email']; ?>"  required minlength="8" onfocusout="validateEmail()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5">
                    <label for="inputCity">City</label>
                    <input type="text" name="city" id="inputCity" class="form-control" value="<?php echo $userdata['city']; ?>" required minlength="3">
                </div>
                <div class="form-group col">
                    <label for="selectState">State</label>
                    <select name="state" id="selectState" class="form-control">
                        <option value="bihar">Bihar</option>
                        <option value="bengal">Bengal</option>
                        <option value="jharkhand">Jharkhand</option>
                        <option value="uttar pradesh">Uttar Pradesh</option>
                        <option value="madhya pradesh">Madhya Pradesh</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputPincode">Pincode</label>
                    <input type="text" name="pincode" id="inputPincode" class="form-control" value="<?php echo $userdata['pincode']; ?>" required minlength="6" maxlength="6" onfocusout="validatePincode()">
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
    
    <script>
        function checkpwd(str){
            if(document.getElementById(str).checked==true){
                document.getElementById('password').style.display="block";
            }
            else{
                document.getElementById('password').style.display="none";
                document.getElementsByClassName('inputPassword').value="";
            }
        }
    </script>
</body>
</html>