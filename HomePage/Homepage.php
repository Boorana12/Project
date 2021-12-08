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
    <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('../img/itcmtc/1581923390_4662-org.jpg')">

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
    <br>
    <!---------------------------------------------CARD------------------------------------------->
    <div class="row" style="margin:0%;; max-width: 100%;">
        <div class="col">
            <div class="card animate__animated animate__backInLeft">
                <img src="https://mfiles.alphacoders.com/876/876224.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Explosion</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card animate__animated animate__backInDown">
                <img src="https://mfiles.alphacoders.com/862/862833.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">On The Sky</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card animate__animated animate__backInRight">
                <img src="https://mfiles.alphacoders.com/862/862774.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Lake</h5>
                    <p class="card-text">Some quick example text to build on the
                        card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!---------------------------------------------CARD------------------------------------------->
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

</body>

</html>