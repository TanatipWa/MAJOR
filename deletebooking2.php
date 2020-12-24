<?php
//session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
//if ($_SESSION['check'] == false) {
 //   header("Location: userlogin.php");
//}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "major";
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล major ได้");

$id = $_GET['id'];
$id2 = $_GET['id2'];
$num = $_GET['num'];

$sql = "DELETE FROM booking WHERE BookingID = '$id'";
mysqli_query($conn, $sql) or die("DELETE จาตาราง booking มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));

$sql2 = "UPDATE concert SET Amount = Amount + $num WHERE ConcertID = '$id2'";
mysqli_query($conn, $sql2) or die("DELETE จาตาราง concert มีข้อผิดพลาดเกิดขึ้น" . mysqli_error($conn));



mysqli_close($conn);
header("Location:listallofbooking.php");
