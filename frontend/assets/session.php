 <?            
 error_reporting( error_reporting() & ~E_NOTICE );

  session_start();
 echo '<pre>';
 print_r($_SESSION);
 echo '<pre>'; 
  include "../conn.php";

    //ตัวแปรจาก session
    $id_mem = $_SESSION['id_mem'];
    $username = $_SESSION['username'];
    $userlevel = $_SESSION['userlevel'];

    $sql2 ="SELECT * FROM tb_mem WHERE id_mem =$id_mem";
    $result2 = mysqli_query($con,$sql2) ;
    // $rs2 = mysqli_fetch_array($result2);
    // extract($rs2);

    // $id_mem = $rs2["id_mem"];
    // $name_mem = $rs2["name_mem"];
    // $last_mem= $rs2["last_mem"];
    // $userlevel = $rs2["userlevel"];
    // $tel_mem=$rs2['tel'];

    
    // เงื่อนไขตรวจสอบ
    if($userlevel!='พนักงาน'and $userlevel!='สมาชิก'){
      header ("./location: logout.php");
    }

  session_write_close();

  ?>