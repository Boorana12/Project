<!-- servername = ชื่อเซิร์ฟเวอร์ -->
<!-- username = ชื่อที่ใช้ลงชื่อเข้าเซิร์ฟเวอร์ -->
<!-- password = รหัสผ่าน -->
<!-- dbname = ฐานข้อมูลที่ต้องการเชื่อมต่อ -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research";

// ทำการเชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($servername, $username, $password, $dbname ,);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>