
<?php
include "../conn.php";
    $ap_id = $_POST['ap_id'];
    $ap_name = $_POST['ap_name'];
   
    $sql ="UPDATE appoint SET
    ap_id = '$ap_id',
    ap_name = '$ap_name',
    ap_id = '$ap_id' WHERE ap_id ='$ap_id' ";



 $result = mysqli_query($con,$sql);


 if($result){
     header('location: data_appoint.php ');
    //echo $sql;
 }
 mysqli_close($con);

 exit();
?>