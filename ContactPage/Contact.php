<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
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
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <style>
    body {
        font-family: 'Sarabun', sans-serif;

    }

    #gridLeft {
        margin-left: 50px;
        padding-top: 20px;
    }

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
        border-color: #FAEBD7;
        border-style: solid;
    }
    </style>
</head>

<body>
    <?php
require("../layout/navbar.php");
?>
    <div class="container-fluid">
        <div class="row">
            <!--------------- ส่วนเนื้อหา -------------->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-5">
                <p><br></p>
                <div class="justify-content-between" style="background-color:#FFDAB9;">
                    <font size="5">&nbsp;ตำแหน่งที่ตั้ง</font>
                </div>

                <p class="contact" style="background:#FFFFFF !important">
                    <img src="../img/logohouse.jpg" width="25" height="25">
                    <font size="4">&nbsp;สาขาวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคเชียงใหม่ </font><br>
                    <img src="../img/logomap.png" width="25" height="25">
                    <font size="4">&nbsp;เลขที่ 9 ถ.เวียงแก้ว ต.ศรีภูมิ อ.เมือง จ.เชียงใหม่ 50300</font><br>
                    <img src="../img/logophone.jpg" width="25" height="25">
                    <font size="4">&nbsp;โทร. 053-217708</font><br>
                    <img src="../img/logofacebook.png" width="25" height="25">
                    <font size="4">&nbsp;Facebook :&nbsp; </font> <a
                        href="https://www.facebook.com/itcmtc">https://www.facebook.com/itcmtc</a><br>
                    <img src="../img/logoline.png" width="25" height="25">
                    <font size="4">&nbsp;Line :</font><br>
                </p>
                <br>
                <div style="display:flex;justify-content:center;align-items:center; ">
                    <iframe width="100%" height="500" frameborder="0" style="border:0;"
                        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3wrYcZo62jARFiQFxX9lH-Q&key=AIzaSyAh1K7tMB3zP1wn8kGXBVpAxJPC4VoTr_4"
                        allowfullscreen></iframe>
                </div>
            </main>
        </div>
    </div>


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