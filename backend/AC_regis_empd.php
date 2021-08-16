<?php
include "../conn.php";

  $id=$_GET['em_id'];

 $sql ="delete from emp where em_id=$id";
 $result = mysqli_query($con,$sql);

 if($result){
     header('location: data_emp.php');
 }
 mysqli_close($con);

?>