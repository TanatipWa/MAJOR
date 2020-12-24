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
date_default_timezone_set('Asia/Bangkok');

$ConcertID = $_POST['ConcertID'];
$ConcertName = $_POST['ConcertName'];
$DateSale = $_POST['DateSale'];
$TimeSale = $_POST['TimeSale'];
$UnitPrice = $_POST['UnitPrice'];
$Amount = $_POST['Amount'];
$AllAmount = $_POST['AllAmount'];
$DateShow = $_POST['DateShow'];
$Location = $_POST['Location'];
$Detail = $_POST['Detail'];
$Picture = $_POST['Picture'];

$target_file = " ";
$uploadOk = 1;
if (isset($_FILES["ImageFile"]) && $_FILES['ImageFile']['size'] != 0) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["ImageFile"]["name"]);
    //$target_file2 = basename($_FILES["ImageFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["Submit"])) {
        $check = getimagesize($_FILES["ImageFile"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    // Allow certain file formats
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["ImageFile"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["ImageFile"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

//---------------------------------------------------------
if($uploadOk = 1){
    $sql = "UPDATE concert SET ConcertName = '$ConcertName', DateSale = '$DateSale', TimeSale = '$TimeSale', UnitPrice = '$UnitPrice', Amount = '$Amount'
    , AllAmount = '$AllAmount', DateShow = '$DateShow', Location = '$Location', Picture = '$target_file', Detail = '$Detail' WHERE ConcertID = '$ConcertID'";  


}else
 
$sql = "UPDATE concert SET ConcertName = '$ConcertName', DateSale = '$DateSale', TimeSale = '$TimeSale', UnitPrice = '$UnitPrice', Amount = '$Amount'
, AllAmount = '$AllAmount', DateShow = '$DateShow', Location = '$Location', Picture = '$Picture' , Detail = '$Detail' WHERE ConcertID = '$ConcertID'";  

mysqli_query($conn, $sql) or die("INSERT ลงตาราง concert มีข้อผิดพลาดเกิดขึ้น" .
    mysqli_error($conn));
echo "<br><br><CENTER><H2>บันทึกข้อมูลเรียบร้อย</H2><BR><BR></CENTER>";
echo "<center>";
echo "<a class=\"d-block text-center mt-2 small\" href=\"addconcert.php\">Back</a>";

mysqli_close($conn);
