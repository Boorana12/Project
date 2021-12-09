<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
// ตรวจสอบว่ามี session admin รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบ admin
if (!isset($_SESSION["admin"])) {
    header('Location: ../Login/AdminPage.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>IT CMTC RESEARCH</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
body {
    font-family: 'Sarabun', sans-serif;
}
</style>
<?php
require("../layout/navbar.php");
?>

<body>
    <!-- แถบ Navigation Bar ส่วนหัว -->


    <section id="add-researchs" class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h1>ลบผลงานวิจัย</h1>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <!-- แบบฟอร์มที่ส่งไปยังหน้า DeleteResearch.php ในโฟลเดอร์ process -->
                    <form method="POST" action="Process/DeleteResearch.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="research_No">หมายเลขที่ต้องการลบ</label>
                            <label style="color:red; ">&nbsp;*</label>
                            <input id="research_No" name="research_No" placeholder="" type="number" class="form-control"
                                required="required">
                            <small id="fileHelpId" class="form-text text-muted">กำหนดหมายเลขไอดีแบบเฉพาะทาง</small>
                            <small id="fileHelpId"
                                class="form-text text-muted">ไม่แนะนำให้ลบด้วยวิธีนี้หากไม่เจาะจงข้อมูลมาล่วงหน้า</small>
                        </div>

                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <a id="gridLeftTopic" href="../EditPage/Edit.php" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>

    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>

    <script>
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เพิ่มข้อมูลไม่สำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'ลบข้อมูลไม่สำเร็จ!'
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