<?php
include "../conn.php";

  $id=$_GET['sv_id'];

 $sql ="delete from services where sv_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_services.php');
 }
 mysqli_close($con);

?>