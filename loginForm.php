<?php
/* Main page with two forms: sign up and log in */
require 'db_configuration.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login Form</title>

  <?php include 'css/css.html'; ?>
    <style>
        <?php include 'css/avatar/avatarCSS.css'; ?>
        #imageUpload
        {
            display: none;
        }

        #profileImage
        {
            cursor: pointer;
        }
    </style>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>
<body>

  <div class="form">

      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">

         <div id="login">

          <h1>Welcome Back!</h1>

          <form action="loginForm.php" method="post" autocomplete="off">

            <div class="field-wrap">

            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <p class="forgot" style="display: none;"><a href="forgot.php">Forgot Password?</a></p>

          <button class="button button-block" name="login" />Log In</button>

          </form>

        </div>

        <div id="signup">
          <h1>Sign Up for Free</h1><br>


         <div class="col-lg-12">
              <form class="form-area contact-form text-right" action="addUser.php" method="post" enctype="multipart/form-data">
                <div class="row">

<!--                    <div class="container">-->
<!--                        <h1>jQuery Image Upload-->
<!--                            <small>with preview</small>-->
<!--                        </h1>-->
<!--                        <div class="avatar-upload">-->
<!--                            <div class="avatar-edit">-->
<!--                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />-->
<!--                                <label for="imageUpload"></label>-->
<!--                            </div>-->
<!--                            <div class="avatar-preview">-->
<!--                                <div id="imagePreview" style="background-image: url(img/user/user.jpg);">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-lg-9 offset-lg-1 form-group">
                        <label>Choose Your Profile Picture</label><br><br>
                    </div>

                    <div class="col-lg-10 offset-lg-1 form-group">
                        <input type="file" name="user_image" id="profile-img" />

                    </div>

                    <div class="col-lg-7 offset-lg-1 form-group">
                        <img src="img/user/user.jpg" id="profile-img-tag" width="150px" height="150"/>
                    </div>

                  <div class="col-lg-5 offset-lg-1 form-group">

                    <input name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="common-input mb-20 form-control" required="" type="email">

                    <input name="address2" placeholder="Address 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address 2'" class="common-input mb-20 form-control" type="text">

                    <input name="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="common-input mb-20 form-control" required="" type="text">

                  </div>
                  <div class="col-lg-5 form-group">
                    <input name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="phone_type" placeholder="Phone Type" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Type'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="address1" placeholder="Address 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address 1'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="zipcode" placeholder="Zipcode" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zipcode'" class="common-input mb-20 form-control" required="" type="text">

                    <input name="password_repeat" placeholder="Repeat Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repeat Password'" class="common-input mb-20 form-control" required="" type="text">

                  </div>

                  <div class="col-lg-12">
                    <div class="alert-msg" style="text-align: center;"></div>
                    <button class="genric-btn primary" style="float: right;">Submit</button>
                  </div>
                  
                </div>
              </form>
            </div>
      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/loginForm.js"></script>
      <script type="text/javascript">

          //  function to read the image URL
          function readURL(input) {

              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#profile-img-tag').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }
          // Change the display profile picture to the chosen URL image
          $("#profile-img").change(function(){
              readURL(this);
          });

      </script>

      <script> <?php include ' js/avatar/avatarJS.js '; ?> </script>

</body>
</html>
