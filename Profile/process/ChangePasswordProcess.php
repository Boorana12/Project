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
    // เก็บค่าที่เอามาจากไฟล์ changepassword.php ในตัวแปรดังกล่าวโดยแปลงเป็นค่ารหัส md5
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);
    $newpassword2 = md5($_POST['newpassword2']);

    // ดึงข้อมูลรหัสในตาราง users แล้วทำการเชื่อมต่อ
    $password = "SELECT password FROM users WHERE id = $id";
    $readpassword = mysqli_query($conn, $password);
    $writepassword = mysqli_fetch_assoc($readpassword);
    // สร้างตัวแปรทดสอบ password เก็บค่าจากตางราง
    $testpassword = $writepassword['password'];

    // นำค่าที่เอามาจากไฟล์ changepassword.php มาเทียบกับค่า password ในตาราง users ว่ามีค่าตรงรึเปล่า
    // เทียบรหัสผ่านใหม่ 2 อย่างว่าตรงรึเปล่า
    if($oldpassword == $testpassword && $newpassword == $newpassword2 ) {
        $UpdateResearch = "UPDATE users SET
            password='$newpassword'
        WHERE id=$id";

        if (mysqli_query($conn, $UpdateResearch)) {
            echo "บันทึกข้อมูลสำเร็จ <br />";
            header('location: ../ChangePassword.php?id=' . $id . '&m=1');

            $_SESSION["password"] = $newpassword;

        } else {
            echo "errors: " . $sql . "<br>" . mysqli_errors($conn);
        }

    } else {
        echo "บันทึกข้อมูลไม่สำเร็จ <br />";
        header('location: ../ChangePassword.php?id=' . $id . '&u=1');
    }

    mysqli_close($conn);

?>