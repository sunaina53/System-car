
<?php
include "../conn.php";


$ap_name = $_POST['ap_name'];


   
 $sql ="INSERT into appoint values(null,'$ap_name')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_appoint.php ');
 }
 mysqli_close($con);

 exit();
?>