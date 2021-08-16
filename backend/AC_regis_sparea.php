
<?php
include "../conn.php";


$sp_name = $_POST['sp_name'];
$sp_price = $_POST['sp_price'];
$sp_point=$_POST['sp_point'];
$sp_unit=$_POST['sp_unit'];
$spare_type=$_POST['spare_type'];
$sp_balance=$_POST['sp_balance'];

    
   
  
   
 $sql ="INSERT into dataspare values(null,'$sp_name','$sp_price','$sp_point','$sp_unit' ,'$spare_type','$sp_balance')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_spare.php ');
 }
 mysqli_close($con);

 exit();
?>