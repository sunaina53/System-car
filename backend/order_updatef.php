<?php
include "../conn.php";

$o_id = $_GET['o_id'];




$sql = "SELECT orders.*,tb_mem.*,services.*,datacar.car_brand 
FROM(((orders INNER JOIN tb_mem on orders.id_mem=tb_mem.id_mem) 
INNER JOIN services on orders.sv_id=services.sv_id ) 
INNER JOIN datacar on orders.car_id=datacar.car_id) 
WHERE orders.o_id=$o_id;";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rs);

$id_mem = $row['id_mem'];
$tel_mem = $row['tel_mem'];
$name_mem = $row['name_mem'];
$last_mem = $row['last_mem'];
$o_mail = $row['o_mail'];
$number_car = $row['number_car'];
$sv_id = $row['sv_id'];
$o_date = $row['o_date'];
$year_car = $row['year_car'];
$mile = $row['mile'];
$o_daterq = $row['o_daterq'];
$o_timerq = $row['o_timerq'];
$car_brand = $row['car_brand'];
$sv_name = $row['sv_name'];

?>
<!DOCTYPE html>
<html>

<head>
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
<style>
    html,
    body {
        min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    p {
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 22px;
    }

    h1 {
        position: absolute;
        margin: 0;
        font-size: 36px;
        color: #fff;
        z-index: 2;
    }

    .testbox {
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        padding: 20px;
    }

    form {
        width: 100%;
        padding: 20px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 20px 0 #333;
    }

    .banner {
        position: relative;
        height: 210px;
        background-image: url("/uploads/media/default/0001/02/328c356e9bba5add698e405d0059aa4207d8f1f6.jpeg");
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .banner::after {
        content: "";
        background-color: rgba(0, 0, 0, 0.4);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    input,
    textarea,
    select {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input {
        width: calc(100% - 10px);
        padding: 5px;
    }

    select {
        width: 100%;
        padding: 7px 0;
        background: transparent;
    }

    textarea {
        width: calc(100% - 12px);
        padding: 5px;
    }

    .item:hover p,
    .item:hover i,
    .question:hover p,
    .question label:hover,
    input:hover::placeholder {
        color: #333;
    }

    .item input:hover,
    .item select:hover,
    .item textarea:hover {
        border: 1px solid transparent;
        box-shadow: 0 0 6px 0 #333;
        color: #333;
    }

    .item {
        position: relative;
        margin: 10px 0;
    }

    input[type="date"]::-webkit-inner-spin-button {
        display: none;
    }

    .item i,
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: absolute;
        font-size: 20px;
        color: #a9a9a9;
    }

    .item i {
        right: 1%;
        top: 30px;
        z-index: 1;
    }

    [type="date"]::-webkit-calendar-picker-indicator {
        right: 0;
        z-index: 2;
        opacity: 0;
        cursor: pointer;
    }

    input[type="time"]::-webkit-inner-spin-button {
        margin: 2px 22px 0 0;
    }

    input[type=radio],
    input.other {
        display: none;
    }

    label.radio {
        position: relative;
        display: inline-block;
        margin: 5px 20px 10px 0;
        cursor: pointer;
    }

    .question span {
        margin-left: 30px;
    }

    label.radio:before {
        content: "";
        position: absolute;
        top: 2px;
        left: 0;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 2px solid #ccc;
    }

    #radio_5:checked~input.other {
        display: block;
    }

    input[type=radio]:checked+label.radio:before {
        border: 2px solid #444;
        background: #444;
    }

    label.radio:after {
        content: "";
        position: absolute;
        top: 7px;
        left: 5px;
        width: 7px;
        height: 4px;
        border: 3px solid #fff;
        border-top: none;
        border-right: none;
        transform: rotate(-45deg);
        opacity: 0;
    }

    input[type=radio]:checked+label:after {
        opacity: 1;
    }

    .btn-block {
        margin-top: 10px;
        text-align: center;
    }

    button {
        width: 150px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #444;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background: #666;
    }

    @media (min-width: 568px) {

        .name-item,
        .city-item {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .name-item input,
        .city-item input {
            width: calc(50% - 20px);
        }

        .city-item select {
            width: calc(50% - 8px);
        }
    }
</style>


<body>
    <?php
    include "object/sidebar.php";
    include "object/_nev.php";
    include "object/list_orderstatus.php";
    ?>
    </div>
    <div class="text-right">
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="container">

                        <!-- BEGIN INVOICE -->
                        <div class="col-xs-10">
                            <div class="grid invoice">
                                <div class="grid-body">
                                    <div class="invoice-title">
                                    </div>
                                    <br>
                                  
                                        <div class="col-xs-12">
                                            <h2>ข้อมูลการจอง<br>
                                                <span class="small">order <?php echo $o_id ?></span>
                                            </h2>
                                        </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                            <a class="btn btn-primary btn-learn" href="spare.php?o_id=<?=$o_id?>"> <i class="icon-play4"></i> เพิ่มอะไหล่</a>
                                            </h2>
                                        </div>
                                <hr>
                                <div class="row m-0" style="justify-content: space-between;" sta472>
                                    <div class="col-xs-12">
                                        <address>
                                            <strong>ข้อมูลลูกค้า</strong><br>
                                            ชื่อ-สกุล : <?php echo $name_mem ?> <?php echo $last_mem ?><br>
                                            เบอร์โทร : <?php echo $tel_mem ?><br>
                                            E-mail : <?php echo $o_mail ?><br>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <address>
                                            <strong>ข้อมูลรถ</strong><br>
                                            ยี่ห้อรถ : <?php echo $car_brand ?><br>
                                            ทะเบียน : <?php echo $number_car ?><br>
                                            งานที่จะเข้าใช้บริการ : <?php echo $sv_name ?><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row m-0" style="justify-content: space-between;">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>วันที่ทำรายการ</strong><br>
                                            <?php echo $o_date ?>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <address>
                                            <strong>วันนัดเข้าใช้บริการ : </strong>
                                            <?php echo $o_daterq ?><br>

                                            <strong>เวลา : </strong>
                                            <?php echo $o_timerq ?><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>อะไหล่</h3>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="line">
                                                    <td><strong>ID</strong></td>
                                                    <td class="text-center"><strong>รายการอะไหล่</strong></td>
                                                    <td class="text-center"><strong>จำนวน</strong></td>
                                                    <td class="text-center"><strong>หน่วย</strong></td>
                                                    <td class="text-right"><strong>ราคา</strong></td>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right"><strong>ค่าอะไหล่รวม</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                </td>
                                                <td class="text-right"><strong>ค่ามัดจำ</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right"><strong>ค่าแรง</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right"><strong>ราคารวม</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right"><strong>มัดจำ</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="text-right"><strong>ยอดคงเหลือ</strong></td>
                                                <td class="text-right"><strong>บาท</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END INVOICE -->
                        </div>
                    </div>




                    <!-- <div class="col">
                        <form method="post" action="update_order.php?o_id=<?= $o_id ?>" enctype=multipart/form-data>
                            <div class="form-group">
                                <label for="stsv_id">สถานะคำสั่งซื้อ</label>
                                <?php

                                // $sql3 = "select * from serv_status";
                                // $result3 = mysqli_query($con, $sql3);
                                // echo "<select name= 'stsv_id' class = 'form-control'>";

                                // while ($rs3 = mysqli_fetch_array($result3)) {
                                //     $stsv_id = $rs3['stsv_id'];
                                //     $stsv_name = $rs3['stsv_name'];

                                //     if ($stsv_id == $stsv_id) {

                                //         echo "<option value='$stsv_id' selected>$stsv_name</option>";
                                //     } else {
                                //         echo "<option value ='$stsv_id'>$stsv_name</option>";
                                //     }
                                // }
                                // echo "</select>";

                                ?>
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div> -->

</body>





<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
        </div>
        <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

</html>