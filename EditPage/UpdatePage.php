<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php 
    session_start();
    include_once "../Connection/db.php";
    // ตรวจสอบว่ามี session admin รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบ admin
    if(!isset($_SESSION["admin"])) {
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
    body{
      font-family: 'Sarabun', sans-serif;
    }
    </style>
<body>
    <!-- แถบ Navigation Bar ส่วนหัว -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="../img/itcmtc.png" width="30" height="30">
        <a class="navbar-brand" href="#">&nbsp; CMTC RESEARCH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <!-- ทำลิงก์ไปยังหน้าเว็บต่างๆ -->
                <li class="nav-item active">
                    <a class="nav-link" href="../HomePage/Home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../SearchPage/Search.php">Search</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../ProjectPage/Project.php">Project</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../ContactPage/Contact.php">Contact</a>
                </li>
                <!-- ตรวจสอบว่ามี session ที่ชื่อว่า admin รึเปล่า ถ้ามีให้แสดงหน้าต่าง edit -->
                <?php if(isset($_SESSION["admin"])) { ?>
                <li class="nav-item active">
                  <a class="nav-link" href="../EditPage/Edit.php">Edit</a>
                </li>
                <?php }?>
                <!-- จบการทำงาน -->
            </ul>
            <!-- ตรวจสอบว่ามี session ที่ชื่อว่า username รึเปล่า ถ้าไม่มีให้แสดงคำสั่งลิงก์ไปยังหน้า login -->
            <?php if(!isset($_SESSION["username"])) { ?>
            <span class="navbar-text">
                <a href="../Login/LoginPage.php">Login</a>
            </span>
            <!-- ถ้าหากว่ามีให้ทำงานตามคำสั่งต่อไปนี้ -->
            <?php } else { ?>
            <span class="navbar-text">
            <!-- ทำการขออนุญาตเข้าถึงตาราง users เพื่อทำการตรวจสอบ id ของผู้เข้าใช้งาน -->
            <?php 
            $SESSONID = $_SESSION["id"];
            $readResearch = "SELECT * FROM users WHERE id = $SESSONID";
            $readResearchResult = mysqli_query($conn, $readResearch);
            ?>
            <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
            <?php while($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                <!-- หาก id ของผู้เข้าใช้งานมีไฟล์ภาพให้นำไปเก็บในค่า photo -->
                <?php $photo = $row["userphotoicon"] ?>
                <!-- หาก id ของผู้เข้าใช้งานไม่มีไฟล์ภาพให้แทนด้วยค่า icon.1 ซึ่งเป็นภาพว่างเปล่าแล้วเก็บในค่า photo -->
                <?php if (empty($photo)) {
                $photo = "icon1.jpg";
              } ?>
                <!-- แสดงภาพโดยใช้ค่า photo เรียกมาจาก id ตาราง users -->
                <?php if(!isset($_SESSION["admin"])) echo "<a href=\"../Profile/MyProfile.php?id=" . $row["id"] . "\"><img src='../img/usersphoto/".$photo."'width='30' height='30' align='center'></a>" ?> 
            <?php } ?>
            <?php } else { ?>
            <!-- หากไม่พบแสดงคำว่า error -->
            error
            <?php } ?>
              <a>&nbsp;|&nbsp;</a>
            </span>
            <!-- แสดง username ของผู้เข้าใช้งานและคำสั่งลิงก์ไปยังหน้า logout -->
            <span class="navbar-text mr-2">
                <?php echo $_SESSION["username"]; ?>
            </span>
            <span class="navbar-text">
                <a href="../Login/Process/LogoutPageProcess.php">Logout</a>
            </span>
            <?php } ?>
            <!-- จบการทำงาน -->
        </div>
    </nav>

    <section id="add-researchs" class="pt-4">
        <div class="container">
            <div class="row">
            <div class="col-3" ></div>
                <div class="col-6" >
                <h2>อัปเดตผลงานวิจัย</h2>
            </div><br>
            </div><br>
            <div class="row">
            <div class="col-3" ></div>
                <div class="col-6" >
            <!-- ตรวจสอบค่า id ที่รับมาจากปุ่ม edit จากหน้า edit.php -->
            <?php if(!empty($_GET["id"])) { ?>
                    <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                    <?php 
                    $research_No = $_GET["id"];
                    $readResearch = "SELECT * FROM researchs WHERE research_No = $research_No";
                    $readResearchResult = mysqli_query($conn, $readResearch);

                    if (mysqli_num_rows($readResearchResult) > 0) {
                        $row = mysqli_fetch_assoc($readResearchResult)
                    ?>
                <!-- แบบฟอร์มที่ส่งไปยังหน้า UpdateResearch.php ในโฟลเดอร์ process -->
                <form method="POST" action="Process/UpdateResearch.php" enctype="multipart/form-data" class="update-form">
                    <div class="form-group">
                        <label for="research-no">หมายเลข</label>
                        <label for="research-no">*ห้ามแก้ไข*</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-no" name="research-no" placeholder="" type="text"
                            class="form-control" required="required" value="<?php echo $row["research_No"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-name-thai">ชื่อภาษาไทย</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-name-thai" name="research-name-thai" placeholder="" type="text"
                            class="form-control" required="required" value="<?php echo $row["research_NameThai"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-name-english">ชื่อภาษาอังกฤษ</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-name-english" name="research-name-english" placeholder="" type="text"
                            class="form-control" required="required" value="<?php echo $row["research_NameEnglish"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-image">รูปตัวอย่าง (ไม่จำเป็นต้องใส่ก็ได้) </label>
                        <input type="file" class="form-control-file" name="research-image" aria-describedby="fileHelpId"
                            accept="image/png, image/jpeg">
                        <small id="fileHelpId" class="form-text text-muted">จำกัดรูปภาพสินค้าไฟล์ .jpg .png ขนาดไม่เกิน 1MB เท่านั้น</small>
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
                        <input id="research-name-projectleader" name="research-name-projectleader" placeholder="" type="text"
                            class="form-control" required="required" value="<?php echo $row["research_ProjectLeaderName"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-email-projectleader">อีเมลล์ของหัวหน้าโครงการ</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-email-projectleader" name="research-email-projectleader" placeholder="" type="email"
                            class="form-control" required="required" value="<?php echo $row["research_ProjectLeaderEmail"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-name-advisor">ชื่ออาจารย์ที่ปรึกษาหลัก</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-name-advisor" name="research-name-advisor" placeholder="" type="text"
                            class="form-control" required="required" value="<?php echo $row["research_AdvisorName"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="research-yearcompletion">ปีการศึกษา</label>
                        <!-- เรียกใช้ค่าเก่าใน id ให้ขึ้นแสดง -->
                        <input id="research-yearcompletion" name="research-yearcompletion" placeholder="" type="number"
                            class="form-control" required="required" value="<?php echo $row["research_YearCompletion"] ?>">
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
                    <div class="form-group">
                        <label for="research-image">ไฟล์ Word (ไม่จำเป็นต้องใส่ก็ได้) </label>
                        <input type="file" class="form-control-file" name="research_fileword" aria-describedby="fileHelpId"
                            accept=".doc, .docx">
                        <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .doc .docx เท่านั้น</small>
                    </div>
                    <div class="form-group">
                        <label for="research-image">ไฟล์ PDF (ไม่จำเป็นต้องใส่ก็ได้) </label>
                        <input type="file" class="form-control-file" name="research_filepdf" aria-describedby="fileHelpId"
                            accept=".pdf">
                        <small id="fileHelpId" class="form-text text-muted">จำกัดไฟล์ .pdf เท่านั้น</small>
                    </div>
                    <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    <a href="../SearchPage/Search.php" class="btn btn-primary">ย้อนกลับ</a>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    </body>

</html>