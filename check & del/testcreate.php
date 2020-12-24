<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'akshay_traders');

$pname ="akbar";
$rate =6;
$pid = 600;
$amount = 34;
$user = 989;
$grand_total= 8999;

$for_oid = mysqli_query($con,"select * from orders;");


//echo mysqli_num_rows($for_oid);
$oid = "oid".(100 + mysqli_num_rows($for_oid)); // make it non numeric //done

//creating order detail table
$query_create_table_oid = "create table ".$oid." (sl int(5) primary key auto_increment, pid int(5), pname varchar(20), rate float(6,2), amount float(7,2));"; //pid here is from product_price
mysqli_query($con,$query_create_table_oid);


//inserting order detail
//for($i=0;$i<sizeof($pname);$i++){
    $query = "insert into ".$oid." (pid, pname, rate, amount) values (".$pid.",'".$pname."',".$rate.",".$amount.");";
    mysqli_query($con,$query);
}

//inserting into orders table
$query1 = "insert into orders (oid,customer_id,amount,date_time_of_order) values('".$oid."',".$user.",".$grand_total.",now());";
mysqli_query($con,$query1);
?>