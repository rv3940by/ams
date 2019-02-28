<?php

$link = mysqli_connect("localhost","root","","alumni") or die("Error ".mysqli_error($link));
if (isset($_POST['first_name']) && isset($_POST['last_name'])
    && isset($_POST['phone']) && isset($_POST['phone_type'])) {

    $fileExistsFlag = 0;
    $fileName = $_FILES['user_image']['name'];
    /*
    *	Checking whether the file already exists in the destination folder
    */
    $query = "SELECT user_image FROM alumni WHERE user_image='$fileName'";
    $result = $link->query($query) or die("Error : " . mysqli_error($link));
    while ($row = mysqli_fetch_array($result)) {
        if ($row['user_image'] == $fileName) {
            $fileExistsFlag = 1;
        }
    }
    /*
    * 	If file is not present in the destination folder
    */
    if ($fileExistsFlag == 0) {
        $target = "img/user/";
        $fileTarget = $target . $fileName;
        $tempFileName = $_FILES["user_image"]["tmp_name"];

        $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $phone_type = mysqli_real_escape_string($link, $_POST['phone_type']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $address1 = mysqli_real_escape_string($link, $_POST['address1']);
        $address2 = mysqli_real_escape_string($link, $_POST['address2']);
        $city = mysqli_real_escape_string($link, $_POST['city']);
        $state = mysqli_real_escape_string($link, $_POST['state']);
        $zipcode = mysqli_real_escape_string($link, $_POST['zipcode']);
        $password = $link->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $link->escape_string( md5( rand(0,1000) ) );
        $password_repeat = $link->escape_string(password_hash($_POST['password_repeat'], PASSWORD_BCRYPT));

        $result = move_uploaded_file($tempFileName, $fileTarget);
        /*
        *	If file was successfully uploaded in the destination folder
        */
        if ($result) {
            echo "Your file <html><b><i>" . $fileName . "</i></b></html> has been successfully uploaded";

            $output = $link->query("SELECT * FROM alumni WHERE email='$email'");

            if ($output->num_rows > 0) { // User doesn't exist
                $_SESSION['message'] = "User with that email already exist!, Please try a new email.";
                header("location: sign-up1_error.php?AlumniAdded=EmailAlreadyExist");
            } else {
                $sql = "INSERT INTO alumni (user_image, first_name, last_name, phone, phone_type, email,
                                   address1, address2, city, state, zipcode, password,
                                   password_repeat)
                VALUES('$fileName','$first_name','$last_name','$phone','$phone_type','$email','$address1',
                       '$address2','$city','$state','$zipcode','$password','$password_repeat' );";

                $sql .= "INSERT INTO users (first_name, last_name, email, password, hash)
                VALUES('$first_name','$last_name','$email','$password','$hash' );";

                // Add user to the database
                if ($link->multi_query($sql)) {

                    move_uploaded_file($_FILES['user_image']['tmp_name'], "img/user/" . $_FILES['user_image']['name']);

                    $_SESSION['active'] = 0; //0 until user activates their account with verify.php
                    $_SESSION['logged_in'] = true; // So we know the user has logged in
                    $_SESSION['message'] =

                          " Login Successfully! ";


                    header("location: loginPage.php?LoginSuccessfully");

                } else {
                    $_SESSION['message'] = 'Registration failed!';
                    header("location: sign-up1_error.php");
                }
            }
        } else {
            echo "Sorry !!! There was an error in uploading your file";
        }
        mysqli_close($link);
    } /*
    * 	If file is already present in the destination folder
    */
    else {

        $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $phone_type = mysqli_real_escape_string($link, $_POST['phone_type']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $address1 = mysqli_real_escape_string($link, $_POST['address1']);
        $address2 = mysqli_real_escape_string($link, $_POST['address2']);
        $city = mysqli_real_escape_string($link, $_POST['city']);
        $state = mysqli_real_escape_string($link, $_POST['state']);
        $zipcode = mysqli_real_escape_string($link, $_POST['zipcode']);
        $password = $link->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $link->escape_string( md5( rand(0,1000) ) );
        $password_repeat = $link->escape_string(password_hash($_POST['password_repeat'], PASSWORD_BCRYPT));

        $output = $link->query("SELECT * FROM alumni WHERE email='$email'");

        if ($output->num_rows > 0) { // User doesn't exist
            $_SESSION['message'] = "User with that email already exist!, Please try a new email.";
            header("location: sign-up1_error.php?AlumniAdded=EmailAlreadyExist");
        } else {
            $sql = "INSERT INTO alumni (first_name, last_name, phone, phone_type, email,
                                   address1, address2, city, state, zipcode, password,
                                   password_repeat)
                VALUES('$first_name','$last_name','$phone','$phone_type','$email','$address1',
                       '$address2','$city','$state','$zipcode','$password','$password_repeat' );";

            $sql .= "INSERT INTO users (first_name, last_name, email, password, hash)
                VALUES('$first_name','$last_name','$email','$password','$hash' );";

            // Add user to the database
            if ($link->multi_query($sql)) {

                move_uploaded_file($_FILES['user_image']['tmp_name'], "img/user/" . $_FILES['user_image']['name']);

                $_SESSION['active'] = 0; //0 until user activates their account with verify.php
                $_SESSION['logged_in'] = true; // So we know the user has logged in
                $_SESSION['message'] =

                    " Login Successfully! ";

                header("location: loginPage.php");

            } else {
                $_SESSION['message'] = 'Registration failed!';
                header("location: sign-up1_error.php");
            }

            $link->query($query) or die("Error : " . mysqli_error($link));
            header('location: loginPage.php?UserUpdated=Success');


            //echo "File <html><b><i>" . $fileName . "</i></b></html> already exists in your folder. Please rename the file and try again.";
            mysqli_close($link);
        }
    }
}

?>