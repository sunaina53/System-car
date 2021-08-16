
<?php
include "../conn.php";


$sptype_name = $_POST['sptype_name'];

   
 $sql ="INSERT into spare_type values(null,'$sptype_name')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_spare.php ');
 }
 mysqli_close($con);

 exit();
?>