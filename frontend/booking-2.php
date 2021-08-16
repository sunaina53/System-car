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
    <title> booking</title>
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
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

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
            <container>
            <form name="formbooking" action="savebooking.php" method="POST">
                    <div class="container-fluid py-5">
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="card pt-5">
                                    <div class="card-body">
                                        <div class="card-title pt-5">
                                            <h2>จองคิวนัดซ่อม/เช็ครถ</h2>
                                        </div>
                                        <hr>
                                        <form>
                                            <div class="form-group">
                                                <p>รายละเอียดผู้ติดต่อ</p>
                                                <label for="input-1">ชื่อ</label>
                                                <?php echo $name_mem ?>&nbsp;<?php echo $last_mem ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-3">เบอร์โทร</label>
                                                <?php echo $tel_mem ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-4">E-mail</label>
                                                <input type="text" class="form-control" id="input-4" placeholder="Enter Your E-mail" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="input-5">เพิ่มเติม</label>
                                                <textarea class="form-control" rows="3" id="comment" placeholder="คำแนะนำเพิ่มเติม/รายละเอียดเพิ่มเติม" name="comment"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Rigth -->
                            <div class="col-lg-6">
                                <div class="card pt-5">
                                    <div class="card-body">
                                        <form>
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
                                                        echo "<select name= 'sv_name' class = 'form-control'>";

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
                                    <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="ปีของรถ">
                                </div>
                                <div class="form-group">
                                    <label for="input-8">ระยะไมล์</label>
                                    <input type="text" class="form-control form-control-rounded" id="input-8" placeholder="">
                                </div>
                                <div class="wpb_wrapper">
                                    <div class="cost-calculator-box clearfix"><label>วันจองคิว</label>
                                        <input type="date" name="" value="วันจองคิว" min="<?php echo date('D-M-'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="cost-calculator-box clearfix page-margin-top">
                                <label>เวลาที่นัดหมาย</label>
                                <input type="time" name="order_timerq" required class="form-control" min="<?php echo 'timezone_location_get'; ?>">
                            </div>
                            <div class="btn-block">
                                <button type="submit" href="/">SEND</button>
                            </div>

                                            </div>
                    </form>
                </div>
                                </div>
                            </div>

        </container>

        <?php
        include "assets/footer.html";

        ?>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
        </div>

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