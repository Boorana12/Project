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
        <section id="products" class="pt-4">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-10">
                        <h3>รายชื่อโครงการทั้งหมด</h3>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <!-- หัวตาราง  -->
                        <thead>
                            <tr style="background-color:#D3D3D3 " align="center">
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
                            <div>
                                <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                                <?php
                                $readResearch = "SELECT * FROM researchs order by research_NameThai asc ";
                                $readResearchResult = mysqli_query($conn, $readResearch);
                                ?>
                                <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
                                    <!-- ทำซ้ำข้อมูลทั้งหมดให้แสดงออกมาจนกว่าจะครบ -->
                                    <!-- สร้างตัวแปร number เพื่อเรียงลำดับ -->
                                    <?php
                                    $number = 0;
                                    while ($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                                        <?php $number = $number + 1; ?>
                                        <?php $name = $row["research_NameThai"]; ?>
                                        <tr>
                                            <td style="text-align:justify;text-justify:inter-word" align="center">
                                                <?php echo $number ?></td>
                                            <td style="text-align:justify;text-justify:inter-word">
                                                <?php
                                                echo "<a href=\"./ProjectDetail.php?id=" . $row["research_No"] . "\">$name</a>";
                                                ?>
                                            </td>
                                            <td style="text-align:justify;text-justify:inter-word">
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
                </div>
            </div>
        </section>
    </div>
    <div class="" style="margin-top: 3%;"></div>
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