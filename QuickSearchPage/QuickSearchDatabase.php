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
    <link herf="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Sarabun', sans-serif;
    }

    table {
        border-collapse: collapse;
        margin-right: 30px;
        margin-left: 30px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    #gridLeft,
    #gridRight {
        margin-left: 50px;
        padding-top: 20px;
    }

    #gridLeftTopic {
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
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <!-- ส่วน QuickSearch -->
                        <font size="6" class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1  ">
                            <span>QuickSearch</span>
                        </font>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchAnimation.php">
                                <font size="4">
                                    <span>Animation</span>
                                </font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchApplication.php">
                                <font size="4">
                                    <span data-feather="file"></span>
                                    Application
                                </font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchDatabase.php">
                                <font size="4">
                                    <span data-feather="bar-chart-2"></span>
                                    Database
                                </font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchGame.php">
                                <font size="4">
                                    <span data-feather="users"></span>
                                    Game
                                </font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchHardWare.php">
                                <font size="4">
                                    <span data-feather="file"></span>
                                    HardWare
                                </font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../QuickSearchPage/QuickSearchWebsite.php">
                                <font size="4">
                                    <span data-feather="bar-chart-2"></span>
                                    Website
                                </font>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-9">
                <section id="products" class="pt-4">
                    <div class="container">
                        <div>
                            <h3 id="gridRight">ประเภทการค้นหา Database</h3>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <!-- หัวตาราง  -->
                            <thead>
                                <tr style="background-color:#D3D3D3" align="center">
                                    <td width="4%">ลำดับ</td>
                                    <td width="20%">ชื่อโครงการภาษาไทย</td>
                                    <td width="20%">ชื่อโครงการภาษาอังกฤษ</td>
                                    <td width="9%">ประเภท</td>
                                    <td width="19%">ชื่อหัวหน้าโครงการ</td>
                                    <td width="9%">ปีที่จัดทำ</td>
                                    <td width="10%">ปีการศึกษา</td>
                                </tr>
                            </thead>
                            <tbody>
                                <div>
                                    <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                                    <!-- เลือกประเภท Database -->
                                    <?php 
                                $readResearch = "SELECT * FROM researchs WHERE research_Type = 'Database' ";
                                $readResearchResult = mysqli_query($conn, $readResearch);
                                ?>
                                    <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
                                    <?php
                                    $number = 0;
                                    while($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                                    <!-- ทำซ้ำข้อมูลทั้งหมดให้แสดงออกมาจนกว่าจะครบ -->
                                    <!-- สร้างตัวแปร number เพื่อเรียงลำดับ -->
                                    <?php $number = $number + 1; ?>
                                    <?php $name = $row["research_NameThai"]; ?>
                                    <tr>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $number ?></td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php
                                        echo "<a href=\"../ProjectPage/ProjectDetail.php?id=" . $row["research_No"] . "\">$name</a>";
                                        ?>
                                        </td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $row["research_NameEnglish"] ?></td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $row["research_Type"] ?></td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $row["research_ProjectLeaderName"] ?></td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $row["research_YearCompletion"] ?></td>
                                        <td style="text-align:justify;text-justify:inter-word" align="center">
                                            <?php echo $row["research_StudentClass"] ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } else { ?>

                                    <?php } ?>
                                </div>
                            </tbody>
                        </table>
                        <a id="gridLeftTopic" href="../SearchPage/Search.php" class="btn btn-primary">ย้อนกลับ</a>
                    </div>
                </section>
            </div>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pageLength": 10, //จำนวนข้อมูลที่ให้แสดง ต่อ 1 หน้า
            "searching": false, //เปิด=true ปิด=false ช่องค้นหาครอบจักรวาล
            "lengthChange": false, //เปิด=true ปิด=false ช่องปรับขนาดการแสดงผล
        });
    });
    </script>
</body>

</html>