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
<?php
require("../layout/navbar.php");
?>

<body>


    <section id="add-researchs" class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <h1>เพิ่มผลงานวิจัย</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <!-- แบบฟอร์มที่ส่งไปยังหน้า AddResearch.php ในโฟลเดอร์ process -->
                    <form method="POST" action="Process/AddResearch.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="research-name-thai">ชื่อภาษาไทย</label>
                            <input id="research-name-thai" name="research-name-thai" placeholder="" type="text"
                                class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-name-english">ชื่อภาษาอังกฤษ</label>
                            <input id="research-name-english" name="research-name-english" placeholder="" type="text"
                                class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-image">รูปตัวอย่าง (ไม่จำเป็นต้องใส่ก็ได้) </label>
                            <input type="file" class="form-control-file" name="research-image"
                                aria-describedby="fileHelpId" accept="image/png, image/jpeg">
                            <small id="fileHelpId" class="form-text text-muted">จำกัดรูปภาพสินค้าไฟล์ .jpg .png
                                ขนาดไม่เกิน 1MB เท่านั้น</small>
                        </div>
                        <div class="form-group">
                            <label for="research-type">ประเภท</label>
                            <select class="form-control" name="research-type" id="exampleFormControlSelect1">
                                <option>Animation</option>
                                <option>Application</option>
                                <option>Database</option>
                                <option>Game</option>
                                <option>HardWare</option>
                                <option>WebSite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="research-name-projectleader">ชื่อหัวหน้าโครงการ</label>
                            <input id="research-name-projectleader" name="research-name-projectleader" placeholder=""
                                type="text" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-email-projectleader">อีเมลล์ของหัวหน้าโครงการ</label>
                            <input id="research-email-projectleader" name="research-email-projectleader" placeholder=""
                                type="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-name-advisor">ชื่ออาจารย์ที่ปรึกษาหลัก</label>
                            <input id="research-name-advisor" name="research-name-advisor" placeholder="" type="text"
                                class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-yearcompletion">ปีการศึกษา</label>
                            <input id="research-yearcompletion" name="research-yearcompletion" placeholder=""
                                type="number" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="research-studentclass">ระดับชั้น</label>
                            <select class="form-control" name="research-studentclass" id="exampleFormControlSelect1">
                                <option>ปวช.1</option>
                                <option>ปวช.2</option>
                                <option>ปวช.3</option>
                                <option>ปวส.1</option>
                                <option>ปวส.2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="research-member">จำนวนสมาชิก</label>
                            <select class="form-control" name="research-member" id="exampleFormControlSelect1">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="research_text">บทคัดย่อ</label><br>
                            <textarea id="form-control" name="research_text" rows="10" cols="75"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="research-image">ไฟล์ Word (ไม่จำเป็นต้องใส่ก็ได้) </label>
                            <input type="file" class="form-control-file" name="research_fileword"
                                aria-describedby="fileHelpId" accept=".doc, .docx">
                            <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .doc .docx เท่านั้น</small>
                        </div>
                        <div class="form-group">
                            <label for="research-image">ไฟล์ PDF (ไม่จำเป็นต้องใส่ก็ได้) </label>
                            <input type="file" class="form-control-file" name="research_filepdf"
                                aria-describedby="fileHelpId" accept=".pdf">
                            <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .pdf เท่านั้น</small>
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <a href="../SearchPage/Search.php" class="btn btn-primary">ย้อนกลับ</a>
                        </div>
                    </form>
                    <br><br><br><br>
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
            text: 'เพิ่มข้อมูลไม่สำเร็จ!'
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