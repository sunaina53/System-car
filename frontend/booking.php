<?php
include "../conn.php";
error_reporting(error_reporting() & ~E_NOTICE);

session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '<pre>'; 

//ตัวแปรจาก session
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
                                            <h1>Booking</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

            <body>
                <div class="testbox">
                    <form name="formbooking" action="savebooking.php" method="POST">
                        <div class="banner">
                            <h1>Car Booking Form</h1>
                        </div>
                        <div class="item">
                            <p>ชื่อ</p>

                            <input name="id_mem" value="<?php echo $name_mem ?>&nbsp;<?php echo $last_mem ?>">

                        </div>
                        <div class="item">
                            <p>Email</p>
                            <input type="text" name="o_mail" />
                        </div>
                        <div class="item">
                            <p>เบอร์โทร</p>
                            <input name="tel_mem" value="<?php echo $tel_mem ?>">
                        </div>
                        <div class="item">
                            <p>ทะเบียน</p>
                            <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="เลขทะเบียน" name="number_car">
                        </div>
                        <div class="form-group">
                            <p>ข้อมูลรถ</p>
                            <label for="input-6">ยี่ห้อ</label>
                            <div class="form-group">
                                <?php
                                $sql = "select * from datacar";
                                $result = mysqli_query($con, $sql);
                                echo "<select name= 'car_brand' class = 'form-control'>";

                                while ($rs = mysqli_fetch_array($result)) {
                                    $car_id = $rs['car_id'];
                                    $car_brand = $rs['car_brand'];

                                    echo "<option value ='$car_id' class='form-control'>$car_brand</option>";
                                }
                                echo "</select>";

                                ?>

                            </div>
                            <div class="form-group">

                                <label for="input-6">งานบริการ</label>
                                <div class="form-group">
                                    <?php
                                    $sql = "select * from services";
                                    $result = mysqli_query($con, $sql);
                                    echo "<select name= 'sv_id' class = 'form-control'>";

                                    while ($rs = mysqli_fetch_array($result)) {
                                        $sv_id = $rs['sv_id'];
                                        $sv_name = $rs['sv_name'];

                                        echo "<option value ='$sv_id' class='form-control'>$sv_name</option>";
                                    }
                                    echo "</select>";

                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="input-7">ปีของรถ</label>
                                    <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="ปีของรถ" name="year_car">
                                </div>
                                <div class="form-group">
                                    <label for="input-8">ระยะไมล์</label>
                                    <input type="text" class="form-control form-control-rounded" id="input-8" placeholder="" name="mile">
                                </div>
                                <div class="form-group">
                                        <label for="input-9">วันจองคิว</label>
                                        <input type="date"class="form-control form-control-rounded" name="o_daterq" value="วันจองคิว" min="<?php echo date('dd-mm-yy');?>">


                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>เวลาที่นัดหมาย</label>
                                <input type="time" class="form-control form-control-rounded" name="o_timerq" required class="form-control" min="<?php echo 'timezone_location_get'; ?>">


                            </div>
                            <div class="btn-block">
                                <button type="submit" href="/">SEND</button>
                            </div>
                    </form>
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