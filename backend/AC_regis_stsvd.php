<?php
include "../conn.php";

  $id=$_GET['stsv_id'];

 $sql ="delete from serv_status where stsv_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_status.php');
 }
 mysqli_close($con);

?>