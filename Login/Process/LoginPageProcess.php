<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ loginpage.php ในตัวแปรดังกล่าว
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // ทำการตรวจสอบว่ามีไอดีนั้นในระบบไหม
    $sql = "SELECT id, username FROM users 
    WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // หากพบทำการสร้าง session ขึ้นมา 3 อย่าง
            session_start();
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $password;

            header('Location: ../../SearchPage/Search.php');
        }
    } else {
        // ไม่พบข้อมูลจะทำการเด้งกลับไปยังหน้า loginpage
        header('Location: ../LoginPage.php?u=1');
    }

    mysqli_close($conn);

?>