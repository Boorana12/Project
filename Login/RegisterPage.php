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
    <style>
        h1{
            margin-bottom: 1px;
            font-size: 35px;
        }
           body{
      font-family: 'Sarabun', sans-serif;
    }
    .register-form{
        margin-top: 1px;
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


    </style>
</head>
 <?php
require("../layout/navbar2.php");
?>
<body>
   

    <section id="registor" class="pt-4">
        <div class="container">
        <img src="../img/task.png" width="90" height="90" class="rounded mx-auto d-block"><br>
                <div class="row">
                    <div class="col-3" ></div>
                        <div class="col-6" >
                            <div class="text-center">
                                <h1>สมัครสมาชิก</h1>
                            </div>
                        </div>
                </div>
            <div class="row">
            <div class="col-3" ></div>
                <div class="col-sm-12 col-md-6 col-lg-6" >
                <!-- แบบฟอร์มที่ส่งไปยังหน้า RegisterPageProcess.php ในโฟลเดอร์ process -->
                <form method="POST" action="./Process/RegisterPageProcess.php" enctype="multipart/form-data" class="register-form">
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้</label>
                        <label  style="color:red; ">&nbsp;(จำเป็นต้องใส่)</label>
                        <input type="text" class="form-control " name="username" id=""
                            aria-describedby="emailHelp" placeholder="username" required="required">
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <label  style="color:red; ">&nbsp;(จำเป็นต้องใส่)</label>
                        <input type="email" class="form-control " name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                        <label  style="color:red; ">&nbsp;(จำเป็นต้องใส่)</label>
                        <input type="password" class="form-control " name="password" id="exampleInputPassword1"  placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อต้น</label>
                        <label  style="color:red; ">&nbsp;(จำเป็นต้องใส่)</label>
                        <input type="text" class="form-control " name="firstname" id=""
                            aria-describedby="emailHelp"  placeholder="firstname" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">นามสกุล</label>
                        <label  style="color:red; ">&nbsp;(จำเป็นต้องใส่)</label>
                        <input type="text" class="form-control " name="lastname" id=""
                            aria-describedby="emailHelp"  placeholder="lastname" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">วันเกิด</label>
                        <input type="date" class="form-control " name="birthday" id=""
                            aria-describedby="emailHelp"  placeholder="birthday">
                    </div>
                    <div class="form-group">
                        <label for="photo">รูปของสมาชิก </label>
                        <label  style="color:red; ">&nbsp;(ไม่จำเป็นต้องใส่ก็ได้)</label>
                        <input type="file" class="form-control-file" name="userphotoicon" aria-describedby="fileHelpId"
                            accept="image/png, image/jpeg">
                        <small id="fileHelpId" class="form-text text-muted">จำกัดรูปภาพสินค้าไฟล์ .jpg .png ขนาดไม่เกิน 1MB เท่านั้น</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">เบอร์โทร</label>
                        <input type="tel" class="form-control " name="phonenumber" id=""
                            aria-describedby="emailHelp"  placeholder="Phone Number" maxlength="10" >
                    </div>
                    <button type="submit" class="btn btn-primary">สมัครสมาชิก</button> &nbsp; &nbsp;
                    <a href="./LoginPage.php" class="btn btn-primary">ย้อนกลับ</a>
                </form>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>" ></div>
    <?php endif; ?>
    
    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>

    // ถ้าหากว่ามีค่าให้แสดง sweeetalert มีผู้ใช้อีเมลล์นี้อยู่แล้ว
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'มีผู้ใช้อีเมลล์นี้อยู่แล้ว!'
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