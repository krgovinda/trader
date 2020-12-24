<?php
//
//$slno = $_POST['slno'];
//$quantity = $_POST['quantity'];


$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'akshay_traders');


$q1 = "select * from products;";
$result = mysqli_query($con,$q1);

$q2 = "select * from product_price;";
$result_price = mysqli_query($con,$q2);

$rows_price = mysqli_num_rows($result_price);

$productdata = mysqli_fetch_array($result);
//$productprice = mysqli_fetch_array($result_price);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Akshay Traders | Your Orders</title>
    
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


           <!--parallax js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/parallax.js"></script>
        
        
<!--        google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    
    
</head>
<body>
  
  <script>
      function subtract(str){
            let x = document.getElementById(str).value;
            if(x<=0)
                x=0;
            else
                x--;
           document.getElementById(str).value= x;
                
        }
        function add(str){
            let x = document.getElementById(str).value;
            document.getElementById(str).value= ++x;
                
        }
    
</script>
  
  <?php
    
    $k= 2;
    echo $k+1;
    echo $k;
    ?>
   
   <form action="testcfnmorder.php" method="post">
   <?php
       mysqli_data_seek($result_price,0);
       for($j=1;$j<=$rows_price;$j++){
           $productprice = mysqli_fetch_array($result_price);
        if($productprice['p_id'] == $productdata['pid']){ 
                                ?>
   
   <input type="hidden" name="slno[]" id="" class="form-control"  value="<?php echo $productprice['p_id']; ?>" readonly ><?php echo $productprice['type']; ?>
                                 
<i class="fas fa-rupee-sign"></i><span> <?php echo $productprice['price']; ?></span>
                                  
                                     
                                      <button type="button" class="btn btn-secondary btn-plus-minus" id="btn-sub" onclick="subtract('selectQuantity')"> - </button>
                                      <!--<span id="selectQuantity<?php //echo $j; ?>" class="" contenteditable="true"> 0 </span>-->
                                      
                                      <input type="text" name="quantity[]" id="selectQuantity" class=" input-sm add-sub-input" value="0" placeholder="" title="Quantity" size="2" maxlength="2">
                                      
                                      <button type="button" class=" btn btn-secondary btn-plus-minus" id="btn-add" onclick="add('selectQuantity')"> + </button>
                                      <br>
       
                           <?php
            }
        
       };
           ?>
                                      <br><button>Submit</button>            
            
  </form>                                                        
   <?php 
//    echo isset($_POST); 
//    for($i=0;$i<=100;$i++){
//        echo "\n".$slno[0];
//        echo "\n".$quantity[0];
//    }
//    
    ?>
   
   
    
</body>
</html>