<?php

//include("connection.php");

session_start();

//if(!isset($_SESSION['userid'])){
//    header('location:login.html');
//}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>Akshay Traders | Fevicol</title>
     
<!--     link tags start here-->
     
        <!--    favicon-->
       <link rel="icon" href="images/pidilite_logo.png" type="image/png" >


        <!--   font awesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

          <!--    bootstrap css link-->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!--    main.css-->
       <link rel="stylesheet" href="css/main.css">
       
         <!--    layout.css-->
       <link rel="stylesheet" href="css/layout.css">
       
       
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous"> 
    <link rel="stylesheet" href="newstyle.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
   
<!--   script tags start here-->
   
       <!--    google map-->
       <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>


           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>
        
        
        <!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

 
    
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="home.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span class="float-right"><?php if(isset($_SESSION['username']))echo " hello, ".$_SESSION['username']; ?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i></a>
            </div>
        </div>
       <nav class="row"><div class="col-12">
           <ul>
               <li><a href="index.php">Home</a></li>
               <li><a href="products.php">Products</a></li>
               <li><a href="#about">About</a></li>
               <li><a href="contact.html">Contact</a></li>
           </ul>
       </div></nav>
        
    </header>
    
    <div id="always-after-header" class="parallax-window col-12" data-parallax="scroll" data-image-src="images/abstract-astronomy-dark-924824.jpg">
        <h4>Adhesives Become Innovative</h4>
        <p>Discover our wide range of Fevicol products. Pidilte's biggest bond is through the Fevicol Family of products. Fevicol has become a household name that is today synonymous with adhesives. </p>
        <a href="products.php"><button class="btn btn-info">Order</button></a>
    </div>
    
    <a id="about"></a>
    
    <div class="container content">
       <div class="row"><div class="col-12"><center><h3>History of Fevicol</h3></center></div></div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="images/1959-milestone.jpg" class="img-fluid img-thumbnail" alt="Fevicol">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <p>In 1963, the first manufacturing plant in Kondivita was set up with a simple product offering called “Fevicol”. It became a generic household name in the white glue category.
                In 1970, 30-gram collapsible tube was launched. This was introduced as a consumer pack and was a smart strategy to establish Fevicol as a consumer brand. Fevicol embarked on a bold marketing game plan. Instead of selling through stores, Fevicol approached carpenters directly. With its signature white and blue packing, Fevicol was marketed directly to consumers (primarily carpenters).</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <p>Fevicol is India’s Most Trusted Brand of Adhesives.
                Pidilite’s biggest bond is through the Fevicol family of products. Fevicol has become a household name that is today synonymous with adhesives. The brand has introduced many innovative products which have transformed the way carpentry trade operates in India.</p>
            </div>
             <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="images/SIde-image.png" class="img-fluid img-thumbnail" alt="Fevicol">
            </div>
        </div>
    </div>
    
    
    <div class="container parallax-window col-12" data-parallax="scroll" data-image-src="images/abstract-architecture-building-exterior-593158.jpg">
        <div class="row developers">
            <div class="raj col-lg-4 col-md-4 col-sm-12">
               <div class="row">
                   <div class="col-12"><p>"Naina da kya kasoor"</p></div>
                <div class="row">
                    <div class="col-10"><p style="float: right">-Rahul Raj</p></div>
                    <div class="col-2"><img class="dev-avatar" src="images/aang.jpg" alt=""></div>
                </div>
               </div>
<!--                <p>Rahul Raj</p> <img class="dev-avatar" src="images/aang.jpg" alt="">  -->
            </div>
            <div class="kumar col-lg-4 col-md-4 col-sm-12">
              <div class="row">
                   <div class="col-12"><p>"Wo ladki mil jae to kehna"</p></div>
                <div class="row">
                    <div class="col-10"><p style="float: right">-Abhishek Kumar</p></div>
                    <div class="col-2"><img class="dev-avatar" src="images/kakashi.jpg" alt=""></div>
                </div>
               </div>
               
<!--                <p>Abhishek kumar </p> <img class="dev-avatar" src="images/kakashi.jpg" alt=""> -->
            </div>
            <div class="anand col-lg-4 col-md-4 col-sm-12">
              <div class="row">
                   <div class="col-12"><p>"jiggy jiggy jiggy.. leah ghoti.. paige bt jiggy &lt;3"</p></div>
                <div class="row">
                    <div class="col-10"><p style="float: right">-Abhishek Anand</p></div>
                    <div class="col-2"><img class="dev-avatar" src="images/saitama.png" alt=""></div>
                </div>
               </div>
               
               
<!--                <p>Abhishek Anand</p> <img class="dev-avatar" src="images/saitama.png" alt=""> -->
            </div>
        </div>
    </div>
    
    
    
     <!-- map embeded link-->
     
     <iframe id="embedded-map" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d849.0418870263054!2d85.14345698468249!3d25.601123523028146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSumitra+Sadan+Paharpur+Anisabad+Patna-2!5e0!3m2!1sen!2sin!4v1532365981710" frameborder="0" style="border:0" allowfullscreen></iframe>
     
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><h6><strong>Come Visit Us</strong></h6><p>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
 
    
</body>
</html>