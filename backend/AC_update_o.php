
<?php
include "../conn.php";
    $o_id = $_GET['o_id'];
    $stsv_id=$_POST['stsv_id'];
  
    
   
  
    $sql2	= "SELECT * FROM orders WHERE o_id = $o_id";
    $sql3=" UPDATE orders SET svst_id = '$stsv_id' WHERE o_id = $o_id";
    
    $result2 = mysqli_query($con,$sql3);

    

    if($result2){
            header('location: All_order.php');}
   ?>
 