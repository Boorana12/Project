<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
?>

<!doctype html>
<html lang="en">
<?php
require("../layout/navbar.php");
?>

<body>


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
                            <form method="POST" action="./Process/HomeProcess.php" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="research-name" id="research-name" aria-describedby="emailHelp" placeholder="สิ่งที่ต้องการสืบค้น">
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
                        if (isset($_GET['option']) && $_GET['option'] == "ชื่อโครงการ") {
                            $optionswitch = 1;
                        }
                        if (isset($_GET['option']) && $_GET['option'] == "ประเภท") {
                            $optionswitch = 2;
                        }
                        if (isset($_GET['option']) && $_GET['option'] == "ระดับชั้น") {
                            $optionswitch = 3;
                        }
                        if (isset($_GET['option']) && $_GET['option'] == "ปีการศึกษา") {
                            $optionswitch = 4;
                        }
                        if (isset($_GET['option']) && $_GET['option'] == "ชื่อหัวหน้าโครงการ") {
                            $optionswitch = 5;
                        }

                        if (isset($_GET['name'])) {
                            $name = $_GET['name'];
                        }


                        switch ($optionswitch) {
                            case "1":
                                $readResearch = "SELECT * FROM researchs Where
                  research_NameThai LIKE '%$name%' OR
                  research_NameEnglish LIKE '%$name%' ";
                                break;
                            case "2":
                                $readResearch = "SELECT * FROM researchs Where
                  research_Type LIKE '%$name%' ";
                                break;
                            case "3":
                                $readResearch = "SELECT * FROM researchs Where
                  research_StudentClass LIKE '%$name%' ";
                                break;
                            case "4":
                                $readResearch = "SELECT * FROM researchs Where
                  research_YearCompletion LIKE '%$name%' ";
                                break;
                            case "5":
                                $readResearch = "SELECT * FROM researchs Where
                  research_ProjectLeaderName LIKE '%$name%' ";
                                break;
                            default:
                        }

                        ?>
                        <div class="table-responsive">
                            <!-- ทำการเชื่อมต่อ -->
                            <?php if (isset($_GET['name'])) { ?>
                                <table id="example" class="table table-striped table-bordered " style="width:100%">
                                    <!-- หัวตาราง  -->
                                    <thead>
                                        <tr style="background-color:#F5F5F5 " align="center">
                                            <td width="4%">ลำดับ</td>
                                            <td width="20%">ชื่อโครงการภาษาไทย</td>
                                            <td width="20%">ชื่อโครงการภาษาอังกฤษ</td>
                                            <td width="9%">ประเภท</td>
                                            <td width="19%">ชื่อหัวหน้าโครงการ</td>
                                            <td width="9%">ปีการศึกษา</td>
                                            <td width="10%">ระดับชั้น</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $readResearchResult = mysqli_query($conn, $readResearch); ?>
                                        <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
                                            <?php
                                            $number = 0;
                                            while ($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                                                <!-- ทำซ้ำข้อมูลทั้งหมดให้แสดงออกมาจนกว่าจะครบ -->
                                                <!-- สร้างตัวแปร number เพื่อเรียงลำดับ -->
                                                <?php $number = $number + 1; ?>
                                                <?php $name = $row["research_NameThai"]; ?>
                                                <tr style="background-color:#FFFFFF ">
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $number ?>
                                                    </td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php
                                                        echo "<a href=\"../ProjectPage/ProjectDetail.php?id=" . $row["research_No"] . "\">$name</a>";
                                                        ?>
                                                    </td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php echo $row["research_NameEnglish"] ?></td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php echo $row["research_Type"] ?></td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php echo $row["research_ProjectLeaderName"] ?></td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php echo $row["research_YearCompletion"] ?></td>
                                                    <td style="text-align:justify;text-justify:inter-word">
                                                        <?php echo $row["research_StudentClass"] ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>

                                        <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="" style="margin-top: 10%;"></div>
    <?php
    require("../layout/footer.php")
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>