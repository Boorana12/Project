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
    #gridLeft{
    margin-left: 50px;
    padding-top: 20px;
    }

    #gridRight{
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

<body >
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

            
<div class="container-fluid">
  <div class="row">
    <!--------------------------------- body --------------------------------->
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
      <p><br></p>
      <div class="justify-content-between">
        <img src="../img/logocmtc.png" width="180" height="180" class="rounded mx-auto d-block"><br>
        <div class="row">
          <div class="col-3"></div>
            <div class="col-6">
              <!-- แบบฟอร์มที่ส่งไปยังหน้า ResultSearch.php -->
              <form method="POST" action="./Process/HomeProcess.php" role="form"  >
                <div class="form-group">
                    <input type="text" class="form-control" name="research-name" id="research-name"
                        aria-describedby="emailHelp" placeholder="สิ่งที่ต้องการสืบค้น">
                </div>
                <div class="form-group">
                    <label for="research-option">ตัวเลือก</label>
                    <select class="form-control" name="research-option" id="research-option">
                        <option>ชื่อโครงการ</option>
                        <option>ประเภท</option>
                        <option>ระดับชั้น</option>
                        <option>ปีการศึกษา</option>
                        <option>ชื่อหัวหน้าโครงการ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">ค้นหา</button>
                <br><br><br>
              </form>
            </div>
            <?php
            $optionswitch = 0;
            if (isset($_GET['option']) && $_GET['option'] == "ชื่อโครงการ"){
              $optionswitch = 1;
            }
            if (isset($_GET['option']) && $_GET['option'] == "ประเภท"){
              $optionswitch = 2;
            }
            if (isset($_GET['option']) && $_GET['option'] == "ระดับชั้น"){
              $optionswitch = 3;
            }
            if (isset($_GET['option']) && $_GET['option'] == "ปีการศึกษา"){
              $optionswitch = 4;
            }
            if (isset($_GET['option']) && $_GET['option'] == "ชื่อหัวหน้าโครงการ"){
              $optionswitch = 5;
            }
            
            if (isset($_GET['name'])){
              $name = $_GET['name'];
            }


            switch ($optionswitch) {
              case "1":
                  $readResearch = "SELECT * FROM researchs Where
                  research_NameThai LIKE '%$name%' OR
                  research_NameEnglish LIKE '%$name%' "
                  ;
                  break;
              case "2":
                  $readResearch = "SELECT * FROM researchs Where
                  research_Type LIKE '%$name%' "
                  ;
                  break;
              case "3":
                  $readResearch = "SELECT * FROM researchs Where
                  research_StudentClass LIKE '%$name%' "
                  ;
                  break;
              case "4":
                  $readResearch = "SELECT * FROM researchs Where
                  research_YearCompletion LIKE '%$name%' "
                  ;
                  break;
              case "5":
                  $readResearch = "SELECT * FROM researchs Where
                  research_ProjectLeaderName LIKE '%$name%' "
                  ;
                  break;
              default:
              }
            
            ?>
            <div class="table-responsive">
            <!-- ทำการเชื่อมต่อ -->
            <?php if (isset($_GET['name'])){ ?>
              <table id="example" class="table table-striped table-bordered " style="width:100%"> 
              <!-- หัวตาราง  -->
              <thead>
                  <tr style="background-color:#F5F5F5 " align="center">
                  <td  width="4%">ลำดับ</td>
                      <td  width="20%">ชื่อโครงการภาษาไทย</td>
                      <td  width="20%">ชื่อโครงการภาษาอังกฤษ</td>
                      <td  width="9%">ประเภท</td>
                      <td  width="19%">ชื่อหัวหน้าโครงการ</td>
                      <td width="9%">ปีการศึกษา</td>
                      <td  width="10%">ระดับชั้น</td>
                  </tr>
              </thead>
              <tbody>
            <?php $readResearchResult = mysqli_query($conn,$readResearch); ?>
              <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
              <?php 
                  $number = 0;
                  while($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                  <!-- ทำซ้ำข้อมูลทั้งหมดให้แสดงออกมาจนกว่าจะครบ -->
                  <!-- สร้างตัวแปร number เพื่อเรียงลำดับ -->
                  <?php $number = $number + 1 ; ?>
                  <?php $name = $row["research_NameThai"]; ?>
                  <tr style="background-color:#FFFFFF ">
                      <td  style="text-align:justify:text-justify:inter-word"><?php echo $number ?></td>
                      <td  style="text-align:justify:text-justify:inter-word">
                      <?php
                      echo "<a href=\"../ProjectPage/ProjectDetail.php?id=" . $row["research_No"] . "\">$name</a>";
                      ?>
                      </td>
                      <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_NameEnglish"] ?></td>
                      <td  style="text-align:justify:text-justify:inter-word"><?php echo $row["research_Type"] ?></td>
                      <td  style="text-align:justify:text-justify:inter-word"><?php echo $row["research_ProjectLeaderName"] ?></td>
                      <td  style="text-align:justify:text-justify:inter-word"><?php echo $row["research_YearCompletion"] ?></td>
                      <td  style="text-align:justify:text-justify:inter-word"><?php echo $row["research_StudentClass"] ?></td>
                  </tr>
              <?php } ?>
              <?php } else { ?>
               
              <?php } ?>
              <?php } ?> </tbody>
                </table>
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