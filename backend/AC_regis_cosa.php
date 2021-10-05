
<?php
include "../conn.php";

    $name_mem=$_POST['name_mem'];
    $address_mem=$_POST['address_mem'];
    $tel_mem = $_POST['tel_mem'];
    $userlevel=$_POST['userlevel'];
    $password=md5($_POST['password']);

    
   
  
   
 $sql ="INSERT into customer values(null,'$name_mem','$address_mem','$tel_mem','$userlevel' ,'$password')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_cos.php ');
 }
 mysqli_close($con);

 exit();
?>