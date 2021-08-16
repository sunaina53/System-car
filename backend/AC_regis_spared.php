<?php
include "../conn.php";

  $id=$_GET['sp_id'];

 $sql ="delete from dataspare where sp_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_spare.php');
 }
 mysqli_close($con);

?>