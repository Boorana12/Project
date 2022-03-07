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
<?php include '../dist/css/card.css';
?>
</style>

<body>
    <!---------------------------------------------Carousel------------------------------------------->
    <div class>
        <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('../img/itcmtc/HomePage.png'); ">

                </div>
                <div class="carousel-item " style="background-image: url('../img/itcmtc/1581923390_9169-org.jpg')">

                </div>
                <div class="carousel-item " style="background-image: url('../img/itcmtc/1581923426_7629-org.jpg')">

                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br>
    <!---------------------------------------------CARD------------------------------------------->
    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="../img/searching.png" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Search</h5>
                            <p class="card-text">หน้าค้นหาโครงการ</p>
                            <a href="../SearchPage/Search.php" class="btn btn-outline-success btn-sm">ไปที่หน้านี้</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="../img/flowchart.png" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Projects</h5>
                            <p class="card-text">หน้าโครงการทั้งหมด</p>
                            <a href="../ProjectPage/Project.php" class="btn btn-outline-success btn-sm">ไปที่หน้านี้</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="../img/contact.png" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Contact</h5>
                            <p class="card-text">ข้อมูลติดต่อ</p>
                            <a href="../ContactPage/Contact.php" class="btn btn-outline-success btn-sm">ไปที่หน้านี้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------CARD------------------------------------------->
    <?php
    require("../layout/footer.php")
    ?>
</body>

</html>