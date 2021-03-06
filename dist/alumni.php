<?php
   require 'bin/functions.php';
   require 'db_configuration.php';
   session_start();

  $query = "SELECT *
             FROM alumni";

             $GLOBALS['publisher'] = mysqli_query($db, $query);
  $query = "SELECT *
               FROM alumni";

               $GLOBALS['tableResults'] = mysqli_query($db, $query);
               $GLOBALS['customerTableResults'] = mysqli_query($db, $query);
               $GLOBALS['gridResults'] = mysqli_query($db, $query);

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
			<!-- CSS ============================================= -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
            <link rel="stylesheet" href="css/linearicons.css">
            <link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
			<!-- Bootstrap core CSS -->
      		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		    <!-- Custom styles for this template -->
		    <link href="css/publishersdb.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

            <!-- INCLUDE SCRIPTS HERE -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		</head>

		<body onload="displayAdminFields('admin1')">
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
                                if (isset($_SESSION['type'])){
                                    if ($_SESSION['type'] == 'Admin'){
                                        echo ' <a href="alumni_report.php">Alumni Report</a> ';
                                    }else{
                                        echo '';
                                    }
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['type'])){
                                    echo '<a href="alumni.php">Alumni</a>';
                                }else{
                                    echo '';
                                }
                                ?>
                            </li>
                            <!-- <li><a href="loginForm-1.php">Log In</a></li> -->
                            <li class="nav-item">
                                <?php
                                if (isset($_SESSION['type'])){
                                    echo '<a class="nav-link" href="logoutPage.php">Logout</a>';
                                }//end if
                                else{
                                    echo '<a class="nav-link" href="loginPage.php">Login/SignUp</a>';
                                }//end else
                                ?>
                            </li>
                        </ul>
                    </nav><!-- #nav-menu-container -->
		    </div>
		  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Alumni
							</h1>
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="alumni.php"> Alumni</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start Table-page Area -->
	      	<section class="contact-page-area section-gap">
				<div id="example_wrapper" class="dataTables_wrapper">
					<div class="my-4">
						<!-- Admin Maintenance Mode -->
							<!-- Page Heading -->
					        <h1 class="my-4" style="text-align: center; text-decoration: underline;">
					            <?php
					                //Display Admin view if an admin is logged in.
					                //This gives full access to all CRUD functions
					                  
					                    if (isset($_SESSION['type'])){
					                    	if ($_SESSION['type'] == 'Admin'){
					                    		echo ' Admin Maintenance Mode';
					                    	
					            ?>
					            <style type="text/css">#adminTableview{
					              	display:block;
					            	}
					            </style>
					            <style type="text/css">#customerTableView{
					                display:none;
					                }
					            </style>
					            <style type="text/css">#selector{
					                display:none;
					                }
					            </style>
					            <?php
					               }//end if
					               }//end if
					               ?>
					         </h1>
					</div>
                    <!-- LOGIN AS AN ADMIN WILL SEE THIS VIEW -->
					<div id="adminTableView">
						<div class="input-group"> 
		           	 		<td>
		           	 			<a class="btn btn-danger btn-sm" href="sign-up1.php" style="background-color: #aa80ff; border: none; color: white; padding: 15px; box-shadow: 5px 5px 10px black;">
		           	 				Register Alumni
		           	 			</a>
		           	 		</td>  
		        		</div>

				        <br>

				        <table id="admin_data" class="table table-bordered table-striped">
				          <thead>
				            <tr>
				              <th>First Name</th>
				              <th>Last Name</th>
				              <th>Phone</th>
				              <th>Phone Type</th>
				              <th>Email</th>
				              <th>Address 1</th>
				              <th>Address 2</th>
				              <th>City</th>
				              <th>State</th>
				              <th>Zip Code</th>
				              <th>Modify Alumni Info</th>
				            </tr>

				          </thead>

				          <tbody>
				            <?php
				              if ($tableResults->num_rows > 0) {
				              // output data of each row
				                while($row = $tableResults->fetch_assoc()) {

				                  echo '<tr>
				                            <td> '.$row["first_name"].'</td>
				                            <td> '.$row["last_name"]. '</td>
				                            <td> '.$row["phone"]. '</td>
				                            <td> '.$row["phone_type"]. '</td>
				                            <td> '.$row["email"]. '</td>
				                            <td> '.$row["address1"]. '</td>
				                            <td> '.$row["address2"]. '</td>
				                            <td> '.$row["city"]. '</td>
				                            <td> '.$row["state"]. '</td>
				                            <td> '.$row["zipcode"]. '</td>
				                            <td>
                                                <a style="background: green; border: none;" class="btn btn-danger btn-sm" href="viewUser.php?id='.$row["id"].'">View</a>
                                                <a class="btn btn-danger btn-sm" href="deleteUser.php?email='.$row["email"].'">Delete</a>
                                                <a class="btn btn-warning btn-sm" href="updateForm.php?id='.$row["id"].'">Update</a>
				                            </td>
				                        </tr>';

				                }//end while
				              }//end if
				              else {
				                echo "0 results";
				              }//end else
				            ?>
				          </tbody>
				        </table>
                        <!-- JAVASCRIPT FOR THE EXPORTING, FILTERING, AND SEARCHING FOR ADMIN VIEW -->
                        <script>
                            <?php include 'js/dataTableJS/admin_view.js'; ?>
                        </script>
				    </div>
                    <!-- THIS IS THE END OF ADMIN VIEW -->

                    <!-- LOGIN AS A CUSTOMER WILL SEE THIS VIEW -->
				    <div id="customerTableView">
                        <div class="table-responsive">
                        <table id="customer_data" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Phone Type</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($customerTableResults->num_rows > 0) {
                                // output data of each row
                                while($row = $customerTableResults->fetch_assoc()) {

                                    echo '<tr>
				                                          <td> '.$row["first_name"].' </td>
								                          <td> '.$row["last_name"]. ' </td>
								                          <td> '.$row["phone"].' </td>
								                          <td> '.$row["phone_type"].' </td>
								                          <td> '.$row["email"].' ';

                                    // 	show the update button next to the user information only if the email use for the login is 	  //	the same as the email shown in the table
                                    if ( $_SESSION['email'] == $row["email"] ){
                                        echo '
								                                           <a style="background: green; border: none;" class="btn btn-danger btn-sm" href="viewUser.php?id='.$row["id"].'">View</a>
								                           					<a class="btn btn-warning btn-sm" href="updateForm.php?id='.$row["id"].'">Update</a>
								                           				</td>
								                           			</tr>
								                           		' ;
                                    }else{
                                        echo '</td> </tr>';
                                    }

                                }//end while
                            }//end if
                            else {
                                echo "0 results";
                            }//end else
                            ?>
                            </tbody>
                        </table>
                            <!-- JAVASCRIPT FOR THE EXPORTING, FILTERING, AND SEARCHING FOR CUSTOMER VIEW -->
                            <script type="text/javascript" language="javascript" >
                                <?php include 'js/dataTableJS/customer_View.js' ?>
                            </script>
                        </div>
                        <!-- THIS IS THE END OF CUSTOMER VIEW -->
		       		</div>
				</div>
			</section>
			<!-- End Table Area -->

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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
            <!-- JAVASCRIPT FOR DATATABLE -->
			<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
			<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
			<script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
		</body>
	</html>
