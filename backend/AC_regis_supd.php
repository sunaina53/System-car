<?php
include "../conn.php";

  $id=$_GET['sup_id'];

 $sql ="delete from supply where sup_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_supply.php');
 }
 mysqli_close($con);

?>