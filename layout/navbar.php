<head>
    <title>IT CMTC RESEARCH</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <style>
    body {
        font-family: 'Sarabun', sans-serif;
        background-color: whitesmoke;
    }

    .login-form img {
        margin-left: 90px;
        margin-bottom: 1px;
    }

    .logbtn:hover {
        background-position: right;
    }

    .logbtn {
        display: block;
        width: 100%;
        height: 50px;
        border: none;
        background: linear-gradient(120deg, whitesmoke, grey, whitesmoke);
        background-size: 200%;
        color: #000000;
        outline: none;
        cursor: pointer;
        transition: .5s;
        font-size: 20px;
        border-radius: 20px;
    }

    .txtb span::before {
        content: attr(data-placeholder);
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        z-index: -1;
        transition: .5s;
    }

    .txtb input {
        font-size: 15px;
        color: #333;
        border: none;
        width: 100%;
        outline: none;
        background: none;
        padding: 0 5px;
        height: 40px;

    }

    .txtb {
        border-bottom: 2px solid #adadad;
        position: relative;
        margin: 30px 0;
    }

    .login-form h1 {
        text-align: center;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .login-form {
        width: 360px;
        background: #FFFFFF;
        height: 680px;
        padding: 30px 40px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .bottom-text {
        margin-top: 60px;
        text-align: center;
        font-size: 16px;
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

    a {
        color: black;
    }

    a ::after {
        color: black;
    }

    nav {
        background-color: whitesmoke;
    }

    .navbar-toggler {
        border: 0 !important;
    }

    .navbar-toggler:focus,
    .navbar-toggler:active,
    .navbar-toggler-icon:focus {
        outline: none !important;
        box-shadow: none !important;
        border: 0 !important;
    }

    /* Lines of the Toggler */
    .toggler-icon {
        width: 30px;
        height: 3px;
        background-color: #e74c3c;
        display: block;
        transition: all 0.2s;
    }

    /* Adds Space between the lines */
    .middle-bar {
        margin: 5px auto;
    }

    /* State when navbar is opened (START) */
    .navbar-toggler .top-bar {
        transform: rotate(45deg);
        transform-origin: 10% 10%;
    }

    .navbar-toggler .middle-bar {
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .navbar-toggler .bottom-bar {
        transform: rotate(-45deg);
        transform-origin: 10% 90%;
    }

    /* State when navbar is opened (END) */

    /* State when navbar is collapsed (START) */
    .navbar-toggler.collapsed .top-bar {
        transform: rotate(0);
    }

    .navbar-toggler.collapsed .middle-bar {
        opacity: 1;
        filter: alpha(opacity=100);
    }

    .navbar-toggler.collapsed .bottom-bar {
        transform: rotate(0);
    }

    /* State when navbar is collapsed (END) */

    /* Color of Toggler when collapsed */
    .navbar-toggler.collapsed .toggler-icon {
        background-color: #777777;
    }

    p.contact {
        border-color: #FAEBD7;
        border-style: solid;
    }

    div.card {
        border-radius: 20px;
        border-color: black;
        border-width: 5px;

    }

    .my-nav {
        position: absolute;
        z-index: 10;
        width: 100%;
    }

    .carousel-item {
        height: 100vh;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    </style>
</head>
<!-- แถบ Navigation Bar ส่วนหัว -->
<nav class="navbar navbar-expand-lg ">
    <img src="../img/task.png" width="30" height="30">
    <a class="navbar-brand" href="../HomePage/Homepage.php">&nbsp; CMTC RESEARCH</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <!-- ทำลิงก์ไปยังหน้าเว็บต่างๆ -->
            <li class="nav-item active">
                <a class="nav-link" href="../HomePage/Homepage.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../SearchPage/Search.php">Search</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../SearchPage/Search Advance.php">Search Advance</a>
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