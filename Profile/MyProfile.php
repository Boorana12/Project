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
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    .button1 {
        display: inline-block;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #000000;
        background-color: #D3D3D3;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        width: 300px;
    }

    #div1 {
        background: url('../img/bg4.png ');
        border: 3px solid #BEBEBE;
    }

    .button1:hover {
        background-color: #778899;
    }

    .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    body {
        font-family: 'Sarabun', sans-serif;
    }

    #gridLeft,
    #gridRight {
        margin-left: 50px;
        padding-top: 20px;
    }

    #gridLeftTopic {
        margin-left: 50px;
    }

    #gridRightDetail {
        margin-left: 50px;
    }

    p.contact {
        border-color: #BEBEBE;
        border-style: solid;
    }
    </style>
</head>

<body>
    <?php
require("../layout/navbar.php");
?>
    <?php
  $id = $_GET["id"];

  // ดึงข้อมูลทั้งหมดมาจากตารางแล้วทำการเชื่อมต่อ
  $readUser = "SELECT * FROM users WHERE id  = $id";
  $readUserResult = mysqli_query($conn, $readUser);

  if (mysqli_num_rows($readUserResult) > 0) {
      $row = mysqli_fetch_assoc($readUserResult);
  }
?>
    <div class="container-fluid">
        <div class="row">
            <!--------------- ส่วนเนื้อหา -------------->
            <main role="main" class="col-md-4 offset-md-4">
                <div style="margin-top:50px">
                    <!-- เก็บค่ารูปภาพไว้ในตัวแปร photoProfile -->
                    <?php $photoProfile = $row['userphotoicon'] ?>
                    <!-- ถ้าตัวแปร photoProfile ไม่มีค่าให้แทนด้วย icon1.jpg -->
                    <?php if (empty($photoProfile)) {
                $photoProfile = "icon1.jpg";
              }?>
                    <div id="div1" align="center">
                        <!-- แสดงข้อมูลทั้งหมดในตารางออกมา -->
                        <?php echo "<img src='../img/usersphoto/".$photoProfile."'width='150' height='150' align='center'>" ?>
                    </div>

                    <div class="justify-content-between" style="background-color:#BEBEBE">
                        <b>
                            <font size="6">&nbsp; <?php echo $row['username'] ?></font>
                        </b>
                    </div>
                    <P class="contact">
                        <font size="5">&nbsp; <b>Firstname :</b> <?php echo $row['firstname'] ?></font><br>
                        <font size="5">&nbsp; <b>Lastname :</b> <?php echo $row['lastname'] ?></font><br>
                        <font size="5">&nbsp; <b>Email : </b><?php echo $row['email'] ?></font><br><br>
                    </p>
                    <P class="contact">
                        <font size="5"> &nbsp;<img src="../img/BD2.png" width="30" height="30"> <b>Birthday :
                            </b><?php echo $row['birthday'] ?></font><br>
                        <font size="5"> &nbsp;<img src="../img/logophone.png" width="30" height="30"> <b>Phone Number
                                :</b> <?php echo $row['phonenumber'] ?></font><br><br>
                    </p>
                    <!-- ทำปุ่มลิงก์ไปยังหน้าเปลี่ยนแปลงข้อมูลและเปลี่ยนแปลงรหัสผ่าน -->
                    <div style="display:flex">
                        <?php
                echo "<a href=\"./UpdateProfile.php?id=" . $id . "\" role=\"button\" class=\"button1\">แก้ไขโปรไฟล์( Edit Proflie )</button></a> &nbsp;";
                echo "<a href=\"./ChangePassword.php?id=" . $id . "\" role=\"button\" class=\"button1\">แก้ไขรหัสผ่าน( Change Password )</button></a>";
                ?>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>

    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เปลี่ยนแปลงข้อมูลสำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'เปลี่ยนแปลงข้อมูลสำเร็จ!'
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