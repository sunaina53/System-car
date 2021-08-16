
<?php
session_start();
include "../conn.php";


$id_mem = $_SESSION['id_mem'];
$tel_mem = $_SESSION['tel_mem'];
$b_mail = $_POST['b_mail'];
$car_num = $_POST['car_num'];
$car_id = $_POST['car_brand'];
$sv_id = $_POST['sv_name'];
$year_car = $_POST['year_car'];
$mile_car = $_POST['mile_car'];
$b_date = $_POST['b_date'];
$b_time = $_POST['order_timerq'];

$b_dateaction = date("Y-m-d G:i:s");
$stsv_id="1";

$sql = "INSERT into booking values(null,'$id_mem','$b_mail','$tel_mem','$car_num','$car_id' ,'$sv_id','$stsv_id','$year_car','$mile_car','$b_date','$b_time','$b_dateaction')";
$result = mysqli_query($con, $sql);

if ($result) {
   //echo $result;
   header('location: confirm.php ');
} else {
   echo $result;
}
mysqli_close($con);

exit();
?>