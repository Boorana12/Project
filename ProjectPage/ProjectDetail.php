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
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

    .button2 {
  display: inline-block;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #FFFFFF;
  background-color: #F5F5F5;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

    .button1 {
    display: inline-block;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #FFFFFF;
  background-color: #FFFAFA;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button1:hover {
  background-color: #DCDCDC;
}
.button2:hover {
  background-color: #DCDCDC;
}
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

       body{
      font-family: 'Sarabun', sans-serif;
    }
    table {
    border-collapse: collapse;
    width: 100%; 
    }

    table, th, td {
    border: 1px solid black;
    
    
    }

    #gridLeft, #gridRight{
    margin-left: 50px;
    padding-top: 20px;
    }
    
    #gridLeftTopic{
    margin-left: 50px;
    }
    p.abstract{
        text-indent: 1cm;
    }
    </style>
</head>

<body>
<?php
require("../layout/navbar.php");
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ml-sm-auto col-lg-12 px-md-5">
                <section id="products" class="pt-4">
                    <div class="container">
                        <div>
                        <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                        <?php
                        $id = $_GET["id"];
                        $readResearch = "SELECT * FROM researchs WHERE research_No  = $id";
                        $readResearchResult = mysqli_query($conn, $readResearch);

                        if (mysqli_num_rows($readResearchResult) > 0) {
                            $row = mysqli_fetch_assoc($readResearchResult);
                        }
                        ?>
                        <!-- สร้างตาราง -->
                        <div class="table-responsive">
                        <table cellpadding="10"> 
                            <thead>
                                <tr>
                                <!-- ถ้าไม่มีค่าในภาพให้แทนด้วย icon1.jpg -->
                                <?php if (empty($row['research_Image'])) {
                                $row['research_Image'] = "icon1.jpg";
                                } ?>
                                  <!-- แสดงข้อมูลทั้งหมดออกมาทีละอย่าง -->
                                  <td align="center"><?php echo "<img src='../img/researchimg/".$row['research_Image']."'width='250' height='180' align='center'>" . "<br>" ?>
                                      <div><h4 ><font size="4">ชื่อผลงานภาษาไทย : <?php echo $row['research_NameThai'] ?></div>
                                      <div><font size="4">ชื่อผลงานภาษาอังกฤษ : <?php echo  $row['research_NameEnglish']?></div>
                                  </td>
                                  <td>
                                      <div><font size="4">หัวหน้าคณะผู้จัดทำ : </font > <?php echo "<font size='4'>".$row['research_ProjectLeaderName']."</font >"?> </div>
                                      <div><font size="4">ประเภท :  </font ><?php echo  "<font size='4'>".$row['research_Type']."</font >"?> </div>
                                      <div><font size="4">อีเมลล์ของหัวหน้าคณะผู้จัดทำ : </font >   <?php echo "<font size='4'>".$row['research_ProjectLeaderEmail']."</font >"?> </div>
                                      <div><font size="4">อาจารย์ที่ปรึกษาหลัก : </font > <?php echo "<font size='4'>".$row['research_AdvisorName']."</font >"?> </div>
                                      <div><font size="4">จัดทำเมื่อปีการศึกษา : </font > <?php echo "<font size='4'>".$row['research_YearCompletion']."</font >"?> </div>
                                      <div><font size="4">ระดับชั้น : </font > <?php echo "<font size='4'>".$row['research_StudentClass']."</font >" ?></div>
                                      <div><font size="4">จำนวนสมาชิก : </font > <?php echo "<font size='4'>".$row['research_Member']."</font >"?></div>
                                  </td>
                                </tr>
                            <thead>
                            <tbody>
                                <!-- แสดงข้อมูลบทคัดย่อ -->
                                <tr>
                                    <td colspan="2">
                                    <p class="abstract" style="word-break:break-all"><font size="4" >บทคัดย่อ</font ><br><?php echo "<font size='4'>".$row['research_Text']."</font >"?></p>
                                    </td>
                                </tr>
                                   
                            </tbody>
                        </table >
                        </div>
                        <br>
                        <!-- ถ้าหากล็อกอินเข้าใช้งานจะสามารถดาวน์โหลดไฟล์ได้ -->
                        <!-- ถ้าพบ session ที่มีชื่อว่า username -->
                        <div style="display:flex">
                         <?php if(isset($_SESSION["username"])) { ?>
                            <?php if(isset($row['research_FileWord'])) { ?>
                            <?php echo "<img src=\"../img/logoword.png\" width=\"50\" height=\"45\"><button type=\"button\" class=\"button1\"><a href=\"../file/download_file_word.php?file=" . $row['research_FileWord'] . "\" >
                                        ดาวน์โหลดบทคัดย่อ WORD
                                        </a></button>&nbsp; &nbsp;"; ?>
                            <?php } else {
                                    echo "<img src=\"../img/logoword.png\" width=\"50\" height=\"45\"><button type=\"button\" class=\"button1\"><a style=\"color:blue;\">
                                        ผลงานวิจัยนี้ไม่มีบทคัดย่อ WORD
                                        </a></button>&nbsp; &nbsp;";} ?>
                            <?php if(isset($row['research_FilePDF'])) { ?>
                            <?php echo "<img src=\"../img/logopdf.png\" width=\"50\" height=\"45\"><button type=\"button\" class=\"button2\"><a href=\"../file/download_file_pdf.php?file=" . $row['research_FilePDF'] . "\" >
                                        ดาวน์โหลดบทคัดย่อ PDF
                                        </a></button>"; ?> 
                            <?php } else {
                                    echo "<img src=\"../img/logoword.png\" width=\"50\" height=\"45\"><button type=\"button\" class=\"button1\"><a style=\"color:blue;\">
                                        ผลงานวิจัยนี้ไม่มีบทคัดย่อ PDF
                                        </a></button>&nbsp; &nbsp;";} ?>
                         <?php } else { ?>
                          <p>ต้องทำการล็อคอินเข้าใช้งานก่อนถึงจะดาวน์โหลดไฟล์บทคัดย่อได้</p>
                         <?php } ?>
                         </div>
                        </div>
                    </div>
                </section>
            </div>
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