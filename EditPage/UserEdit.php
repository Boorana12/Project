<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
// ตรวจสอบว่ามี session username รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบ username
if (!isset($_SESSION["username"])) {
    header('Location: ../Login/LoginPage.php');
}
?>

<!doctype html>
<html lang="en">
<?php
require("../layout/navbar.php");
?>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row mb-2">
                <div class="col-10">
                    <h3>รายชื่อโครงการทั้งหมด</h3>
                </div>
                <div class="col d-flex flex-row-reverse">
                    <a href="./UserAddPage.php" class="btn btn-primary">เพิ่มข้อมูล</a>
                </div>
            </div>
        </div>
    </div>
</body>