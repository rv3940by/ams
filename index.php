<?php
// Check if user is logged in using the session variable
require 'bin/functions.php';
require 'db_configuration.php';
include 'bin/carouselFunction.php';
session_start();
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
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="css/animation.css"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/publishersdb.css" rel="stylesheet">

    <!-- CSS FOR UPLOADING MULTIPLE IMAGES FORM -->
    <link rel="stylesheet" href="css/mutipleImage/style.css">

    <!-- CSS FOR UPLOADIMAGE BUTTON -->
    <link rel="stylesheet" href="css/buttons/uploadImageButton.css">

    <!-- Include JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/multipleImage/script.js"></script>

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
                    <?php
                    if (isset($_SESSION['type'])) {
                        echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                    } else {
                        echo 'HOME';
                    }
                    ?>
                </h1>
            </div>
        </div>
    </div>

</section>
<!-- End banner Area -->

<!-- HIDE AND SHOW UPLOAD IMAGE BUTTON -->
<?php
if (isset($_SESSION['type'])) {
    echo '<div class="my-4">
                      <!-- Admin Maintenance Mode -->
                      <!-- Page Heading -->
                      <h1 class="my-4" style="text-align: center;">';
    ?>
    <?php
    //Display Admin view if an admin is logged in.
    //This gives full access to all CRUD functions

    if (isset($_SESSION['type'])) {
        if ($_SESSION['type'] == 'Admin' || $_SESSION['type'] == 'Customer') {
            ?>
            <style type="text/css">#adminTableview {
                    display: block;
                }
            </style>
            <style type="text/css">#customerTableView {
                    display: none;
                }
            </style>
            <style type="text/css">#selector {
                    display: none;
                }
            </style>
            <?php
        }//end if
    }//end if
    ?>
    <?php echo ' </h1>
                  </div>'; ?>
<?php } ?>

<!-- UPLOAD IMAGE BUTTON AND FORM TO UPLOAD IMAGES THE CAROUSEL -->
<div id="adminTableView" class="col-12 text-center">
    <div class="input-group">
                           <span class="col-12 text-center">
                                   <button id="uploadImageButton" onclick="displayBookFields('bookFields');"
                                           type="button" class="btn btn-outline-secondary btn-sm">
                                       <h4><font id="fontUploadImage">Upload Image</font></h4>
                                   </button>
                           </span><br><br>
        <div id="bookFields">
            <?php
            /* CHECK IF THE LOGIN USER IS AN ADMIN OR CUSTOMER */
            if ($_SESSION['type'] == 'Admin' || $_SESSION['type'] == 'Customer') {
                if ($tableResults->num_rows > 0) {
                    while ($row = $customerTableResults->fetch_assoc()) {
                        if ($row['first_name'] == $_SESSION['first_name']) {
                            echo '<div id="maindiv">
                                                                <div id="formdiv" class="col-lg-12 offset-lg-3 form-group">
                                                                    <h2>Multiple Image Upload Form</h2>
                                                                    <form enctype="multipart/form-data" action="addImage.php" method="post">
                                                                        First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB.
                                                                        <hr/>';
                            if ($_SESSION['type'] == 'Admin') {
                                echo ' Alumni ID <input type="text" name="alumni_id" maxlength="10" value="' . $row["id"] . '" readonly/><br><br> ';
                            } else {
                                echo ' <font style="display: none;"> Alumni ID</font> <input style="display: none;" type="text" name="alumni_id" maxlength="10" value="' . $row["id"] . '" readonly/><br><br> ';
                            }
                            echo '<div id="filediv"><input name="files[]" class="col-lg-8 offset-lg-2 form-group" type="file" id="file"/></div><br/>
                                                               
                                                                        <input type="button" id="add_more" class="upload_AddMore" value="Add More Files"/>
                                                                        <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                                                                    </form>
                                                                    <br/>
                                                                    <br/>
                                                                </div>
                                                                
                                                            </div>';
                        }
                    }
                }//end if
                else {
                    echo "0 results";
                }//end else
            } else {
                echo "";
            }
            ?>
        </div>
    </div>
    <br>
</div>

<!-- THIS IS WHERE THE GREETING AND CAROUSEL START-->
<div class="col-lg-12" id="Spin">
    <h2 style="text-shadow: 1px 2px 1px gray; font-weight: bold; text-align: center;">Welcome to Alumni Management
        System !</h2>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        echo make_slide_indicators($db);
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <?php
        echo make_slides($db);
        ?>

    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- END OF CAROUSEL -->

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

<!-- JavaScript -->
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
