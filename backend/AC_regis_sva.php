
<?php
include "../conn.php";


$sv_name = $_POST['sv_name'];


   
 $sql ="INSERT into services values(null,'$sv_name')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_services.php ');
 }
 mysqli_close($con);

 exit();
?>