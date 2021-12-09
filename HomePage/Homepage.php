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
    <section id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Sunset</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum
                                similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi
                                dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
                            <a href="" class="btn btn-outline-success btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1516214104703-d870798883c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Sunset</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum
                                similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi
                                dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
                            <a href="" class="btn btn-outline-success btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Sunset</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum
                                similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi
                                dolorum in pariatur. Incidunt repellendus praesentium quae!</p>
                            <a href="" class="btn btn-outline-success btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------------------------------CARD------------------------------------------->



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