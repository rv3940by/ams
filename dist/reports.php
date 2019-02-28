<?php
require 'bin/functions.php';
require 'db_configuration.php';
session_start();

$query = "SELECT *
	             FROM alumni";

$GLOBALS['alumni'] = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Alumni Management System</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" type="text/css" href="css/animation.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
<body>
<header id="header" id="home">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                    <ul>
                        <li><font style="color: white; font-size: 14px;">Metropolitan State University</font>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                    <font style="color: white; font-size: 14px;">ICS325 Internet Application Development</font>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.php"><h3 style="color: white;"> Alumni Management System </h3></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="reports.php">Report</a></li>
                    <li>
                        <?php
                        if (isset($_SESSION['type'])) {
                            if ($_SESSION['type'] == 'Admin') {
                                echo ' <a href="alumni_report.php">Alumni Report</a> ';
                            } else {
                                echo '';
                            }
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['type'])) {
                            echo '<a href="alumni.php">Alumni</a>';
                        } else {
                            echo '';
                        }
                        ?>
                    </li>
                    <!-- <li><a href="loginForm-1.php">Log In</a></li> -->
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['type'])) {
                            echo '<a class="nav-link" href="logoutPage.php">Logout</a>';
                        }//end if
                        else {
                            echo '<a class="nav-link" href="loginPage.php">Login/SignUp</a>';
                        }//end else
                        ?>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->

<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Report
                </h1>
                <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="reports.php"> Report </a></p>
            </div>
        </div>
    </div>

</section>
<!-- End banner Area -->

<br>

<div class="container">
    <div class="col-lg-10 offset-lg-1 form-group">
        <?php include 'bin/googleCharts.php'; ?>
        <!-- Page Heading -->
        <div id="publisher_piechart_3d" style="width: 900px; height: 400px;"></div>
        <div id="author_piechart_3d" style="width: 900px; height: 400px;"></div>
        <div id="columnchart" style="width: 900px; height: 400px;"></div>
    </div>
</div>

<!-- start footer Area -->
<footer class="footer-area ">
    <div class="container">
        <div class="footer-bottom row align-items-center justify-content-between">
            <p class="footer-text m-0 col-lg-10 col-md-5" style="text-align: center; color: white;">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                | Leng Yang | Cheng Lee | Kennedy Omweri |
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->


<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.tabs.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>
</body>
</html>
