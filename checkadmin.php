<?php
session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
unset($_SESSION['UserNameAdmin']);
unset($_SESSION['NameAdmin']);
unset($_SESSION['SurnameAdmin']);

//$_SESSION['check'] = false;

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "major";

$conn = mysqli_connect($hostname, $username, $password);
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได ้");
mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล major ได ้");

$sqltxt = "SELECT * FROM admin WHERE UserName = '$Username'";

$result = mysqli_query($conn, $sqltxt);
$rs = mysqli_fetch_array($result);
if ($rs) // พบ Username
{
    if ($rs['Password'] == $Password) { //Password ตรงกัน
        $_SESSION['UserNameAdmin'] = $Username;
        $_SESSION['NameAdmin'] = $rs["Name"];
        $_SESSION['SurnameAdmin'] = $rs["Surname"];

        //$_SESSION['check'] = true;
        header("Location: indexadmin.php");
    } else {
        header("Location: adminlogin.php");
        echo "<br>Password not match.";
    }
} else {
    header("Location: adminlogin.php");
    echo "Not found UserName " . $UserName;
}