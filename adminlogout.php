<?php
session_start(); //เรยี กฟังกช์ นั่ session_start() เพอื่ เรมิ่ ใชง้ําน session
//if ($_SESSION['check'] == false) {
//    header("Location: userlogin.php");
//}
unset($_SESSION['UserNameAdmin']);
unset($_SESSION['NameAdmin']);
unset($_SESSION['SurnameAdmin']);

header("Location: adminlogin.php");
