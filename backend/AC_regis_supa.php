
<?php
include "../conn.php";

    $sup_name=$_POST['sup_name'];
    $sup_address=$_POST['sup_address'];
    $sup_tel = $_POST['sup_tel'];
    

    
   
  
   
 $sql ="INSERT into supply values(null,'$sup_name','$sup_address','$sup_tel')";
 $result = mysqli_query($con,$sql);

 if($result){
    header('location: data_supply.php ');
 }
 mysqli_close($con);

 exit();
?>