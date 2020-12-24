<?php

session_start();


if(!isset($_POST)){
    header('location:forgotpassword.html');
}

$mobile = $_POST['mobile'];
$email = $_POST['email'];

$lastpwd = $_POST['lpwd'];

include("connection.php");

$query = "select * from users where mobile='$mobile' && email='$email';";
    
$result = mysqli_query($con,$query);
$rows = mysqli_num_rows($result);

$userdata = mysqli_fetch_array($result);

if($rows==1){
    $_SESSION['guest'] = $userdata['cid'];
   if(!is_null($userdata['q1'])) { $ques = "If you woke up as your least favourite teacher, what will you do?";
    $_SESSION['qno'] = 'q1' ;
                                 }
   elseif(!is_null($userdata['q2'])) {$ques = "Which is your favourite comic character ?";
    $_SESSION['qno'] = 'q2';
                                     }
   elseif(!is_null($userdata['q3'])) {$ques = "Who was your first crush?" ;
    $_SESSION['qno'] = 'q3';
                                     }
   elseif(!is_null($userdata['q4'])) {$ques = "What is your dream car?" ;
    $_SESSION['qno'] = 'q4';
                                     }
   elseif(!is_null($userdata['q5'])) {$ques = "What will you trade to have the powers of becoming voluntarily invisible?" ;
    $_SESSION['qno'] = 'q5';
                                     }
    
    $query2 = "insert into forgot_pass_history (user_id, pass_entered, date_of_attempt) values(".$userdata['cid'].",'".$lastpwd."',now());";
    
    mysqli_query($con,$query2) or die(mysqli_error($con));
}



else {
    header('location:forgotpassword.html');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Akshay Traders | Recovery Question</title>
    
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
       
       <h4>Please answer the question that you opted while signing up</h4><br><br>
        <form action="fnewpassword.php" method="post">
            
            <div class="form-row">
                <div class="form-group col">
                    
                    <label for="inputAnswer"><strong><?php echo $ques; ?></strong></label>
                    <input type="text" name="checkans" id="inputAnswer" class="form-control" required minlength="3">
                    
                </div>
            </div>
            
            
            
            <div class="form-row">
                <div class="form-group"><button type="submit" class="btn btn-success">Check</button></div>
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