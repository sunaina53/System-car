
<?php
include "../conn.php";
    $sp_id = $_POST['sp_id'];
    $sp_name = $_POST['sp_name'];
    $sp_price = $_POST['sp_price'];
    $sp_point=$_POST['sp_point'];
    $sp_unit=$_POST['sp_unit'];
    $sptype_id=$_POST['sptype_id'];
    $sp_balance=$_POST['sp_balance'];

    $sql ="UPDATE dataspare SET
    sp_id = '$sp_id',
    sp_name = '$sp_name',
    sp_price = '$sp_price',
    sp_unit = '$sp_unit',
    sp_point = '$sp_point',
    sptype_id = '$sptype_id',
    sp_balance = '$sp_balance',
    sp_id = '$sp_id' WHERE sp_id ='$sp_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
    header('location: data_spare.php ');
   //  echo $sql;
 }
 mysqli_close($con);

 exit();
?>