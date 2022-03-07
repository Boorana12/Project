<!doctype html>
<html lang="en">

<?php
require("../layout/navbar2.php");
?>

<body>

    <div style="display:flex;justify-content:center;align-items:center;">
        <!-- แบบฟอร์มที่ส่งไปยังหน้า AdminPageProcess.php ในโฟลเดอร์ process -->
        <form method="POST" action="./Process/AdminPageProcess.php" class="login-form">
            <img src="../img/logocmtc.jpg" width="100" height="100" alt="">
            <h1>Login Admin</h1>
            <div class="txtb">
                <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="username" required="required">
            </div>
            <div class="txtb">
                <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                    placeholder="Password" required="required">
            </div>
            <input type="submit" class="logbtn" value="Login">
            <br>
            <a href="./LoginPage.php" class="btn btn-primary">ย้อนกลับ</a>
        </form>

        <!-- สร้างคำสั่งตรวจสอบค่า -->
    </div>
    <?php if (isset($_GET['m'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>

    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เข้าสู่ระบบล้มเหลว
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'เข้าสู่ระบบล้มเหลว!'
        })
    }
    </script>
    <?php
    require("../layout/footer.php")
    ?>
</body>

</html>