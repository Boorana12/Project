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
        <script src="https://cdnjs.cloudflare.com/.../jquery/3.4.1/jquery.min.js" charset="utf-8">
    </script>
    <style>
      .login-form img{
    margin-left: 90px;
    margin-bottom: 1px;
    }
    .logbtn:hover{
    background-position: right;
  }
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
    .txtb span::before{
    content: attr(data-placeholder);
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    z-index: -1;
    transition: .5s;
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
    .txtb{
    border-bottom: 2px solid #adadad;
    position: relative;
    margin: 30px 0;
  }
    .login-form h1{
    text-align: center;
    margin-bottom: 30px;
    margin-top: 30px;
  }
  .login-form{
    width: 360px;
    background: #FFFFFF;
    height: 680px;
    padding: 30px 40px;
    border-radius: 10px;
    margin-top:20px;
  }
  .bottom-text{
    margin-top: 60px;
    text-align: center;
    font-size: 16px;
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
<?php
require("../layout/navbar.php");
?>
<div style="display:flex;justify-content:center;align-items:center;">
<!-- แบบฟอร์มที่ส่งไปยังหน้า LoginPageProcess.php ในโฟลเดอร์ process -->
<form action="./Process/LoginPageProcess.php" class="login-form" method="POST">
  <img src="../img/logocmtc.jpg"width="100" height="100"  alt="">
        <h1>Login</h1>
        
        <div class="txtb">
          <input type="email" required="required" name="email" class="form-control" id="exampleInputEmail1"aria-describedby="emailHelp"placeholder="Email">
        </div>
        <div class="txtb">
          <input type="password" required="required" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        
        </div>
        <input type="submit" class="logbtn" value="Login">
        <div class="bottom-text">
          Don't have account? <a href="RegisterPage.php">Sign up</a>
        </div>
        <div class="bottom-text">
        <a href="AdminPage.php">Log in as administrator.</a>
        </div>
      </form>
      </div>
      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });
      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });
      </script>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>" ></div>
    <?php endif; ?>
    <?php if (isset($_GET['u'])) : ?>
        <div class="flash-data-2" data-flashdata="<?= $_GET['u']; ?>" ></div>
    <?php endif; ?>
    <?php if (isset($_GET['s'])) : ?>
        <div class="flash-data-3" data-flashdata="<?= $_GET['u']; ?>" ></div>
    <?php endif; ?>
    
    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>

    // ถ้าหากว่ามีค่าให้แสดง sweeetalert สมัครสมาชิกสำเร็จ
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'สมัครสมาชิกสำเร็จ!'
        })
    }
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert เข้าสู่ระบบล้มเหลว
    const flashdata2 = $('.flash-data-2').data('flashdata')
    if (flashdata2){
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'เข้าสู่ระบบล้มเหลว!'
        })
    }
    // ถ้าหากว่ามีค่าให้แสดง sweeetalert สมัครสมาชิกไม่สำเร็จ
    const flashdata3 = $('.flash-data-3').data('flashdata')
    if (flashdata3){
        Swal.fire({
            type: 'success',
            title: 'Something Wrong',
            text: 'สมัครสมาชิกไม่สำเร็จ!'
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