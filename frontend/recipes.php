<?php
include "../conn.php";
error_reporting(error_reporting() & ~E_NOTICE);

session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '<pre>'; 
$b_id = $_GET['b_id'];
// echo $b_id;
$id_mem = $_SESSION['id_mem'];
$username = $_SESSION['username'];
$userlevel = $_SESSION['userlevel'];
$name_mem = $_SESSION["name_mem"];
$tel_mem = $_SESSION["tel_mem"];
$last_mem = $_SESSION["last_mem"];




// เงื่อนไขตรวจสอบ
if ($userlevel != 'พนักงาน' and $userlevel != 'สมาชิก') {
    header("./location: logout.php");
}

session_write_close();

$sql = "SELECT booking.*,tb_mem.*,services.*,datacar.car_brand 
FROM(((booking INNER JOIN tb_mem on booking.id_mem=tb_mem.id_mem) 
INNER JOIN services on booking.sv_id=services.sv_id ) 
INNER JOIN datacar on booking.car_id=datacar.car_id) 
WHERE booking.b_id=$b_id;";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_array($rs);


$id_mem = $_SESSION['id_mem'];
$tel_mem = $_SESSION['tel_mem'];

$b_mail = $row['b_mail'];
$car_num = $row['car_num'];
$sv_id = $row['sv_id'];
$b_dateaction = $row['b_dateaction'];
$year_car = $row['year_car'];
$mile = $row['mile'];
$b_date = $row['b_date'];
$b_time = $row['b_time'];
$car_brand = $row['car_brand'];
$sv_name = $row['sv_name'];

?>


<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="freehtml5.co" />


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>


    <title>Car Booking Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container-wrap">
                <div class="top-menu">
                    <div class="row">
                        <div class="col-md-12 col-offset-0 text-center">
                            <div id="fh5co-logo"><a href="index.php">ร้านซ่อมรถยนต์สะปำ</a></div>
                        </div>
                        <?php
                        include "assets/menu-1.php";
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-wrap">
            <aside id="fh5co-hero">
                <div class="flexslider">
                    <ul class="slides">
                        <li style="background-image: url(images/img_bg_2.jpg);">
                            <div class="overlay"></div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 text-center slider-text">
                                        <div class="slider-text-inner">
                                            <h1>ประเมินราคา</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

            <body>
                <div class="container">
                    <div class="row">
                        <!-- BEGIN INVOICE -->
                        <div class="col-xs-10">
                            <div class="grid invoice">
                                <div class="grid-body">
                                    <div class="invoice-title">
                                        <div class="row">
                                            <div class="col-xs-12">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h2>ยืนยันข้อมูลการจอง<br>
                                                    <span class="small">order <?php echo $b_id ?></span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <strong>ข้อมูลลูกค้า</strong><br>
                                                ชื่อ-สกุล : <?php echo $name_mem ?> <?php echo $last_mem ?><br>
                                                เบอร์โทร : <?php echo $tel_mem ?><br>
                                                E-mail : <?php echo $b_mail ?><br>
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong>ข้อมูลรถ</strong><br>
                                                ยี่ห้อรถ : <?php echo $car_brand ?><br>
                                                ทะเบียน : <?php echo $car_num ?><br>
                                                งานที่จะเข้าใช้บริการ : <?php echo $sv_name ?><br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <address>
                                                <strong>วันที่ทำรายการ</strong><br>
                                                <?php echo $b_dateaction ?>
                                            </address>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <address>
                                                <strong>วันนัดเข้าใช้บริการ : </strong>
                                                <?php echo $b_date ?><br>

                                                <strong>เวลา : </strong>
                                                <?php echo $b_time ?><br>
                                            </address>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
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
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><strong>Template Design</strong><br>can modsetup a website.</td>
                                                        <td class="text-center">15</td>
                                                        <td class="text-center">$75</td>
                                                        <td class="text-right">$1,125.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><strong>Template Development</strong><br>fprivate network).</td>
                                                        <td class="text-center">15</td>
                                                        <td class="text-center">$75</td>
                                                        <td class="text-right">$1,125.00</td>
                                                    </tr>
                                                    <tr class="line">
                                                        <td>3</td>
                                                        <td><strong>Testing</strong><br>Take m performanactice.</td>
                                                        <td class="text-center">2</td>
                                                        <td class="text-center">$75</td>
                                                        <td class="text-right">$150.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td class="text-right"><strong>ค่าอะไหล่รวม</strong></td>
                                                        <td class="text-right"><strong>บาท</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                        </td>
                                                        <td class="text-right"><strong>ค่ามัดจำ</strong></td>
                                                        <td class="text-right"><strong>$2,400.00</strong></td>
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
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p class="text-center mt--1"><a class="btn btn-primary btn-learn" href="index.php"> <i class="icon-play4"></i> กลับสู่หน้าแรก</a> </p>

                        <!-- END INVOICE -->
                    </div>
                </div>

            </body>

</html>







<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<?php
include "assets/footer.html";

?>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Counters -->
<script src="js/jquery.countTo.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>

</html>