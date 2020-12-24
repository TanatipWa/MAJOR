<?php
session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
unset($_SESSION['UserName']);
unset($_SESSION['Name']);
unset($_SESSION['Surname']);

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "major";

$conn = mysqli_connect($hostname, $username, $password);
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได ้");
mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล major ได ้");

$sqltxt = "SELECT * FROM user WHERE UserName = '$Username'";

$result = mysqli_query($conn, $sqltxt);
$rs = mysqli_fetch_array($result);
if ($rs) // พบ Username
{
    if ($rs['Password'] == $Password) { //Password ตรงกัน
        $_SESSION['UserName'] = $Username;
        $_SESSION['Name'] = $rs["Name"];
        $_SESSION['Surname'] = $rs["Surname"];

        header("Location: index.php");
    } else {
        header("Location: userlogin.php");
        echo "<br>Password not match.";
    }
} else {
    header("Location: userlogin.php");
    echo "Not found UserName " . $UserName;
}