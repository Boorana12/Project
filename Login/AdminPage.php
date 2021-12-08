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