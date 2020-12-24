<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THAITICKETMAJOR ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <?php
    session_start();
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
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">

            <div class="sidebar-heading"><img src="img/admin.jpg" width="200" height="90"></div>


            <div class="list-group list-group-flush">
                <a href="listofconcert.php" class="list-group-item list-group-item-action bg-light">Concert Lists</a>
                <a href="addconcert.php" class="list-group-item list-group-item-action bg-light">Add New Concert</a>
                <a href="listofuser.php" class="list-group-item list-group-item-action bg-light">User Lists</a>
                <a href="adduser.php" class="list-group-item list-group-item-action bg-light">Add New User</a>
                <a href="listallofbooking.php" class="list-group-item list-group-item-action bg-light">Booking Lists</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="indexadmin.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
            <?php


              echo "<div class=\"btn-group\">";
              echo  "<button type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
              echo   "Welcome back : ".$_SESSION['UserNameAdmin'];
              echo  "</button>";
              echo  "<div class=\"dropdown-menu\">";
              echo    "<a class=\"dropdown-item\" href=#>".$_SESSION['NameAdmin']." ".$_SESSION['SurnameAdmin']."</a>";
              echo    "<div class=\"dropdown-divider\"></div>";
              echo    "<a class=\"dropdown-item\" href=adminlogout.php>Log Out</a>";
              echo  "</div>";
              echo "</div>";
            
            ?>
                    </ul>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">


















                <h1 class="mt-4">Booking Lists</h1>
                <?php
                
                $sqltxt = "SELECT * FROM booking order by BookingID";
                $result = mysqli_query($conn, $sqltxt);
    
                echo "<div class=row>";
    
                echo "<table class=\"table table-striped\">";
                echo "  <thead>";
                echo "       <tr>";
                echo "            <th scope=\"col\">BookingID</th>";
                echo "            <th scope=\"col\">DateBooking</th>";
                echo "            <th scope=\"col\">TimeBooking</th>";
                echo "            <th scope=\"col\">ConcertID</th>";
                echo "            <th scope=\"col\">Username</th>";
                echo "            <th scope=\"col\">Amount</th>";
                echo "            <th scope=\"col\">TicketNumber</th>";
                echo "            <th scope=\"col\">แก้ไข</th>";
                echo "            <th scope=\"col\">ลบ</th>";
                echo "       </tr>";
                echo "   </thead>";
    
                while ($rs = mysqli_fetch_array($result)) {
    
                echo "   <tbody>";
                echo "       <tr>";
                echo "            <th scope=\"row\">".$rs["BookingID"]."</th>";
                echo "            <td>".$rs["DateBooking"]."</td>";
                echo "            <td>".$rs["TimeBooking"]."</td>";
                echo "            <td>".$rs["ConcertID"]."</td>";
                echo "            <td>".$rs["UserName"]."</td>";
                echo "            <td>".$rs["Amount"]."</td>";
                echo "            <td>".$rs["TicketNumber"]."</td>";
                echo "<td > <a href=\updatebooking.php?id=$rs[0]>[แก้ไข]";
                echo "</a></td>\n\n";
                echo "<td > <a href=\"deletebooking2.php?id=$rs[0]&id2=$rs[3]&num=$rs[5]\" ";
                echo "onclick=\"return confirm(' ยืนยันการลบข้อมูลUser $rs[0] ')\">[ลบ] ";
                echo "</a></td>\n\n";
                }
                echo "    </tbody>";
                echo " </table>";
                ?>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>