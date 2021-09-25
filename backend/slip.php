<!DOCTYPE html>
<html>

<head>
	<title>Slip</title>
	<?php
	include "../conn.php";
	$o_id = $_GET['o_id'];
	$sql = "SELECT orders.*,orders_details.*,dataspare.*,tb_mem.*
			FROM (((orders 
			INNER JOIN orders_details on orders.o_id=orders_details.o_id) 
			INNER JOIN dataspare on dataspare.sp_id=orders_details.sp_id) 
			INNER JOIN tb_mem on tb_mem.id_mem=orders.id_mem) 
			where orders.o_id=$o_id;";  //รับค่าตัวแปร  ที่ส่งมา
	$rs = mysqli_query($con, $sql);
	$rs2 = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($rs);
	//	echo $sql;
	// while($rs=mysqli_fetch_array($result)){
	// 	$o_id=$rs['o_id'];
	// 	$o_date=$rs['order_date'];}

	include "object/sidebar.php";
	include "object/_nev.php";

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
		<link rel="stylesheet" href="./assets/css/stylespayment.css">

	</head>

<body>
	<!-- <section class="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>thank for order</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
		</section> -->
	<div>
		<p></p><br>

	</div>
	<div class="container">
		<div class="row"style="
    justify-content: center;" >
			<!-- BEGIN INVOICE -->
			<div class="col-xs-12">
				<div class="grid invoice">
					<div class="grid-body">
						<div class="invoice-title">
							<div class="row">
								<div class="col-xs-12">
									<img src="img/logolbl.png" alt="" height="35" align="center">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12">

									<h2>ใบเสร็จรับเงิน<br>
										<span class="small">order #<?= $o_id ?></span>
									</h2>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-6">
								<address>
									<strong>ชื่อลูกค้า : คุณ</strong>
									<?php echo $row['name_mem']; ?><br>

									<abbr title="เบอร์โทรศัพท์"><strong>เบอร์โทรศัพท์ : </strong></abbr> <?php echo $row['tel_mem']; ?>
								</address>
							</div>
							<div class="col-xs-6 text-right">
								<address>

								</address>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<address>
									<strong>วันที่นัดหมาย:</strong><br>
									<?php echo $row['o_daterq']; ?><br>
									<strong>เวลา:</strong><br>
									<?php echo $row['o_timerq']; ?><br>

								</address>
							</div>
							<div class="col-xs-6 text-right">
								<address>
									<!-- <strong>วันที่ทำรายการ:</strong><br> -->
								</address>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h3>รายการสินค้า</h3>
								<table class="table table-striped">
									<thead>
										<tr class="line">
											<td><strong>#</strong></td>
											<td class="text-center"><strong>รายการอะไหล่</strong></td>
											<td class="text-center"><strong>จำนวน</strong></td>
											<td class="text-center"><strong>ราคา</strong></td>
											<td class="text-right"><strong>ราคารวม</strong></td>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										$total2 = 0;
										while ($row2 = mysqli_fetch_array($rs2)) {
											$sp_id = $row2['sp_id'];
											$sp_name = $row2['sp_name'];
											$sp_price = $row2['sp_price'];
											$wage = $row2['wage'];
											$total = $row2['total'];
											$i++;
											$sum = $row2['total'];
											$total2 += $sum;
											$sum2 = $total2 + $wage;
										?>
											<tr>
												<td><?php echo $i ?></td>
												<td><strong><?php echo $sp_name ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td>
												<td class="text-center"><?php echo $row2['qty']; ?></td>
												<td class="text-center"><?php echo $sp_price ?></td>
												<td class="text-right"><?php echo $row2['total'] ?></td>
											</tr>
										<?php
										}
										?>
										<tr>
										<tr>
											<td colspan="3"></td>
											<td class="text-right"><strong>ราคารวม</strong></td>
											<td class="text-right"><strong>฿<?php echo  number_format($total2, 2) ?></strong></td>
										</tr>

										<td colspan="3">
										</td>
										<td class="text-right">ค่าแรง</td>
										<td class="text-right">฿<?php echo $wage ?> </td>
										</tr>
										<td colspan="3">
										</td>
										
										</tr>
										<tr>
											<td colspan="3"></td>
											<td class="text-right"><strong>ราคารวมสุทธิ</strong></td>
											<td class="text-right"><strong>฿<?php echo  number_format($sum2, 2) ?></strong></td>
										</tr>
									</tbody>

								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-right identity">
							</div>
						</div>
					</div>
				</div>
                <button class="btn btn-primary" onClick="window.print()"> print </button>

			</div>
			<!-- END INVOICE -->


</body>

<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>


</html>