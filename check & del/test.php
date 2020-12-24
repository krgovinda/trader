<?php
include("connection.php");

$query = "select * from users;";

$dave = mysqli_query($con,$query) or die(mysqli_error());
//print $query;

while($row = mysqli_fetch_assoc($dave)){
    foreach($row as $cname => $cvalue){
        print "$cname : $cvalue\t";
    }
    print "\r\n";
}
//print $dave;














//mail(to,subject, message, headers, parameters);
//
//$to = "abhi.amr607@gmail.com";
//
//$subject = "test1";
//
//$body = "hello ! Hola!";
//
//$header = "From : phptest@ghareBaithal.com";
//
//mail($to, $subject, $body, $header);




?>