<?php

$quantity = $_POST['quantity'];
$slno =$_POST['slno'];
//$num_data = isset($_GET);

echo sizeof($quantity);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>confirm</title>
</head>
<body>
   <?php 
    for($i=0;$i<=20;$i++)
    {
    ?>
    <h1><?php echo $slno[$i]; ?></h1>
    <h1><?php echo $quantity[$i]; ?></h1>
    <?php } ?>
</body>
</html>