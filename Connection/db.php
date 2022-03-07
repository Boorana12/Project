<!-- servername = ชื่อเซิร์ฟเวอร์ -->
<!-- username = ชื่อที่ใช้ลงชื่อเข้าเซิร์ฟเวอร์ -->
<!-- password = รหัสผ่าน -->
<!-- dbname = ฐานข้อมูลที่ต้องการเชื่อมต่อ -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Change character set to utf8
//$conn->set_charset("utf8");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>