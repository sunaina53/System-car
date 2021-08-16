
<?php
include "../conn.php";
    $stsv_id = $_POST['stsv_id'];
    $stsv_name = $_POST['stsv_name'];
   
    $sql ="UPDATE serv_status SET
    stsv_id = '$stsv_id',
    stsv_name = '$stsv_name',
    stsv_id = '$stsv_id' WHERE stsv_id ='$stsv_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location: data_status.php ');
    //echo $sql;
 }
 mysqli_close($con);

 exit();
?>