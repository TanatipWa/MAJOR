<?php
session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
//if ($_SESSION['check'] == false) {
//    header("Location: userlogin.php");
//}
unset($_SESSION['UserName']);
unset($_SESSION['Name']);
unset($_SESSION['Surname']);

header("Location: index.php");
