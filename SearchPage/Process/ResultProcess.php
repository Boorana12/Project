<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../../Connection/db.php";
?>
<?php
// เก็บค่าที่เอามาจากไฟล์ Add.php ในตัวแปรดังกล่าว
$research_NameThai = $_POST['research-name-thai'];
$research_NameEnglish = $_POST['research-name-english'];
$research_Type = $_POST['research-type'];
$research_StudentClass = $_POST['research-studentclass'];
$research_YearCompletion = $_POST['research-yearcompletion'];


header('location: ../ResultSearch.php?thai=' . $research_NameThai . '&english=' . $research_NameEnglish . '&type=' . $research_Type . '&class=' . $research_StudentClass . '&year=' . $research_YearCompletion);
?>