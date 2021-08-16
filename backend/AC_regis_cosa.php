
<?php
include "../conn.php";

    $cus_name=$_POST['cus_name'];
    $cus_address=$_POST['cus_address'];
    $cus_tel = $_POST['cus_tel'];
    $cus_user=$_POST['cus_user'];
    $cus_pass=md5($_POST['cus_pass']);

    
   
  
   
 $sql ="INSERT into customer values(null,'$cus_name','$cus_address','$cus_tel','$cus_user' ,'$cus_pass')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_cos.php ');
 }
 mysqli_close($con);

 exit();
?>