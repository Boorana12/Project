<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
// ตรวจสอบว่ามี session username รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบ username
if (!isset($_SESSION["username"])) {
    header('Location: ../Login/LoginPage.php');
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
                <div class="col-3"></div>
                <div class="col-6">
                    <h2>อัปเดตผลงานวิจัย</h2>
                </div><br>
            </div><br>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <!-- ตรวจสอบค่า id ที่รับมาจากปุ่ม edit จากหน้า useredit.php -->
                    <?php if (!empty($_GET["id"])) { ?>
                        <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                        <?php
                        $research_No = $_GET["id"];
                        $readResearch = "SELECT * FROM researchs as r inner join users as u on u.email=r.research_ProjectLeaderEmail;";
                        //$readResearch = "SELECT * FROM researchs WHERE research_No = $research_No";
                        $readResearchResult = mysqli_query($conn, $readResearch);

                        if (mysqli_num_rows($readResearchResult) > 0) {
                            $row = mysqli_fetch_assoc($readResearchResult)
                        ?>
                            <!-- แบบฟอร์มที่ส่งไปยังหน้า UserUpdate.php ในโฟลเดอร์ process -->
                            <form method="POST" action="Process/UserUpdate.php" enctype="multipart/form-data" class="update-form">
                                <div class="form-group">
                                    <label for="research-no">หมายเลข</label>
                                    <label for="research-no">*ห้ามแก้ไข*</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-no" name="research-no" placeholder="" type="text" class="form-control" required="required" value="<?php echo $row["research_No"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-name-thai">ชื่อภาษาไทย</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-name-thai" name="research-name-thai" placeholder="" type="text" class="form-control" required="required" value="<?php echo $row["research_NameThai"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-name-english">ชื่อภาษาอังกฤษ</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-name-english" name="research-name-english" placeholder="" type="text" class="form-control" required="required" value="<?php echo $row["research_NameEnglish"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-image">รูปตัวอย่าง (ไม่จำเป็นต้องใส่ก็ได้) </label>
                                    <input type="file" class="form-control-file" name="research-image" aria-describedby="fileHelpId" accept="image/png, image/jpeg">
                                    <small id="fileHelpId" class="form-text text-muted">จำกัดรูปภาพสินค้าไฟล์ .jpg .png
                                        ขนาดไม่เกิน 1MB เท่านั้น</small>
                                </div>
                                <div class="form-group">
                                    <label for="research-type">ประเภท</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <select class="form-control" name="research-type" id="exampleFormControlSelect1">
                                        <option>WebSite</option>
                                        <option>Database</option>
                                        <option>HardWare</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="research-name-projectleader">ชื่อหัวหน้าโครงการ</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-name-projectleader" name="research-name-projectleader" placeholder="" type="text" class="form-control" required="required" value="<?php echo $row["research_ProjectLeaderName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-email-projectleader">อีเมลล์ของหัวหน้าโครงการ</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-email-projectleader" name="research-email-projectleader" placeholder="" type="email" class="form-control" required="required" value="<?php echo $row["research_ProjectLeaderEmail"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-name-advisor">ชื่ออาจารย์ที่ปรึกษาหลัก</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-name-advisor" name="research-name-advisor" placeholder="" type="text" class="form-control" required="required" value="<?php echo $row["research_AdvisorName"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-yearcompletion">ปีการศึกษา</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <input id="research-yearcompletion" name="research-yearcompletion" placeholder="" type="number" class="form-control" required="required" value="<?php echo $row["research_YearCompletion"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="research-studentclass">ระดับชั้น</label>
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
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
                                    <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                                    <select class="form-control" name="research-member" id="exampleFormControlSelect1">
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="research_text">บทคัดย่อ</label><br>
                                    <textarea id="form-control" name="research-text" rows="10" cols="75"><?php echo $row["research_Text"] ?></textarea>
                                </div>
                                <!--<div class="form-group">
                                    <label for="research-image">ไฟล์ Word (ไม่จำเป็นต้องใส่ก็ได้) </label>
                                    <input type="file" class="form-control-file" name="research_fileword" aria-describedby="fileHelpId" accept=".doc, .docx">
                                    <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .doc .docx เท่านั้น</small>
                                </div>-->
                                <div class="form-group">
                                    <label for="research-image">ไฟล์ PDF (ไม่จำเป็นต้องใส่ก็ได้) </label>
                                    <input type="file" class="form-control-file" name="research_filepdf" aria-describedby="fileHelpId" accept=".pdf">
                                    <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .pdf เท่านั้น</small>
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    <a href="../SearchPage/Search.php" class="btn btn-primary">ยกเลิก</a>
                                </div>

                            </form>
                        <?php } else { ?>
                            <!-- ถ้าไม่มีค่า id ส่งมาจะ error -->
                            ไม่พบข้อมูล
                        <?php } ?>
                        <?php mysqli_close($conn); ?>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <!-- ถ้าไม่มีค่า id ส่งมาจะ error -->
                            เกิดข้อผิดพลาดไม่สามารถแก้ไขข้อมูลได้
                        </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>