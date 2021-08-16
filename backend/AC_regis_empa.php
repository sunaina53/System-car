
<?php
include "../conn.php";

    $em_name=$_POST['em_name'];
    $em_address=$_POST['em_address'];
    $em_tel = $_POST['em_tel'];
    $em_position = $_POST['em_position'];
    $em_user=$_POST['em_user'];
    $em_pass=md5($_POST['em_pass']);

    
   
  
   
 $sql ="INSERT into emp values(null,'$em_name','$em_address','$em_tel','$em_position','$em_user' ,'$em_pass')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_emp.php ');
 }
 mysqli_close($con);

 exit();
?>