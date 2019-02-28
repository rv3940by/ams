<?php
session_start();
require 'db_configuration.php';

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
    <title>View Alumni Information</title>

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
                    View Alumni Information
                </h1>
                <p class="text-white link-nav"><a href="alumni.php">Alumni </a> <span
                            class="lnr lnr-arrow-right"></span> <a href="viewUser.php"> View Alumni Information</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <?php
                include_once 'db_configuration.php';

                if (isset($_GET['id'])) {

                    $update_id = $_GET['id'];

                    $sql = "SELECT * FROM alumni
							            WHERE id = '$update_id'";

                    if (!$result = $db->query($sql)) {
                        die ('There was an error running query[' . $connection->error . ']');
                    }//end if
                }//end if

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        /*############## DISPLAY USER INFORMATION ###############*/
                        echo '
                                            <div class="jumbotron">
                                              <div class="row">
                                                  <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">';

                        if ($row['user_image'] == "") {
                            echo ' <img src="img/user/user.jpg"  width="300" height="300" alt="stack photo" class="img"> ';
                        } else {
                            echo ' <img src="img/user/' . $row['user_image'] . '" width="300" height="300" alt="stack photo" class="img"> ';
                        }

                        echo '</div>
                                                  <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                                                      <div class="container" style="border-bottom:1px solid black">
                                                          <h2>' . $row["first_name"] . '  ' . $row["last_name"] . ' </h2>
                                                      </div>
                                                      <hr>
                                                      <ul class="container details">
                                                          <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>(' . $row["phone_type"] . ') ' . $row["phone"] . '</p></li>
                                                          <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>' . $row["email"] . '</p></li>
                                                          <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>' . $row["address1"] . '</p></li>
                                                          <li><p><span class="glyphicon glyphicon" style="width:50px;"></span>' . $row["zipcode"] . ' ' . $row["city"] . ' ' . $row["state"] . '</p></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div>';

                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else

                ?>

            </div>
        </div>
    </div>
</section>

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
<script src="js/main.js"></script>
</body>
</html>
