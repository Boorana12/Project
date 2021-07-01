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
    .logbtn{
    display: block;
    width: 100%;
    height: 50px;
    border: none;
    background: linear-gradient(120deg,#FFFFFF,#B22222,#FFFFFF);
    background-size: 200%;
    color: #000000;
    outline: none;
    cursor: pointer;
    transition: .5s;
    font-size: 20px;
  }
    .txtb input{
    font-size: 15px;
    color: #333;
    border: none;
    width: 100%;
    outline: none;
    background: none;
    padding: 0 5px;
    height: 40px;
    }
    .login-form img{
    margin-left: 90px;
    margin-bottom: 1px;
    
    }
    .login-form h1{
    text-align: center;
    margin-bottom: 30px;
    font-size: 35px;
    margin-top: 30px;
    }
    .txtb{
    border-bottom: 2px solid #adadad;
    position: relative;
    margin: 30px 0;
    }
    .login-form{
    width: 360px;
    background: #FFFFFF;
    height: 680px;
    padding: 30px 40px;
    border-radius: 10px;
    margin-top:20px;
  }
    body{
    min-height: 100vh;
    background-image: linear-gradient(120deg,#B22222,#FFFFFF);  
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
            </ul>
        </div>
    </nav>
    <div style="display:flex;justify-content:center;align-items:center;">
    <!-- แบบฟอร์มที่ส่งไปยังหน้า AdminPageProcess.php ในโฟลเดอร์ process -->
    <form method="POST" action="./Process/AdminPageProcess.php" class="login-form">
        <img src="../img/logocmtc.jpg"width="100" height="100"  alt="">
        <h1>Login Admin</h1>
        <div class="txtb">
            <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                aria-describedby="emailHelp"  placeholder="username" required="required">
        </div>
        <div class="txtb">
            <input type="password" class="form-control" name="password" id="exampleInputPassword1"  placeholder="Password" required="required">
        </div>
        <input type="submit" class="logbtn" value="Login">
        <br>
        <a href="./LoginPage.php" class="btn btn-primary">ย้อนกลับ</a>
    </form>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    </div>
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>" ></div>
    <?php endif; ?>
    
    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>

    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เข้าสู่ระบบล้มเหลว
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'เข้าสู่ระบบล้มเหลว!'
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