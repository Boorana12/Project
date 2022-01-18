<head>
    <title>IT CMTC RESEARCH</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link rel="icon" href="../img/clipboard.png">
    <style>
        <?php include '../dist/css/navbar.css';
        ?>
    </style>
</head>
<!-- แถบ Navigation Bar ส่วนหัว -->
<nav class="navbar navbar-expand-lg ">
    <img src="../img/task.png" width="30" height="30">
    <a class="navbar-brand" href="../HomePage/Homepage.php"><b>&nbsp; CMTC RESEARCH</b></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
            <!-- ตรวจสอบว่ามี session ที่ชื่อว่า admin หรือ users รึเปล่า ถ้ามีให้แสดงหน้าต่าง edit หรือ UserEdit -->
            <?php if (isset($_SESSION["admin"])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../EditPage/Edit.php">Admin Edit</a>
                </li>
            <?php } else {
                (isset($_SESSION["username"])) ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../EditPage/UserEdit.php">Edit</a>
                </li>
            <?php } ?>
            <!-- จบการทำงาน -->
        </ul>
        <!-- ตรวจสอบว่ามี session ที่ชื่อว่า username รึเปล่า ถ้าไม่มีให้แสดงคำสั่งลิงก์ไปยังหน้า login -->
        <!--<?php if (!isset($_SESSION["username"])) { ?>
        <span class="navbar-text">
            <a href="../Login/LoginPage.php">Login</a>
        </span>-->
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
                <?php while ($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                    <!-- หาก id ของผู้เข้าใช้งานมีไฟล์ภาพให้นำไปเก็บในค่า photo -->
                    <?php $photo = $row["userphotoicon"] ?>
                    <!-- หาก id ของผู้เข้าใช้งานไม่มีไฟล์ภาพให้แทนด้วยค่า icon.1 ซึ่งเป็นภาพว่างเปล่าแล้วเก็บในค่า photo -->
                    <?php if (empty($photo)) {
                            $photo = "icon1.jpg";
                        } ?>
                    <!-- แสดงภาพโดยใช้ค่า photo เรียกมาจาก id ตาราง users -->
                    <?php if (!isset($_SESSION["admin"])) echo "<a href=\"../Profile/MyProfile.php?id=" . $row["id"] . "\"><img src='../img/usersphoto/" . $photo . "'width='30' height='30' align='center'></a>" ?>
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