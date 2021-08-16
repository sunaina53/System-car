<?php
include "../conn.php";

  $id=$_GET['cus_id'];

 $sql ="delete from customer where cus_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_cos.php');
 }
 mysqli_close($con);

?>