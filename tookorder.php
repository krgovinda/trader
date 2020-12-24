<?php

session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

//$slno = $_POST['slno'];
$pname = $_POST['pname'];
$pid = $_POST['slno']; //pid here is from product_price //check it , its not true //ab true
$rate = $_POST['price'];
$quantity = $_POST['quantity'];
$amount = $_POST['amount'];
$grand_total = $_POST['grandtotal'];


include("connection.php");

$for_oid = mysqli_query($con,"select * from orders;");
$oid = "OID".(100 + mysqli_num_rows($for_oid)); // make it non numeric //done

//creating order detail table
$query_create_table_oid = "create table ".$oid." (sl int(5) primary key auto_increment, pid int(5), pname varchar(20), rate float(7,2), quantity int(3), amount float(8,2));"; //pid here is from product_price
mysqli_query($con,$query_create_table_oid);

//inserting order detail //error pid doest no have values
for($i=0;$i<sizeof($pid);$i++){
    $query = "insert into ".$oid."(pid, pname, rate, quantity, amount) values(".$pid[$i].",'".$pname[$i]."',".$rate[$i].",".$quantity[$i].",".$amount[$i].");";
    mysqli_query($con,$query) or die(mysqli_error($con));
    
   // echo $pid[$i].",".$pname[$i].",".$rate[$i].",".$quantity[$i].",".$amount[$i];
}

//inserting into orders table
$query_for_orders_table = "insert into orders (oid,customer_id,amount,date_time_of_order) values('".$oid."',".$_SESSION['usercode'].",".$grand_total.",now());";
$check = mysqli_query($con,$query_for_orders_table);



//for stock bakchodi

$stock_result = mysqli_query($con,"select * from product_price;");// no error
$stock_rows = mysqli_num_rows($stock_result); //try this uncommenting
//echo($stock_rows); //141
//echo(sizeof($pid)); //works
for($j=1;$j<=$stock_rows;$j++){
    $stock_fetch = mysqli_fetch_array($stock_result);
    for($i=0;$i<sizeof($pid);$i++){ //was problem here // looping was from 0 so it shouldnt be equal to size bitch!!
        if($stock_fetch['slno'] == $pid[$i]){ //if not working
//            updating code here
            echo("here");
            $left = $stock_fetch['stock'] - $quantity[$i];
            $stock_update_query = "update product_price set stock = ".$left." where slno=".$pid[$i].";";
            echo($left);
            mysqli_query($con,$stock_update_query);
        }
    }
}
















//if($check==1){
//    header('location:sendmail.php?oid='.$oid);
//}


//check

//header('location:ordersent.php');
?>