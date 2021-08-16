<!-- หน้า login เช็ค-->
<?php 
session_start();
        if(isset($_POST['username'])){
        include "../conn.php";
                  $username = $_POST['username'];
                  $password = md5($_POST['password']);

                  $sql="SELECT * FROM tb_mem WHERE username='".$username."' AND password='".$password."' ";
                // echo $sql;
                // exit();
                 $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1){


      $row = mysqli_fetch_array($result);

      $_SESSION["id_mem"] = $row["id_mem"];
      $_SESSION["username"] = $row["username"];

      $_SESSION["name_mem"] = $row["name_mem"];
      $_SESSION["last_mem"] = $row["last_mem"];
      $_SESSION["userlevel"] = $row["userlevel"];
      $_SESSION["tel_mem"] = $row["tel_mem"];

      if($_SESSION["userlevel"]=="แอดมิน"){ //ถ้าเป็น แอดมิน ให้กระโดดไปหน้า backend

         // echo "แอดมิน";
        Header("Location: ../backend/login.php");

      }

      if ($_SESSION["userlevel"]=="สมาชิก"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

         //echo "สมาชิกทั่วไป";
        Header("Location: booking.php");

      }

  }else{
    echo "<script>";
        echo "alert(\" User หรือ  Password ไม่ถูกต้อง\");"; 
        echo "window.history.back()";
    echo "</script>";

  }
                 
      }else{


       Header("Location: login.php"); //user & password incorrect back to login again
        
        }
?>

