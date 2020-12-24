<?php

include("connection.php");

session_start();

//$mobile = $_POST['mobile'];
//$password = $_POST['password'];



$q1 = "select * from products;";
$q2 = "select * from product_price;";
 

//for product table
$result = mysqli_query($con,$q1);
$rows = mysqli_num_rows($result);   //number of rows of output table

//$productdata = mysqli_fetch_array($result); //this will go in the loop


//for product_price table
$result_price = mysqli_query($con,$q2);
$rows_price = mysqli_num_rows($result_price);

//echo $rows_price; //31
//echo $rows;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Akshay Traders | Products</title>
    
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
        
        
        <style>
            .btn-plus-minus{
/*                padding: 2px;*/
/*                margin: 0px;*/
            }
            .row-iteration{
                padding: 2px;
                margin: 2px;
            }
            
            .add-sub-input{
                display: inline;
                text-align: center;
                border: none;
                background: transparent;
                color: #000;
                outline: none;
            }
        </style>
        
</head>
<body>
    
    <header class="container-fluid sticky-top">
        <div class="row">
            <div class="col-9"><h2><a href="index.php">Akshay Traders</a></h2></div>
            <div class="col-3"><a href="customerprofile.php"><span style="float:right;"><?php if(isset($_SESSION['username'])) echo "hello, ".$_SESSION['username'];?></span><i class="fas fa-user-alt float-right" style="margin:3px;"></i>
            </a></div>
        </div>
    </header>
    
    <script>
//        try getting two arguments.. one for str as taken and other for stock..
        function subtract(str){
            let x = document.getElementById(str).value;
            if(x<=0)
                x=0;
            else
                x--;
           document.getElementById(str).value= x;
                
        }
        function add(str,stock){
            let x = document.getElementById(str).value;
            if(x>=stock)
                x = stock;
            else
                x++;
            document.getElementById(str).value= x;
                
        }
        
    </script>
    

    
    <form action="confirmorder.php" method="post">
    
    <div class="container-fluid" >
    <div class="row"><div class="col"><input type="submit" value="Continue to Cart" class="btn btn-secondary float-right" onclick="return confirm('You will not be able to edit it further');"></div></div>
    </div>
    
    
<!--    onclick="let x=confirm('You will not be able to edit it further'); if(!x) {alert('Continue adding to your cart');}"-->
    
<!--    loop starts here-->
  <?php
   for($i=1;$i<=$rows;$i++){
       $productdata = mysqli_fetch_array($result);
    ?>
    <div class="container card">
        <div class="row list">
            <div class="col-4">
               
                <img src="<?php echo $productdata['image_location'] ?>" alt="Product image"  width="100%" class="img-responsive" onerror=" this.src = 'images/no-featured-175.jpg';" style="max-height:300px;">
<!--                srcset="images/no-featured-175.jpg"-->
            
            </div>
            <div class="col-8">
               
               
                <div class="row"><div class="col-12 product-title"><a href="product.php?id=<?php echo $productdata['pid'] ?>" style="color:black"><h3><?php echo ucwords($productdata['products']); ?></h3></a></div></div>
                <div class="row">
                    <div class="col-12 description">
                        <p id="descrip<?php echo $i; ?>" style="line-height:1.2em;height:3.6em;overflow:hidden" onclick="if(this.style.overflow=='hidden'){this.style.overflow='visible';this.style.height='auto';} else if(this.style.overflow=='visible'){this.style.overflow='hidden';this.style.height='3.6em';}"><?php echo $productdata['description']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><button type="button" id="show-hide-button<?php echo $i; ?>" class="btn btn-primary float-right" value="" name="<?php echo $productdata['pid']; ?>" onclick=" if(this.innerHTML=='Buy'){this.setAttribute('value',this.name); this.innerHTML= '&#x5e; Minimize'; this.style.backgroundColor='forestgreen';document.getElementById('show-hide-table<?php echo $i; ?>').style.display = 'block' ; } else{this.setAttribute('value',''); this.innerHTML= 'Buy'; this.style.backgroundColor='#007bff';  document.getElementById('show-hide-table<?php echo $i; ?>').style.display = 'none' ; }  ">Buy</button></div>
                </div>
                
                <div class="row" id="show-hide-table<?php echo $i; ?>" style="display : none">
                    <div class="col-12">
                        <table class="table table-hover table-borderless table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" >
                            <thead>
                                <tr>
                                  <th scope="col">Type</th>
                                  <th scope="col">Rate</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                            
<!--                              inner loop starts here-->
                               <?php
       mysqli_data_seek($result_price,0);
       for($j=1;$j<=$rows_price;$j++){
           $productprice = mysqli_fetch_array($result_price);
        if($productprice['p_id'] == $productdata['pid']){ 
                                ?>
                                <tr class="row-iteration">
                                  <input type="hidden" name="slno[]" id="" value="<?php echo $productprice['slno'] ?>" class="form-control"> <!--editing done here -->
                                  <input type="hidden" name="products[]" id="" value="<?php echo $productdata['products'] ?>" class="form-control">
                                  <input type="hidden" name="type[]" id="" value="<?php echo $productprice['type'] ?>" class="form-control">
                                  <input type="hidden" name="price[]" id="" value="<?php echo $productprice['price'] ?>" class="form-control">
                                  <td><?php echo $productprice['type']; ?></td>
                                  <td><i class="fas fa-rupee-sign"></i><span> <?php echo $productprice['price']; ?></span></td>
                                  <td>
                                      <button type="button" class="btn btn-secondary btn-plus-minus" id="btn-sub<?php echo $j; ?>" onclick="subtract('selectQuantity<?php echo $j; ?>')"> - </button>
                                      <!--<span id="selectQuantity<?php //echo $j; ?>" class="" contenteditable="true"> 0 </span>-->
                                      
                                      <input type="text" name="quantity[]" id="selectQuantity<?php echo $j; ?>" class=" input-sm add-sub-input" value="0" placeholder="" title="Quantity" size="2" maxlength="2">
                                      
                                      <button type="button" class=" btn btn-secondary btn-plus-minus" id="btn-add<?php echo $j; ?>" onclick="add('selectQuantity<?php echo $j; ?>',<?php echo $productprice['stock'] ?>)"> + </button>
                                  </td>
                                  <td><?php echo $productprice['stock']; ?></td>
                                </tr>
                                <?php
            }
        
       };
           ?>
                           
<!--                           inner loop ends here-->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
<!--                previous concept-->

<!--
                <div class="row" >
                    <div class="col">
                        <label for="selectType<?php ?>">Choose type</label>
                        <select name="type" id="selectType<?php ?>" class="form-control">
                            <option value="<?php ?>"><?php ?></option>
                        </select>
                    </div>
                    <div class="col"><label for="price<?php ?>">Rate</label><h5 id="price<?php ?>"><i class="fas fa-rupee-sign"></i> 64</h5>
                    </div>
                    <div class="col">
                        <label for="selectQuantity<?php  ?>">Quantity</label>
                        <button type="button" id="btn-sub<?php ?>" class="btn" onclick="subtract('selectQuantity<?php  ?>')">-</button><span id="selectQuantity<?php  ?>">0</span><button type="button" class="btn" id="btn-add<?php ?>" onclick="add('selectQuantity<?php ?>')">+</button>
                    </div>
                    <div class="col-1"><button type="button" id="btn-sub" class="btn" onclick="">+</button></div>
                    
                </div>
-->
                
<!--                <div class="row"></div>-->
                
<!--
                <div class="row">
                    <div class="col"><label for="amount<?php// echo $i; ?>">Amount</label><h5 id="amount<?php //echo $i; ?>"><i class="fas fa-rupee-sign"></i> 2424</h5>
                    </div>
                </div>
-->

                
                
            </div>
        </div>
    </div>
    
    <?php }; ?>
    <!--    loop ends here-->
    
    
    </form>
    
    
    <footer class="container-fluid text-center">
        <div class="row">
            <div class="col-6"><p class=""><strong>Come Visit Us</strong><br>Sumitra Sadan <br>Paharpur <br>Anisabad <br>Patna-2</p></div>
            <div class="col-6"><p><b>Opening Hours</b><br>Opens at <br>9.00AM <br>Closes at <br>9.00PM</p></div>
        </div>
    </footer>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
</body>
</html>