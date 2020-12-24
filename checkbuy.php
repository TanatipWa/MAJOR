<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THAITICKETMAJOR</title>

    <link rel="stylesheet" type="text/css" href="css\style.css" />

</head>

<body>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "major";
    $id = $_SESSION['ConcertID'];
    $UserName = $_SESSION['UserName'];
    $numberticket = $_POST["numberticket"];
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
    mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล major ได้");

    mysqli_query($conn, "SET character_set_results=UTF8");
    mysqli_query($conn, "SET character_set_client=UTF8");
    mysqli_query($conn, "SET character_set_connection=UTF8");

    date_default_timezone_set('Asia/Bangkok');

    //************************************************
    //$query_0 = "SET autocommit=0;";
    //mysqli_query($conn, $query_0) or die("มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

    //$query_2 = "LOCK TABLE concert WRITE";
    //mysqli_query($conn, $query_2) or die("มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));


    $sqltxt = "SELECT Amount,AllAmount FROM concert WHERE ConcertID = '$id'";
    $result = mysqli_query($conn, $sqltxt);

    $rs = mysqli_fetch_array($result);
    $number_sale1 = $rs["Amount"];
    $Allamount = $rs["AllAmount"];

    $number_sale2 = 0;
    $bye = false;
    if ($number_sale1 >= $numberticket) {
        $bye = true;
        $number_sale2 =  $number_sale1 - $numberticket;
    }

    if ($bye) {
        //$query_DONE = "START TRANSACTION; 
        //LOCK TABLES concert WRITE; 
        //UPDATE concert SET Amount = $number_sale2 WHERE ConcertID = '$id';
        //COMMIT; 
        //UNLOCK TABLES";
        //echo $query_DONE."<br>";

        $sql1 = "UPDATE concert SET Amount = '$number_sale2' WHERE ConcertID = '$id'";
        mysqli_query($conn, $sql1) or die("มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));
    }

    if ($bye) {

        echo "<div class =box>";

        echo "<div class=fulllogo>";
        echo "<div class =logo>";
        echo "<img src=img/ttm-logo.png width=260 height=80>";
        echo "</div>";
        echo "</div>";

        echo "<div class = logoT >";
        echo "<img src=img/congratulations.svg >";
        echo "</div>";

        echo "<div class=text>";
        echo "Congratulations !";

        echo "</div>";
        echo "<div class=yourTicket>";
        echo "Your ticket number";
        echo "</div>";

        echo "<div class=number>";

        $ticketNumber = "";
        for ($i = 1; $i <= $numberticket; $i++) {
            $temp = ($Allamount + 1) - $number_sale1 + ($i - 1);
            printf("C%04d", $temp);
            $ticketNumber = $ticketNumber . sprintf("C%04d", $temp);
            if ($i != $numberticket) $ticketNumber = $ticketNumber . ":";
            echo "<br>";
        }

        $DateBooking = date("Y-m-d");
        $TimeBooking = date("H:i:A");

        $sql = "INSERT INTO booking (DateBooking, TimeBooking, 
        ConcertID, UserName, Amount, TicketNumber) 
        VALUES ('$DateBooking','$TimeBooking','$id','$UserName','$numberticket','$ticketNumber')";

        mysqli_query($conn, $sql) or die("INSERT ลงตาราง user มีข้อผิดพลาดเกิดขึ้น" .
            mysqli_error($conn));


        echo "</div>";

        echo "<div class=under>";
        echo "Concert in your area<br>";
        echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

        echo "</div>";
    } else {
        echo "<div class =box>";

        echo "<div class=fulllogo>";
        echo "<div class =logo>";
        echo "<img src=img/ttm-logo.png width=260 height=80>";
        echo "</div>";
        echo "</div>";

        echo "<div class = logoT >";
        echo "<img src=img/sad.svg >";
        echo "</div>";

        echo "<div class=text>";
        echo "Sold out";

        echo "</div>";
        echo "<div class=yourTicket>";
        echo "Maybe next time.";
        echo "</div>";

        echo "<div class=under>";
        echo "Concert in your area<br>";
        echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

        echo "</div>";
    }
    ?>
    </div>

    <?php
    //************************************************************ */
    //$query_4 = "COMMIT";
    //mysqli_query($conn, $query_4) or die("มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

    //$query_3 = "UNLOCK TABLES";
    //mysqli_query($conn, $query_3) or die("มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

    mysqli_close($conn);
    ?>
</body>


</body>

</html>