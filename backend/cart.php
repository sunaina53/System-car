<?php


include "../conn.php";
error_reporting(error_reporting() & ~E_NOTICE);
session_start();

$sp_id = $_REQUEST['sp_id'];
$act = $_REQUEST['act'];

if ($act == 'add' && !empty($sp_id)) {
    if (!isset($_SESSION['cart'])) {

        $_SESSION['cart'] = array();
    } else {
    }
    if (isset($_SESSION['cart'][$sp_id])) {
        $_SESSION['cart'][$sp_id]++;
    } else {
        $_SESSION['cart'][$sp_id] = 1;
    }
}

if ($act == 'remove' && !empty($sp_id))  //ยกเลิกการสั่งซื้อ
{
    unset($_SESSION['cart'][$sp_id]);
}

if ($act == 'update') {
    $amount_array = $_POST['amount'];
    foreach ($amount_array as $sp_id => $amount) {
        $_SESSION['cart'][$sp_id] = $amount;
    }
}


$sql = "select * from dataspare";
$result = mysqli_query($con, $sql);

$sql2 = "select * from order ";
$result2 = mysqli_query($con, $sql2);

include "object/sidebar.php";
include "object/_nev.php";
include "object/listdataspare.php";
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

<body>

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
                    <!-- Dark table -->
                    <form id="frmcart" name="frmcart" method="post" action="?act=update">
                        <div class="container">
                            <div class="blog">
                                <p>
                                <h1 style="text-align:center; ">รายการอะไหล่</h1>
                            </div>

                            <div class="row">
                                <table class="table">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>สินค้า</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>รวม</th>
                                            <th>ลบ</th>
                                        </tr>
                                        <?php
                                        $total = 0;
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $sp_id => $qty) {
                                                $sql = "select * from dataspare where sp_id=$sp_id";
                                                $query = mysqli_query($con, $sql);
                                                $row = mysqli_fetch_array($query);
                                                $sum = $row['sp_price'] * $qty;
                                                $total += $sum;
                                                echo "<tr>";
                                                echo "<td >" . $row["sp_name"] . "</td>";
                                                echo "<td >" . number_format($row["sp_price"], 2) . "</td>";
                                                echo "<td >";
                                                echo "<input type='text' name='amount[$sp_id]' value='$qty' size='2'/></td>";
                                                echo "<td>" . number_format($sum, 2) . "</td>";
                                                echo "<td><a href='cart.php?sp_id=$sp_id&act=remove'>ลบ</a></td>";
                                                echo "</tr>";
                                            }
                                            echo "<tr>";
                                            echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
                                            echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                                            echo "<td align='left' bgcolor='#CEE7FF'></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" align="right">
                                                <input type="button" name="Submit2" value="สั่งอะไหล่" onclick="window.location='saveorder.php';" />
                                            </td>
                                        </tr>
                                </table>
                    </form>
                    <!-- Footer -->

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