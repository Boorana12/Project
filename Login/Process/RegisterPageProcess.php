<?php
    // ดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php
    include_once "../../Connection/db.php";
    
    // เก็บค่าที่เอามาจากไฟล์ Add.php ในตัวแปรดังกล่าว
    
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    // เก็บค่ารหัสผ่านแบบใส่รหัส md5
    $password = md5($_POST['password']);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $username = $firstname . ' ' . $lastname;

    // กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
    $errors = [];
    $image = null;

    // หากพบว่ามีไฟล์เก็บรูปภาพให้ทำงานดังต่อไปนี้
    if(isset($_FILES['userphotoicon'])) {
        // เก็บรายละเอียดของภาพไปในตัวแปรดังกล่าว
        $fileTmpPath = $_FILES['userphotoicon']['tmp_name'];
        $fileName = $_FILES['userphotoicon']['name'];
        $fileSize = $_FILES['userphotoicon']['size'];
        $fileType = $_FILES['userphotoicon']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // ตรวจสอบว่าไฟล์ภาพมีขนาดเกินที่กำหนดรึเปล่า
        if($fileSize > 1048576) {
            $errors[] = "Filesize is more than 1MB";
        }

        // ตรวจสอบไฟล์ภาพว่ามีนามสกุลตรงตามที่กำหนดรึเปล่า
        $allowedfileExtensions = array('jpg', 'png');
        if (!in_array($fileExtension, $allowedfileExtensions)) {
            $errors[] = 'Upload failed. Allowed file types' . implode(',', $allowedfileExtensions);
        }

        // หากไม่พบ error ให้ทำงานตามคำสั่งต่อไปนี้ 
        if(empty($errors)) {
            // ทำ path และตั้งชื่อเป็นเวลาแบบใส่รหัส md5
            $uploadFileDir = '../../img/usersphoto/';
            date_default_timezone_set('Asia/Bangkok');
            $fileNameNew = md5(time()) . $fileName;
            $userphotoicon = $fileNameNew;
            $dest_path = $uploadFileDir . $fileNameNew;

            // บันทึกไฟล์ไว้ในเซิร์ฟเวอร์
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
                echo 'บันทึกไฟล์สำเร็จ';
                $image = $fileName;
            } else {
                $errors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
    }

    // ตรวจสอบว่าอีเมลล์ซ้ำรึเปล่า
    $checkUserSql = "SELECT * FROM users
    WHERE email = '$email'";
    $checkUserResult = mysqli_query($conn, $checkUserSql);
    // ถ้าอีเมลล์ไม่ซ้ำให้ทำการเพิ่มข้อมูลสมาชิกเข้าไปในระบบ
    if(mysqli_num_rows($checkUserResult) == 0) {
        $addUser = "INSERT INTO users (username, email, password, firstname, lastname, birthday, userphotoicon, phonenumber)
        VALUES ('$username', '$email', '$password', '$firstname', '$lastname', '$birthday' ,'$userphotoicon', '$phonenumber')";

        if (mysqli_query($conn, $addUser) === TRUE) {
            echo "สมัครสมาชิกสำเร็จ <br />";
            header('location: ../LoginPage.php?m=1');
        } else {
            echo "สมัครสมาชิกไม่สำเร็จ <br />";
            header('location: ../LoginPage.php?s=1');
        }
    } else {
        echo "มีผู้ใช้ อีเมลล์ นี้อยู่แล้ว <br />";
        header('location: ../RegisterPage.php?m=1');
    }
    

    mysqli_close($conn);

?>