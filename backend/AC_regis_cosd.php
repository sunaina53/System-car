<?php
include "../conn.php";

  $id=$_GET['id_mem'];

 $sql ="delete from tb_mem where id_mem=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_cos.php');
 }
 mysqli_close($con);

?>