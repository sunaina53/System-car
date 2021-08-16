
<?php
include "../conn.php";


$stsv = $_POST['stsv_name'];


   
 $sql ="INSERT into serv_status values(null,'$stsv')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_status.php ');
 }
 mysqli_close($con);

 exit();
?>