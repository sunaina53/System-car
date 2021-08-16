<?php
include "../conn.php";

  $id=$_GET['car_id'];

 $sql ="delete from datacar where car_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_car.php');
 }
 mysqli_close($con);

?>