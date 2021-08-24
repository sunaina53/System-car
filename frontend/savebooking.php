
<?php
session_start();
include "../conn.php";


$id_mem = $_SESSION['id_mem'];
$o_mail = $_POST['o_mail'];
$tel_mem = $_SESSION['tel_mem'];
$car_id = $_POST['car_brand'];
$year_car = $_POST['year_car'];
$number_car = $_POST['number_car'];
$mile = $_POST['mile'];
$sv_id = $_POST['sv_id'];
$stsv_id="1";
$o_date = date("Y-m-d G:i:s");
$o_daterq = $_POST['o_daterq'];
$o_timerq = $_POST['o_timerq'];





$sql = "INSERT into orders values(null,'$id_mem','$o_mail','$tel_mem','$car_id','$year_car','$number_car' ,'$mile','$sv_id','$stsv_id','$o_date','$o_daterq','$o_timerq')";
$result = mysqli_query($con, $sql);

if ($result) {
   // echo $result;
   header('location: confirm.php ');
} else {
   echo $result;
}
mysqli_close($con);

exit();
?>