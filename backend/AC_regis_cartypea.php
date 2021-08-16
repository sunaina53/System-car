
<?php
include "../conn.php";


$ctype_name = $_POST['ctype_name'];

   
 $sql ="INSERT into car_type values(null,'$ctype_name')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_car.php ');
 }
 mysqli_close($con);

 exit();
?>