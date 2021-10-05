
<?php
include "../conn.php";
    $id_mem = $_POST['id_mem'];
    $name_mem=$_POST['name_mem'];
    $address_mem=$_POST['address_mem'];
    $tel_mem = $_POST['tel_mem'];
    $password = md5($_POST['password']);


    
   
  
   
    $sql ="UPDATE customer SET
    id_mem = '$id_mem',
    name_mem = '$name_mem',
    address_mem = '$address_mem',
    tel_mem = '$tel_mem',
    password = '$password',
    id_mem = '$id_mem' WHERE id_mem ='$id_mem' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location:data_cos.php');
     echo $sql;
 }
 mysqli_close($con);

 exit();
?>