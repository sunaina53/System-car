
<?php
include "../conn.php";


$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_type=$_POST['car_type'];


    
   
  
   
 $sql ="INSERT into datacar values(null,'$car_type','$car_brand','$car_model')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_car.php ');
 }
 mysqli_close($con);

 exit();
?>