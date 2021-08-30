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
    </style>
</head>

<body>
    <?php
require("../layout/navbar.php");
?>
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