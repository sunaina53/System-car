
<?php
include "../conn.php";

    $name_mem=$_POST['name_mem'];
    $last_mem=$_POST['last_mem']; 
    $userlevel = $_POST['userlevel'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $tel_mem = $_POST['tel_mem'];
    $address_mem=$_POST['address_mem'];
  
    $userlevel='สมาชิก';
   
   
    
   
  
   
 $sql ="INSERT into tb_mem values(null,'$name_mem','$last_mem','$userlevel','$username' ,'$password','$tel_mem','$address_mem')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: login.php ');
 }
 mysqli_close($con);

 exit();
?>