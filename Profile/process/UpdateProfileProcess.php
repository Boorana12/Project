<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php 
    session_start();
    include_once "../../Connection/db.php";
    // ตรวจสอบว่ามี session password รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบสมาชิกทั่วไป
    if(!isset($_SESSION["password"])) {
        header('Location: ../Login/LoginPage.php');
    }

    $id = $_SESSION["id"];

?>

<?php
    // เก็บค่าที่เอามาจากไฟล์ updateprofile.php ในตัวแปรดังกล่าว
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];

    // กำหนดค่า error ไว้เก็บส่วนผิดพลาดและตั้งค่าตัวแปรภาพเป็น null
    $errors = [];
    $image = null;
?>

<!-- ถ้าหากว่าไม่มีการเปลี่ยนแปลงรูปภาพให้ทำงานดังต่อไปนี้ -->
<?php
    if(empty($_FILES['userphotoicon']['name'])):
        $UpdateUsers = "UPDATE users SET
            username='$username',
            firstname='$firstname',
            lastname='$lastname',
            birthday='$birthday',
            phonenumber='$phonenumber'
        WHERE id = $id";

        if (mysqli_query($conn, $UpdateUsers) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
            header('location: ../MyProfile.php?id=' . $id . '&m=1');

            $_SESSION["username"] = $username;
        } else {
        header('location: ../UpdateProfile.php?id=' . $id . '&u=1');
        }
    // ถ้าหากว่ามีการเปลี่ยนแปลงรูปภาพให้ทำงานดังต่อไปนี้
    else:
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

                
                // ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ
                $readuser = "SELECT * FROM users WHERE id = $id";
                $readuserResult = mysqli_query($conn, $readuser);

                if (mysqli_num_rows($readuserResult) > 0) {
                    $row = mysqli_fetch_assoc($readuserResult);
                }
                if(isset($row['userphotoicon'])) {
                    $fileName = $row['userphotoicon'];
                        $deleteFileDir = '../../img/usersphoto/' . $fileName;
                        @unlink($deleteFileDir);
                }


            } else {
                $errors[]  = 'There was some errors moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        $UpdateUsers = "UPDATE users SET
            username='$username',
            firstname='$firstname',
            lastname='$lastname',
            birthday='$birthday',
            userphotoicon='$userphotoicon',
            phonenumber='$phonenumber'
        WHERE id = $id";

        if (mysqli_query($conn, $UpdateUsers) === TRUE) {
            echo "เปลี่ยนแปลงสำเร็จ <br />";
            header('location: ../MyProfile.php?id=' . $id . '&m=1');

            $_SESSION["username"] = $username;
        
        } else {
        header('location: ../UpdateProfile.php?id=' . $id . '&u=1');
        }
    endif;
?>
<?php


    
    

    mysqli_close($conn);

?>