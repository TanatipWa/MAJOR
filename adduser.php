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
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                </div>
            </nav>

            <div class="container-fluid">


















                <h1 class="mt-4">Add New User</h1>
                <form action="saveuser2.php"  method="post" enctype="multipart/form-data" name="Add_Product" id="Add_Product" >
 
  
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="3" align="center">Insert User Table
     </td>
    </tr>
    <tr>
      <td width="129" align="right" valign="middle">UserName :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="UserName" type="text" required="required" id="pro_name2" size="50"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="129" align="right" valign="middle">Password :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="Password" type="text" required="required" id="pro_name2" size="50"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">Status :</td>
      <td colspan="2"><label for="pro_name2"></label>
      <select name="Status" id="pro_unit" required>
          <option value="on">on</option>
          <option value="off">off</option>
      </select></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">Name :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="Name" type="text" required="required" id="pro_name2" size="50"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">Surname :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="Surname" type="text" required="required" id="pro_name2" size="50"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><button type="submit" name="button" id="button" value="ตกลง" class="btn btn-primary btn-lg">Add</button></td>
    </tr>
  </table> 
</form>
                
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