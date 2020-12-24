<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>THAITICKETMAJOR</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <?php
  session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "major";
  $id = $_GET['id'];
  $conn = mysqli_connect($hostname, $username, $password);
  if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
  mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล major ได้");

  mysqli_query($conn, "SET character_set_results=UTF8");
  mysqli_query($conn, "SET character_set_client=UTF8");
  mysqli_query($conn, "SET character_set_connection=UTF8");

  date_default_timezone_set('Asia/Bangkok');
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/ttm-logo2.png" width="100" height="25"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['UserName'])) {

              echo "<div class=\"btn-group\">";
              echo  "<button type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
              echo    $_SESSION['UserName'];
              echo  "</button>";
              echo  "<div class=\"dropdown-menu\">";
              echo    "<a class=\"dropdown-item\" href=#>".$_SESSION['Name']." ".$_SESSION['Surname']."</a>";
              echo    "<div class=\"dropdown-divider\"></div>";
              echo    "<a class=\"dropdown-item\" href=listofbooking.php>ประวัติการสั่งซื้อ</a>";
              echo    "<div class=\"dropdown-divider\"></div>";
              echo    "<a class=\"dropdown-item\" href=userlogout.php>ออกจากระบบ</a>";
              echo  "</div>";
              echo "</div>";
            } else {
              echo "<a href=userlogin.php class=\"btn btn-danger\">เข้าสู่ระบบ</a>";
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4"><img src="img/ttm-logo.png" width="260" height="80"></h1>
        
      </div>
      <!-- /.col-lg-3 -->

      <?php
      $sql = "select * from concert WHERE ConcertID = '$id'";
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($result);
      $Path = ""; //ระบุ path ของไฟล์รูปภาพที่จัดเก็บไว้ใน server

      $date_sale = $data["DateSale"];
      $time_sale = $data["TimeSale"];

      $checkDateTime = false;
      if ($date_sale < date("Y-m-d")) {
        $checkDateTime = true;
      } else if ($date_sale = date("Y-m-d") && $time_sale >= date("H:i:A")) {
        $checkDateTime = true;
      }

      $number_sale = $data["Amount"];

      $checkAmount = false;
      if ($number_sale > 0) {
        $checkAmount = true;
      }
      ?>

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="rounded mx-auto d-block" src="<?php echo $data["Picture"] ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $data["ConcertName"] ?></h3>
            <h4>ราคาบัตร <?php echo $data["UnitPrice"] ?> บาท</h4>
            <br>

            <?php
            if ($checkAmount) {

              if ($checkDateTime) {
                echo "<a href=";

                if (isset($_SESSION['UserName'])) {

                  echo "getticket.php?id=$data[ConcertID]";
                } else {

                  echo "userlogin.php";
                }

                echo " class=\"btn btn-danger btn-lg\">ซื้อบัตร</a>";
              } else {
                echo "<button type=button class=\"btn btn-outline-danger btn-lg\">เร็วๆนี้</button>";
              }
            } else {
              echo "<button class=\"btn btn btn-light btn-lg\">SOLU OUT</button>";
            }
            ?>

            <br><br>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">

          <div class="card-body">
            <small class="text-muted">วันที่แสดง</small>
            <hr>
            <p><?php echo $data["DateShow"] ?></p>
            <small class="text-muted">สถานที่แสดง</small>
            <hr>
            <p><?php echo $data["Location"] ?></p>
            <small class="text-muted">วันเปิดจำหน่าย</small>
            <hr>
            <p><?php echo $data["DateSale"] . ", " . $data["TimeSale"] ?></p>
          </div>
        </div>

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            รายละเอียด
          </div>

          <div class="card-body">

            <p><?php echo $data["Detail"] ?></p>

          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; THAITICKETMAJOR 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php
  mysqli_close($conn);
  ?>
</body>

</html>