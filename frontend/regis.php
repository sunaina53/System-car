<!-- หน้าฟอร์มล็อคอิน -->
<?php 
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>สมัครสมาชิก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/stylelogin.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sing up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
              <form method="post" action="AC_regis.php" enctype=multipart/form-data>

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" class="form-control" placeholder="Username" required name="username">
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" required name="password">
		            </div>
                <div class="form-group mb-3">
		            	<label class="label" for="name_mem">ชื่อ</label>
                  <input class="form-control" placeholder="ชื่อ" type="text"name="name_mem" required>
		            </div>
                <div class="form-group mb-3">
			      			<label class="label" for="last_mem">นามสกุล</label>
			      			<input type="text" class="form-control" placeholder="นามสกุล" required name="last_mem">
			      		</div>
                <div class="form-group mb-3">
			      			<label class="label" for="tel_mem">เบอร์โทรศัพท์</label>
			      			<input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" required name="tel_mem">
			      		</div>
                <div class="form-group mb-3">
			      			<label class="label" for="address_mem">ที่อยู่</label>
			      			<input type="text" class="form-control" placeholder="ที่อยู่" required name="address_mem">
			      		</div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            
										</label>
									</div>
									<div class="w-50 text-md-right">
									
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

