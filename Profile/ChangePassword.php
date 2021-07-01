<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php 
    session_start();
    include_once "../Connection/db.php";
    // ตรวจสอบว่ามี session password รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบสมาชิกทั่วไป
    if(!isset($_SESSION["password"])) {
        header('Location: ../Login/LoginPage.php');
    }

    $password = $_SESSION["password"];
?>

<!-- ถ้าหาก id ที่เข้าใช้งานไม่ตรงกับ session จะทำการเด้งกลับไปยังหน้า search เพื่อป้องกันการเข้าใช้งานระบบของผู้อื่น -->
<?php if (isset($_GET['id'])) : ?>
<?php $id = $_GET['id']; ?>
<?php endif; ?>
<?php  
    $sql = "SELECT password FROM users 
    WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        
        }
    } else {
      header('Location: ../SearchPage/Search.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
      font-family: 'Sarabun', sans-serif;
    }
    #gridLeft, #gridRight{
    margin-left: 50px;
    padding-top: 20px;
    }
    
    #gridLeftTopic{
    margin-left: 50px;
    }

    #gridRightDetail{
    margin-left: 50px;
    }
    p.contact{
      border-color:#F5F5F5;
      border-style: solid;
    }

    </style>
</head>

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
    <?php
    $id = $_GET['id'];

    // ดึงข้อมูลรูปมาจากตารางแล้วทำการเชื่อมต่อ
    $userphotoicon = "SELECT userphotoicon FROM users WHERE id = $id";
    $readuserphotoicon = mysqli_query($conn, $userphotoicon);
    $writeuserphotoicon = mysqli_fetch_assoc($readuserphotoicon);

    ?>
<div class="container-fluid">
  <div class="row">
      <!--------------- ส่วนเนื้อหา -------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex  flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            </div>
              <div class="justify-content-between" style="background-color:#F5F5F5" >
              <!-- เก็บค่ารูปภาพไว้ในตัวแปร photoProfile -->
              <?php $photoProfile = $writeuserphotoicon['userphotoicon'] ?>
              <!-- ถ้าตัวแปร photoProfile ไม่มีค่าให้แทนด้วย icon1.jpg -->
              <?php if (empty($photoProfile)) {
                $photoProfile = "icon1.jpg";
              }?>
              <?php echo "<img src='../img/usersphoto/".$photoProfile."'width='50' height='50' align='center'>" ?>
                <b><font size="5">&nbsp;My Proflie</font></b>
              </div>  
              <div style="display:flex;justify-content:left;align-items:center;" class="col-sm-12 col-md-6 col-lg-6">                   
              <!-- แบบฟอร์มที่ส่งไปยังหน้า ChangePasswordProcess.php ในโฟลเดอร์ process -->
              <form method="POST" action="./process/ChangePasswordProcess.php">
                    <br>
                    <div class="form-group">
                        <label for="oldpassword">รหัสผ่านเก่า</label>
                        <input id="oldpassword" name="oldpassword" placeholder="" type="password"
                            class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">ใส่รหัสผ่านใหม่</label>
                        <input id="newpassword" name="newpassword" placeholder="" type="password"
                            class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label for="newpassword2">ใส่รหัสผ่านใหม่อีกครั้ง</label>
                        <input id="newpassword2" name="newpassword2" placeholder="" type="password"
                            class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary"><a class="changepassword">Submit</a></button>
                    </div>
                </form>
            </div>
            </div>
        </main>
    </div>
  </div>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>" ></div>
    <?php endif; ?>
    <?php if (isset($_GET['u'])) : ?>
        <div class="flash-data-2" data-flashdata="<?= $_GET['u']; ?>" ></div>
    <?php endif; ?>
    
    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>

    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เปลี่ยนรหัสผ่านสำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'เปลี่ยนรหัสผ่านสำเร็จ!'
        })
    }
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert รหัสผ่านผิด
    const flashdata2 = $('.flash-data-2').data('flashdata')
    if (flashdata2){
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'รหัสผ่านผิด!'
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