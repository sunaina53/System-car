<?php


include "../conn.php";
error_reporting(error_reporting() & ~E_NOTICE);
session_start();




$sql = "select * from dataspare";
$result = mysqli_query($con, $sql);

$sql2 = "select * from order ";
$result2 = mysqli_query($con, $sql2);

include "object/sidebar.php";
include "object/_nev.php";

?>

<!DOCTYPE html>
<html>

<<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Maindata</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">

        <p><a href="cart.php">กลับหน้าตะกร้าสินค้า</a> &nbsp; </p>
        </table>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-5" style="background-color:#f4f4f4">
        <h3 align="center" style="color:green">
          <span class="glyphicon glyphicon-shopping-cart"> </span>
          เพิ่มค่าแรง
        </h3>
        <form name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <label>ค่าแรงช่าง(บาท)</label>
              <input type="text" name="wage" placeholder="ค่าแรงช่างในบิลนี้" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label>หมายเหตุ*</label>
              <textarea name="comment" class="form-control" rows="2"  placeholder="ถ้ามี"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12" align="center">
              <button type="submit" class="btn btn-primary" id="btn">
                ยืนยันข้อมูล </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>