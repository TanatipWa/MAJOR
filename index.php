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
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
  <?php
  session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "major";
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


        <div class="list-group">
          <a href="indexprice.php" class="list-group-item">เรียงลำดับตามราคา</a>
          <a href="indexdateshow.php" class="list-group-item">เรียงลำดับตามวันที่แสดง</a>
          <a href="#" class="list-group-item">
            <form action="indexsearch.php" method="post">
  <label for="fname">ค้นหาจากชื่อคอนเสิร์ต:</label>
  <input type="text"  class="form-control" id="name" name="fname">
  <input type="submit" class="btn btn-outline-danger" value="ค้นหา">
</form></a>
        </div>

      </div>
      <!-- /.col-lg-3 -->
      <hr>
      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <iframe width="900" height="350" src="https://www.youtube.com/embed/Wo6Lin6YELw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
              <iframe width="900" height="350" src="https://www.youtube.com/embed/7PtqylKl0Gk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
              <iframe width="900" height="350" src="https://www.youtube.com/embed/nMnksJWsoNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <hr>
        <h2 class="my-4">คอนเสิร์ต</h2>

        <?php
        $sqltxt = "SELECT * FROM concert order by ConcertID";
        $result = mysqli_query($conn, $sqltxt);

        echo "<div class=row>";

        while ($rs = mysqli_fetch_array($result)) {

          echo "<div class=col-lg-4 col-md-6 mb-4>";
          echo   "<div class=card h-100>";
          echo  "<a href=detailconcert.php?id=$rs[0]><img class=card-img-top src=$rs[9]></a>";
          echo   "<div class=card-body>";
          echo    "<h4 class=card-title>";
          echo      "<a href=detailconcert.php?id=$rs[0]>$rs[1]</a>";
          echo    "</h4>";
          echo   "<h5>$rs[7]</h5>";
          echo    "<p class=card-text>$rs[8]</p>";
          echo  "</div>";
          echo " <div class=card-footer>";
          echo    "<small class=text-muted>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
          echo  "</div>";
          echo "</div>";
          echo  "</div>";
        }
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
    <p class="m-0 text-center text-white"><a href=adminlogin.php class="btn btn-warning">เข้าสู่ระบบ ADMIN</a></p><br>
      <p class="m-0 text-center text-white">Copyright &copy; THAITICKETMAJOR 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <?
  mysqli_close($conn);
  ?>
</body>

</html>