
<?php
include "../conn.php";
    $car_id = $_POST['car_id'];
    $car_brand = $_POST['car_brand'];
    $car_model = $_POST['car_model'];
    $car_type=$_POST['car_type'];
   

    $sql ="UPDATE datacar SET
    car_id = '$car_id',
    ctype_id = '$car_type',
    car_brand = '$car_brand',
    car_model = '$car_model',
    car_id = '$car_id' WHERE car_id ='$car_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location: data_car.php ');
    //echo $sql;
 }
 mysqli_close($con);

 exit();
?>