
<?php
include "../conn.php";
    $em_id = $_POST['em_id'];
    $em_name=$_POST['em_name'];
    $em_address=$_POST['em_address'];
    $em_tel = $_POST['em_tel'];
    $em_position = $_POST['em_position'];
    $em_pass =md5($_POST['em_pass']);


    
   
  
   
    $sql ="UPDATE emp SET
    em_id = '$em_id',
    em_name = '$em_name',
    em_address = '$em_address',
    em_tel = '$em_tel',
    em_position = '$em_position',
    em_pass = '$em_pass',
    em_id = '$em_id' WHERE em_id ='$em_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location: data_emp.php ');
    // echo $sql;
 }
 mysqli_close($con);

 exit();
?>