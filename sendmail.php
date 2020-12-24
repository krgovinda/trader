<?php
session_start();

if(!isset($_SESSION['userid'])){
    header('location:login.html');
}

$oid = $_GET['oid'];

include("connection.php");

$q1 = "select * from ".$oid.";";
$result_oid = mysqli_query($con,$q1);
$oid_table = mysqli_fetch_array($result_oid);

$q2 = "select * from orders where oid='$oid';";
$result_orders = mysqli_query($con,$q2);
$orders_table = mysqli_fetch_array($result_orders); 

$query = "select * from users where cid =".$_SESSION['usercode'].";";
$result_user = mysqli_query($con,$query);
$user_data = mysqli_fetch_array($result_user);

$content = "";
for($i=1;$i<=mysqli_num_rows($result_oid);$i++){
    $content .= "<tr><td>".$oid_table['sl']."</td><td>".$oid_table['pid']."</td><td>".$oid_table['pname']."</td><td>".$oid_table['rate']."</td><td>".$oid_table['quantity']."</td><td>".$oid_table['amount']."</td></tr>";
//    $content .= $content_in;
}

$to = "order@akshaytraders.co.in";
$subject = "ORDER id : ".$oid;
$headers = "From : ".$user_data['email']."\r\n";
$headers .= "Content-type: text/html charset=iso-8859-1 \r\n";
$message= "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Akshay Traders | Order</title>
</head>
<body>
    <h3>".$user_data['fname']." ".$user_data['lname']."</h3>
    <h4>".$user_data['mobile']."</h4>
    <h5>Ordered on : ".$orders_table['date_time_of_order']."</h5>
    <table>
        <tr>
            <th>sl</th>
            <th>pid</th>
            <th>Product</th>
            <th>Rate</th>
            <th>Quantiy</th>
            <th>Amount</th>
        </tr>
        ".$content."
        <tr><td colspan='5'></td><td>".$orders_table['amount']."</td></tr>
    </table>
</body>
</html>";



$mailsent = mail($to,$subject,$message,$headers);
if($mailsent==false){
    echo "mail not sent but took order..surprised?? we too!";
}
else header('location:ordersent.php');

?>

