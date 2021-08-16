<?php
include "../conn.php";
     $b_id= $_GET['b_id'];
     $stsv_id=$_POST['stsv_id'];

    
    $sql2	= "SELECT * FROM booking WHERE b_id = $b_id";
    $sql3=" UPDATE booking SET stsv_id = '$stsv_id' WHERE b_id = $b_id";
    
    $result2 = mysqli_query($con,$sql3);

    

    if($result2){
            header('location: All_order.php');}
   ?>
