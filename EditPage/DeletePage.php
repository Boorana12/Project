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
                    <a class="nav-link" href="http://it.cmtc.ac.th/web2017/">Home</a>
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
                <h1>ลบผลงานวิจัย</h1>
                <br>
            </div>
            </div>
            <div class="row">
            <div class="col-3" ></div>
                <div class="col-6" >
                <!-- แบบฟอร์มที่ส่งไปยังหน้า DeleteResearch.php ในโฟลเดอร์ process -->
                <form method="POST" action="Process/DeleteResearch.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="research_No">หมายเลขที่ต้องการลบ</label>
                        <label  style="color:red; ">&nbsp;*</label>
                        <input id="research_No" name="research_No" placeholder="" type="number"
                            class="form-control" required="required">
                    <small id="fileHelpId" class="form-text text-muted">กำหนดหมายเลขไอดีแบบเฉพาะทาง</small>
                    <small id="fileHelpId" class="form-text text-muted">ไม่แนะนำให้ลบด้วยวิธีนี้หากไม่เจาะจงข้อมูลมาล่วงหน้า</small>
                    </div>
                    
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        <a  id="gridLeftTopic" href="../EditPage/Edit.php" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>" ></div>
    <?php endif; ?>
    
    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    
    <script>
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เพิ่มข้อมูลไม่สำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
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