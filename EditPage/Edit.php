<!-- เปิดการทำงาน session และดึงการเชื่อมต่อฐานข้อมูลมาจากไฟล์ที่ชื่อว่า db.php -->
<?php
session_start();
include_once "../Connection/db.php";
// ตรวจสอบว่ามี session admin รึเปล่า ถ้าไม่มีให้เด้งไปยังหน้า login เข้าใช้งานระบบ admin
if (!isset($_SESSION["admin"])) {
    header('Location: ../Login/AdminPage.php');
}
?>

<!doctype html>
<html lang="en">
<?php
require("../layout/navbar.php");
?>

<body>
    <div class="container-fluid">
        <div class="">
            <!--------------- ส่วนเนื้อหา -------------->
            <div class="col-md-9 col-lg-9 col-sm-12">
                <section id="products" class="pt-4">
                    <div class="container">
                        <div>
                            <h3 id="gridRight">รายชื่อโครงการทั้งหมด</h3>
                        </div><br>
                        <a id="gridLeftTopic" href="./AddPage.php" class="btn btn-primary">เพิ่มข้อมูล</a>
                        <br>
                        <br>
                        <div class="table-responsive-sm">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <!-- หัวตาราง  -->
                                <thead>
                                    <tr style="background-color:#DCDCDC " align="center">
                                        <td width="4%">หมายเลข</td>
                                        <td width="20%">ชื่อโครงการภาษาไทย</td>
                                        <td width="20%">ชื่อโครงการภาษาอังกฤษ</td>
                                        <td width="10%">ประเภท</td>
                                        <td width="19%">ชื่อหัวหน้าโครงการ</td>
                                        <td width="10%">ปีการศึกษา</td>
                                        <td width="10%">ระดับชั้น</td>
                                        <td width="9%">แก้ไข</td>
                                        <td width="9%">ลบ</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div>
                                        <!-- ดึงข้อมูลทั้งหมดในตารางแล้วทำการเชื่อมต่อ -->
                                        <?php
                                        $readResearch = "SELECT * FROM researchs";
                                        $readResearchResult = mysqli_query($conn, $readResearch);
                                        ?>
                                        <?php if (mysqli_num_rows($readResearchResult) > 0) { ?>
                                            <!-- ทำซ้ำข้อมูลทั้งหมดให้แสดงออกมาจนกว่าจะครบ -->
                                            <?php while ($row = mysqli_fetch_assoc($readResearchResult)) { ?>
                                                <tr>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_No"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_NameThai"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_NameEnglish"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_Type"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_ProjectLeaderName"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_YearCompletion"] ?></td>
                                                    <td style="text-align:justify:text-justify:inter-word"><?php echo $row["research_StudentClass"] ?></td>
                                                    <?php
                                                    echo "<td><a class=\"btn btn-primary btn-block\" href=\"./UpdatePage.php?id=" . $row["research_No"] . "\" role=\"button\">แก้ไข</a></td>";
                                                    echo "<td><div class=\"btn btn-danger btn-block\"><a class=\"btn-del\" href=\"./Process/DeleteResearchQuick.php?id=" . $row["research_No"] . "\" role=\"button\">ลบ</a></div></td>";
                                                    ?>
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
        </div>
    </div>

    <!-- สร้างคำสั่งตรวจสอบค่า -->
    <?php if (isset($_GET['m'])) : ?>
        <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['u'])) : ?>
        <div class="flash-data-2" data-flashdata="<?= $_GET['u']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['n'])) : ?>
        <div class="flash-data-3" data-flashdata="<?= $_GET['n']; ?>"></div>
    <?php endif; ?>
    <?php if (isset($_GET['s'])) : ?>
        <div class="flash-data-4" data-flashdata="<?= $_GET['s']; ?>"></div>
    <?php endif; ?>

    <script src="../sweetalert/jquery-3.5.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <script>
        // เมื่อทำการคลิกปุ่ม delete ที่มี class btn-del จะเด้ง sweetalert
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
                type: 'warning',
                title: 'Are You Sure?',
                text: 'Record will be deleted ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete Record'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })

        })
        // ถ้าหากว่ามีค่าให้แสดง sweeetalert แก้ไขสำเร็จ
        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                type: 'success',
                title: 'Update Success',
                text: 'แก้ไขสำเร็จ!'
            })
        }
        // ถ้าหากว่ามีค่าให้แสดง sweeetalert ลบสำเร็จ
        const flashdata2 = $('.flash-data-2').data('flashdata')
        if (flashdata2) {
            Swal.fire({
                type: 'success',
                title: 'Success',
                text: 'ลบสำเร็จ!'
            })
        }
        // ถ้าหากว่ามีค่าให้แสดง sweeetalert แก้ไขไม่สำเร็จ
        const flashdata3 = $('.flash-data-3').data('flashdata')
        if (flashdata3) {
            Swal.fire({
                type: 'success',
                title: 'Something Wrong',
                text: 'แก้ไขไม่สำเร็จ!'
            })
        }
        // ถ้าหากว่ามีค่าให้แสดง sweeetalert เพิ่มข้อมูลสำเร็จ
        const flashdata4 = $('.flash-data-4').data('flashdata')
        if (flashdata4) {
            Swal.fire({
                type: 'success',
                title: 'Add Success',
                text: 'เพิ่มข้อมูลสำเร็จ!'
            })
        }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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