<?php

session_start();

if(!isset($_SESSION['guest'])){
    header('location:forgotpassword.html');
}

$ans = $_POST['checkans'];

include("connection.php");

$query = "select * from users where cid=".$_SESSION['guest'].";";

    
$result = mysqli_query($con,$query);
$rows = mysqli_num_rows($result);

$userdata = mysqli_fetch_array($result);


// !== not equal type
// != not equal
// <> not equal


if($rows==1){
    if(strcasecmp($userdata[$_SESSION['qno']],$ans) !== 0){ header('location:forgotpassword.html');

                                                           
                                                          }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Akshay Traders | New Password</title>
    
    <!--     link tags start here-->
     
        <!--    favicon-->
       <link rel="icon" href="images/pidilite_logo.png" type="image/png" >


        <!--   font awesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

          <!--    bootstrap css link-->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!--    layout.css-->
       <link rel="stylesheet" href="css/layout.css">
   
<!--   form css-->
        <link rel="stylesheet" href="css/form.css">
   
<!--   script tags start here-->
<!--       validation script-->
       
        <script src="js/validation.js"></script>
<!--           ajax-->
        <script src="js/ajax.js"></script>
           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>
        
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col"><h2><a href="index.php">Akshay Traders</a></h2></div>
        </div>
    </header>
    
    <div class="container form card">
       
       <h3>Change Password</h3>
       <p>This time be sure to remember...just kidding ! We are always here for you.</p>
        <form action="fchange.php" method="post">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNewPasword">New Password</label>
                    <input type="password" name="npwd" id="inputNewPasword" class="form-control" required minlength="8" maxlength="20" onfocusout="validatePassword()">
<!--                    <span class="invalid-feedback" id="msg-for-username"></span>-->
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPasswordAgain">Confirm Password</label>
                    <input type="password" name="cfnm" id="inputPasswordAgain" class="form-control" required minlength="8" maxlength="20" onfocusout="validateConfirmPassword()">
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