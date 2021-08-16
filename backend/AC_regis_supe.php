
<?php
include "../conn.php";
    $sup_id = $_POST['sup_id'];
    $sup_name=$_POST['sup_name'];
    $sup_address=$_POST['sup_address'];
    $sup_tel = $_POST['sup_tel'];


    
   
  
   
    $sql ="UPDATE supply SET
    sup_id = '$sup_id',
    sup_name = '$sup_name',
    sup_address = '$sup_address',
    sup_tel = '$sup_tel',
    sup_id = '$sup_id' WHERE sup_id ='$sup_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location:data_supply.php');
     //echo $sql;
 }
 mysqli_close($con);

 exit();
?>