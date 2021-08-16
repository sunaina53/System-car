
<?php
include "../conn.php";
    $cus_id = $_POST['cus_id'];
    $cus_name=$_POST['cus_name'];
    $cus_address=$_POST['cus_address'];
    $cus_tel = $_POST['cus_tel'];
    $cus_pass = md5($_POST['cus_pass']);


    
   
  
   
    $sql ="UPDATE customer SET
    cus_id = '$cus_id',
    cus_name = '$cus_name',
    cus_address = '$cus_address',
    cus_tel = '$cus_tel',
    cus_pass = '$cus_pass',
    cus_id = '$cus_id' WHERE cus_id ='$cus_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location:data_cos.php');
     echo $sql;
 }
 mysqli_close($con);

 exit();
?>