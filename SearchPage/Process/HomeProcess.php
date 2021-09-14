<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../../connection/db.php";
?>
<?php    
    // เก็บค่าที่เอามาจากไฟล์ Add.php ในตัวแปรดังกล่าว
    $research_Name = $_POST['research-name'];
    $research_Option = $_POST['research-option'];

    header('location: ../Search.php?name=' . $research_Name . '&option=' . $research_Option);
?>