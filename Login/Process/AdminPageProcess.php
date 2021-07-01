<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ adminpage.php ในตัวแปรดังกล่าว
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ทำการตรวจสอบว่ามีไอดีนั้นในระบบไหม
    $sql = "SELECT id, username FROM admins 
    WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // หากพบทำการสร้าง session ขึ้นมา 4 อย่าง
            session_start();
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $row['password'];
            $_SESSION["admin"] = "admin";

            echo "Welcome " . $row['username'] . "<br />";
            echo "<a href=\"../\">กลับสู่หน้าหลัก</a>";

            header('Location: ../../SearchPage/Search.php');
        }
    } else {
        // ไม่พบข้อมูลจะทำการเด้งกลับไปยังหน้า adminpage
        header('Location: ../AdminPage.php?m=1');
    }

    mysqli_close($conn);

?>