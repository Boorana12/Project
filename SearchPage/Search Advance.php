<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
?>

<!doctype html>
<html lang="en">

<?php
require("../layout/navbar.php");
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!--------------------------------- body --------------------------------->
            <main role="main" class="col-md-12 col-sm-12 col-lg-12 px-md-4">
                <p><br></p>
                <div class="justify-content-between">
                    <img src="../img/logocmtc.png" width="180" height="180" class="rounded mx-auto d-block"><br>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <!-- แบบฟอร์มที่ส่งไปยังหน้า ResultSearch.php -->
                            <form method="POST" action="./Process/ResultProcess.php" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="research-name-thai"
                                        id="research-name-thai" aria-describedby="emailHelp"
                                        placeholder="คำที่ต้องการสืบค้น">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="research-name-english"
                                        id="research-name-english" aria-describedby="emailHelp"
                                        placeholder="คำที่ต้องการสืบค้น (English)">
                                </div>
                                <div class="form-group">
                                    <label for="research-type">ประเภท</label>
                                    <select class="form-control" name="research-type" id="research-type">
                                        <option>ทุกประเภท</option>
                                        <option>Animation</option>
                                        <option>Application</option>
                                        <option>Database</option>
                                        <option>Game</option>
                                        <option>HardWare</option>
                                        <option>WebSite</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="research-studentclass">ระดับชั้น</label>
                                    <select class="form-control" name="research-studentclass"
                                        id="research-studentclass">
                                        <option>ทุกระดับชั้น</option>
                                        <option>ปวช.1</option>
                                        <option>ปวช.2</option>
                                        <option>ปวช.3</option>
                                        <option>ปวส.1</option>
                                        <option>ปวส.2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="research-yearcompletion">ปีการศึกษา</label>
                                    <input type="number" class="form-control" id="research-yearcompletion"
                                        name="research-yearcompletion" placeholder="ปีการศึกษา">
                                </div>
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="" style="margin-top: 20%;"></div>
    <?php
    require("../layout/footer.php")
    ?>
</body>

</html>