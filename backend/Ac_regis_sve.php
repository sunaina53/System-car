
<?php
include "../conn.php";
    $sv_id = $_POST['sv_id'];
    $sv_name = $_POST['sv_name'];
   
    $sql ="UPDATE services SET
    sv_id = '$sv_id',
    sv_name = '$sv_name',
    sv_id = '$sv_id' WHERE sv_id ='$sv_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location: data_services.php ');
    //echo $sql;
 }
 mysqli_close($con);

 exit();
?>