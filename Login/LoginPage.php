<!doctype html>
<html lang="en">
<?php
require("../layout/navbar.php");
?>

<body>
    <div style="display:flex;justify-content:center;align-items:center;">
        <!-- แบบฟอร์มที่ส่งไปยังหน้า LoginPageProcess.php ในโฟลเดอร์ process -->
        <form action="./Process/LoginPageProcess.php" class="login-form" method="POST">
            <img src="../img/logocmtc.jpg" width="100" height="100" alt="">
            <h1>Login</h1>

            <div class="txtb">
                <input type="email" required="required" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="txtb">
                <input type="password" required="required" class="form-control" name="password"
                    id="exampleInputPassword1" placeholder="Password">

            </div>
            <input type="submit" class="logbtn" value="Login">
            <div class="bottom-text">
                Don't have account? <a href="RegisterPage.php">Sign up</a>
            </div>
            <div class="bottom-text">
                <a href="AdminPage.php">Log in as administrator.</a>
            </div>
        </form>
    </div>
    <script type="text/javascript">
    $(".txtb input").on("focus", function() {
        $(this).addClass("focus");
    });
    $(".txtb input").on("blur", function() {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });
    </script>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['u'])) : ?>
    <div class="flash-data-2" data-flashdata="<?= $_GET['u']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['s'])) : ?>
    <div class="flash-data-3" data-flashdata="<?= $_GET['u']; ?>"></div>
    <?php endif; ?>

    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert สมัครสมาชิกสำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'สมัครสมาชิกสำเร็จ!'
        })
    }
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เข้าสู่ระบบล้มเหลว
    const flashdata2 = $('.flash-data-2').data('flashdata')
    if (flashdata2) {
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'เข้าสู่ระบบล้มเหลว!'
        })
    }
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert สมัครสมาชิกไม่สำเร็จ
    const flashdata3 = $('.flash-data-3').data('flashdata')
    if (flashdata3) {
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'สมัครสมาชิกไม่สำเร็จ!'
        })
    }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>