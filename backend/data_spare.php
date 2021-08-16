<?php
include "../conn.php";

$sql="SELECT * FROM dataspare 
INNER JOIN spare_type ON dataspare.sptype_id = spare_type.sptype_id 
ORDER BY sp_id ASC";
$result=mysqli_query($con,$sql);

    
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
<?php
    include "object/sidebar.php";
    include "object/_nev.php";
    include "object/listdata.php";
  ?>
            </div>
            <div class="text-right">
              <a href="Ac_regis_spare.php" class="btn btn-sm btn-neutral">เพิ่มอะไหล่</a>

              <a href="Ac_regis_sparetype.php" class="btn btn-sm btn-neutral">เพิ่มประเภทอะไหล่</a>
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
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">ข้อมูลอะไหล่</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" data-sort="ID">ID</th>
                    <th scope="col" class="sort" data-sort="name">ชื่ออะไหล่</th>
                    <th scope="col" class="sort" data-sort="price">ราคา</th>
                    <th scope="col" class="sort" data-sort="point">จุดสั่งซื้อ</th>
                    <th scope="col" class="sort" data-sort="unit">หน่วย</th>
                    <th scope="col" class="sort" data-sort="sptype">ประเภทอะไหล่</th>
                    <th scope="col" class="sort" data-sort="balance">จำนวน</th>
                    <th scope="col"class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                while($rs=mysqli_fetch_array($result)){
                  $sp_id = $rs['sp_id'];
                  $sp_name = $rs['sp_name'];
                  $sp_price = $rs['sp_price'];
                  $sp_point=$rs['sp_point'];
                  $sp_unit=$rs['sp_unit'];
                  $sp_type=$rs['sptype_id'];
                  $sp_balance=$rs['sp_balance'];
                  $sp_typename = $rs['sptype_name'];
                ?>
                  
                </thead>
                <tbody class="list">
                 
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $sp_id?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                    <?php echo $sp_name?>
                    </td>
                    
                    <td class="budget">
                    <?php echo $sp_price?>
                    </td>
                    
                    <td class="budget">
                    <?php echo $sp_point?>
                    </td>
                    <td class="budget">
                    <?php echo $sp_unit?>
                    </td>
                    <td class="budget">
                    <?php echo $sp_typename?>
                    </td>
                    <td class="budget">
                    <?php echo $sp_balance?>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          
                          <a class="dropdown-item" href="Ac_regis_sparefe.php?sp_id=<?=$sp_id?>">แก้ไขข้อมูล</a>
                          <a class="dropdown-item" href="AC_regis_spared.php?sp_id=<?=$sp_id?>"role="button "onclick=" return confirm('Are you sure want to delete?');">ลบอะไหล่</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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