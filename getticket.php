<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
    unset($_SESSION['ConcertID']);
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THAITICKETMAJOR</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

    <?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "major";
    $id = $_GET['id'];
    $_SESSION['ConcertID'] = $id;
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
                            echo    "<a class=\"dropdown-item\" href=#>" . $_SESSION['Name'] . " " . $_SESSION['Surname'] . "</a>";
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


    <?php
    $sql = "select * from concert WHERE ConcertID = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    $Path = ""; //ระบุ path ของไฟล์รูปภาพที่จัดเก็บไว้ใน server

    $date_sale = $data["DateSale"];
    $time_sale = $data["TimeSale"];
    $amount = $data["Amount"];

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



    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row align-items-center my-5">
            <div class="col-lg-7">
                <img class="rounded mx-auto d-block" src="<?php echo $data["Picture"] ?>" alt="">
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-5">
                <form action="checkbuy.php" method="POST">
                    <h1 class="font-weight-light"><?php echo $data["ConcertName"] ?></h1>
                    <p>ราคาบัตร <?php echo $data["UnitPrice"] ?> บาท</p>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">จำนวนตั๋วที่ต้องการซื้อ :</label>
                        <select class="form-control" name="numberticket">
                            <?php
                            for ($i = 1; $i <= $amount; $i++) {
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select><br>
                        </div>
                        <?php
                        if ($checkAmount) {

                            if ($checkDateTime) {
                                echo "<button class=\"btn btn-danger btn-lg\" type=\"submit\">ซื้อบัตร</button>";
                                echo "</form>";
                            } else {
                                echo "</form>";
                                echo "<button type=button class=\"btn btn-outline-danger btn-lg\">เร็วๆนี้</button>";
                            }
                        } else {
                            echo "</form>";
                            echo "<button class=\"btn btn btn-light btn-lg\">SOLU OUT</button>";
                        }
                        ?>
                    </div>
                    <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->

            <!-- Call to Action Well -->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body">
                    <p class="text-white m-0">รายละเอียด<br><?php echo $data["Detail"] ?></p>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">วันที่แสดง</h2>
                            <p class="card-text"><?php echo $data["DateShow"] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">สถานที่แสดง</h2>
                            <p class="card-text"><?php echo $data["Location"] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">วันเปิดจำหน่าย</h2>
                            <p class="card-text"><?php echo $data["DateSale"] . ", " . $data["TimeSale"] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->

            </div>
            <!-- /.row -->

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
</body>

</html>