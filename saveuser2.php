<?php
//session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
//if ($_SESSION['check'] == false) {
  //  header("Location: userlogin.php");
//}

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

$inputUserame = $_POST['UserName'];
$inputPassword = $_POST['Password'];
$Status = $_POST['Status'];
$inputName = $_POST['Name'];
$inputSurname = $_POST['Surname'];

$sql = "INSERT INTO user (UserName ,Password, Status, Name, Surname) VALUES
('$inputUserame','$inputPassword','$Status', '$inputName', '$inputSurname')";

mysqli_query($conn, $sql) or die("INSERT ลงตาราง user มีข้อผิดพลาดเกิดขึ้น" .
    mysqli_error($conn));
echo "<br><br><CENTER><H2>บันทึกข้อมูลเรียบร้อย</H2><BR><BR></CENTER>";
echo "<center>";
echo "<a class=\"d-block text-center mt-2 small\" href=\"listofuser.php\">Back</a>";
mysqli_close($conn);
