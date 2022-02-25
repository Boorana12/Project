<?php
session_start();
if (isset($_SESSION["userID"])) {
} else {
    header("Location: logout.php");
}
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="ระบบหาสถานประกอบการสำหรับการฝึกประกอบการณ์ แผนกเทคโนโลยีสารสนเทศ" name="description">
    <meta content="แผนกเทคโนโลยีสารสนเทศ" name="author">
    <meta name="keywords" content="ระบบหาสถานประกอบการ ฝึกประกอบการณ์ แผนกเทคโนโลยีสารสนเทศ www.cmtc.ac.th" />

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

    <!-- Title -->
    <title>ระบบหาสถานประกอบการสำหรับการฝึกประกอบการณ์ วิทยาลัยเทคนิคเชียงใหม่</title>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Dashboard css -->
    <link href="../assets/css/style.css" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- Sidemenu css -->
    <link href="../assets/plugins/toggle-sidebar/full-sidemenu.css" rel="stylesheet" />

    <!--Daterangepicker css-->
    <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Rightsidebar css -->
    <link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- Sidebar Accordions css -->
    <link href="../assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="../assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- Morris  Charts css-->
    <link href="../assets/plugins/morris/morris.css" rel="stylesheet" />

    <!---Font icons css-->
    <link href="../assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="../assets/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">

    <!---Sweetalert Css-->
    <link href="../assets/plugins/sweet-alert/jquery.sweet-modal.min.css" rel="stylesheet" />
    <link href="../assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />

    <style>
        body,
        h2,
        h1,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Prompt', sans-serif;
        }

        .right-border {
            border-right: 3px solid rgba(0, 0, 0, 0.25);
        }

        .img-push-bottom {
            margin-bottom: 30px;
        }

        @media (max-width: 575px) {
            .right-border {
                border: 0px solid !important;
            }

            .img-push-bottom {
                margin-bottom: 20px;
            }

            .img-text-center {
                text-align: center;
            }
        }
    </style>


    <!-- Nvd3 Charts css-->
    <link href="../assets/plugins/charts-nvd3/nv.d3.css" rel="stylesheet" />

    <!-- Data table css -->
    <link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="app sidebar-mini rtl">

    <!--Global-Loader-->
    <div id="global-loader">
        <img src="../assets/images/icons/loader.svg" alt="loader">
    </div>

    <div class="page">
        <div class="page-main">

            <!--app-header-->
            <div class="app-header header d-flex">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a class="header-brand" href="http://it.cmtc.ac.th/">
                            <img src="../assets/images/brand/cmtc-logo.png" class="header-brand-img main-logo" alt="Hogo logo">
                            <img src="../assets/images/brand/cmtc-icon.png" class="header-brand-img icon-logo" alt="Hogo logo">
                        </a><!-- logo-->
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                        <div class="d-flex order-lg-2 ml-auto header-rightmenu">
                            <div class="dropdown">
                                <a class="nav-link icon full-screen-link" id="fullscreen-button">
                                    <i class="fe fe-maximize-2"></i>
                                </a>
                            </div><!-- full-screen -->
                        </div>
                    </div>
                </div>
            </div>
            <!--app-header end-->