<!-- servername = ชื่อเซิร์ฟเวอร์ -->
<!-- username = ชื่อที่ใช้ลงชื่อเข้าเซิร์ฟเวอร์ -->
<!-- password = รหัสผ่าน -->
<!-- dbname = ฐานข้อมูลที่ต้องการเชื่อมต่อ -->

<?php
$servername = "localhost";
$username = "admin_mspj";
$password = "5MOBPN@2022";
$dbname = "db_mspj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Change character set to utf8
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>