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
    $UserName = $_SESSION['UserName'];
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
    <center>

        <!-- /.col-lg-3 -->
        <hr>
        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="img/concert.jpg" width="900" height="350">
                    </div>
                </div>
            </div>

            <hr>
            <h2 class="my-4">ประวัติการจองตั๋ว <?php echo " : ".$_SESSION['UserName'] ?></h2>

            <?php
            $sqltxt = "SELECT * FROM booking WHERE UserName = '$UserName' order by BookingID";
            $result = mysqli_query($conn, $sqltxt);

            echo "<div class=row>";

            echo "<table class=\"table table-striped\">";
            echo "  <thead>";
            echo "       <tr>";
            echo "            <th scope=\"col\">รหัสการจอง</th>";
            echo "            <th scope=\"col\">วันที่ซื้อ</th>";
            echo "            <th scope=\"col\">เวลาที่ซื้อ</th>";
            echo "            <th scope=\"col\">หมายเลขคอนเสิร์ต</th>";
            echo "            <th scope=\"col\">ชื่อ</th>";
            echo "            <th scope=\"col\">นามสกุล</th>";
            echo "            <th scope=\"col\">จำนวน</th>";
            echo "            <th scope=\"col\">Tick Number</th>";
            echo "            <th scope=\"col\">ยกเลิกการจอง</th>";
            echo "       </tr>";
            echo "   </thead>";

            while ($rs = mysqli_fetch_array($result)) {

            echo "   <tbody>";
            echo "       <tr>";
            echo "            <th scope=\"row\">".$rs["BookingID"]."</th>";
            echo "            <td>".$rs["DateBooking"]."</td>";
            echo "            <td>".$rs["TimeBooking"]."</td>";
            echo "            <td><a href=\"detailconcert.php?id=".$rs["ConcertID"]."\">".$rs["ConcertID"]."</td>";
            echo "            <td>".$_SESSION['Name']."</td>";
            echo "            <td>".$_SESSION['Surname']."</td>";
            echo "            <td>".$rs["Amount"]."</td>";
            echo "            <td>".$rs["TicketNumber"]."</td>";
            echo "<td > <a href=\"deletebooking.php?id=$rs[0]&id2=$rs[3]&num=$rs[5]\" ";
            echo "onclick=\"return confirm(' ยืนยันการลบข้อมูลการจอง $rs[0] ')\">[ลบ] ";
            echo "</a></td>\n\n";
            }
            echo "    </tbody>";
            echo " </table>";
            ?>




            
        </div>
        <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->
            <br><br><br><br><br><br><br><br>
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

        <?
        mysqli_close($conn);
        ?>
</body>

</html>