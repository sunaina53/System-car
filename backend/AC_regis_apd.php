<?php
include "../conn.php";

  $id=$_GET['ap_id'];

 $sql ="delete from appoint where ap_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_appoint.php');
 }
 mysqli_close($con);

?>