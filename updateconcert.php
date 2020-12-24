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
    $id = $_GET["id"];
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














<?php

            $sqltxt = "SELECT * FROM concert WHERE ConcertID = '$id'";
            $result = mysqli_query($conn, $sqltxt);
            $rs = mysqli_fetch_array($result)
        ?>

                <h1 class="mt-4">Update Concert : <?php echo $id ?></h1>
                <form action="goupdateconcert.php"  method="post" enctype="multipart/form-data" name="Add_Product" id="Add_Product" >
 
  
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="50" colspan="3" align="center">Update Concert List
     </td>
    </tr>
    <tr>
      <td width="129" align="right" valign="middle">ConcertID :</td>
      <td><input name="ConcertID" type="text" required="required" id="pro_name2" size="50" value="<?php echo $rs[0] ?>"/></td>
      <td colspan="2"><label for="pro_name2"></label>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="129" align="right" valign="middle">ConcertName :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="ConcertName" type="text" required="required" id="pro_name2" size="50" value="<?php echo $rs[1] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">DateSale :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="DateSale" type="date" required="required" id="pro_name2" size="50" value="<?php echo $rs[2] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">TimeSale :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="TimeSale" type="text" required="required" id="pro_name2" size="50" value="<?php echo $rs[3] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">UnitPrice :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="UnitPrice" type="number" required="required" id="pro_name2" size="50" value="<?php echo $rs[4] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">Amount :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="Amount" type="number" required="required" id="pro_name2" size="50" value="<?php echo $rs[5] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">AllAmount :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="AllAmount" type="number" required="required" id="pro_name2" size="50" value="<?php echo $rs[6] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">DateShow :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="DateShow" type="date" required="required" id="pro_name2" size="50" value="<?php echo $rs[7] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td width="129" align="right" valign="middle">Location :</td>
      <td colspan="2"><label for="pro_name2"></label>
        <input name="Location" type="text" required="required" id="pro_name2" size="50" value="<?php echo $rs[8] ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    
    <tr>
      <td align="right" valign="top">Detail :</td>
      <td colspan="2">
      <textarea name="Detail" id="pro_detail" cols="50" rows="3" required="required"><?php echo $rs[10] ?></textarea></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="right" valign="middle">Picture :</td>
      <td colspan="2"><label for="pro_img"></label>
      <img src="<?php echo $rs[9] ?>">
      
      <input name="Picture" type="text" required="required" id="pro_name2" size="50" value="<?php echo $rs[9] ?>"/>
        <input name="ImageFile" type="file" id="pro_img" size="40"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><button type="submit" name="button" id="button" value="ตกลง" class="btn btn-primary btn-lg">Update</button></td>
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