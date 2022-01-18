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
<style>
    <?php include '../dist/css/contact.css';

    ?>
</style>

<body>
    <div class="container">
        <!--------------- ส่วนเนื้อหา -------------->
        <div class="container" style="padding-top: 3%;">
            <div class="card">
                <div class="justify-content-between">
                    <font size="5">&nbsp;ตำแหน่งที่ตั้ง</font>
                </div>

                <p>
                    <font size="5"><i class="fas fa-home"></i></font>
                    <font size="4"> สาขาวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคเชียงใหม่</font>
                </p>
                <p>
                    <font size="6"><i class="fas fa-map-marker-alt"></i></font>
                    <font size="4"> เลขที่ 9 ถ.เวียงแก้ว ต.ศรีภูมิ อ.เมือง จ.เชียงใหม่ </font>
                </p>
                <p>
                    <font size="6"><i class="fas fa-phone-alt"></i> </font>
                    <font size="4"> โทร. 053-217708</font>
                </p>
                <p>
                    <font size="6"><i class="fab fa-facebook-square"></i></font>
                    <font size="4">Facebook : <a href="https://www.facebook.com/itcmtc">https://www.facebook.com/itcmtc</a></font>
                </p>
                <p>
                    <font size="6"><i class="fab fa-line"></i> </font>
                    <font size="4">Line :</font>
                </p>

                <!--<p class="" style="background:#FFFFFF !important ">
                    <img src="../img/home.png" width="4%" height="4%">
                    <font size="4">&nbsp;สาขาวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคเชียงใหม่ </font><br>
                    <img src="../img/location-pin.png" width="4%" height="4%">
                    <font size="4">&nbsp;เลขที่ 9 ถ.เวียงแก้ว ต.ศรีภูมิ อ.เมือง จ.เชียงใหม่ 50300</font><br>
                    <img src="../img/telephone-call.png" width="4%" height="4%">
                    <font size="4">&nbsp;โทร. 053-217708</font><br>
                    <img src="../img/facebook.png" width="4%" height="4%">
                    <font size="4">&nbsp;Facebook :&nbsp; </font> <a
                        href="https://www.facebook.com/itcmtc">https://www.facebook.com/itcmtc</a><br>
                    <img src="../img/line.png" width="4%" height="4%">
                    <font size="4">&nbsp;Line :</font><br>
                </p>-->
            </div>
            <br>
            <div style="display:flex;justify-content:center;align-items:center; " class="card">
                <iframe width="100%" height="500" frameborder="0" style="border:0;" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3wrYcZo62jARFiQFxX9lH-Q&key=AIzaSyAh1K7tMB3zP1wn8kGXBVpAxJPC4VoTr_4" allowfullscreen></iframe>
            </div>
        </div>
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
    <script src="https://kit.fontawesome.com/eba1dc755a.js" crossorigin="anonymous"></script>
</body>

</html>