<?php
include_once 'db_configuration.php';
session_start();

if (isset($_POST['first_name']) && isset($_POST['last_name'])
    && isset($_POST['phone']) && isset($_POST['phone_type'])) {

    $user_image = mysqli_real_escape_string($db, $_POST['user_image']);
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $phone_type = mysqli_real_escape_string($db, $_POST['phone_type']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address1 = mysqli_real_escape_string($db, $_POST['address1']);
    $address2 = mysqli_real_escape_string($db, $_POST['address2']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
    $password = $db->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $db->escape_string(md5(rand(0, 1000)));
    $password_repeat = $db->escape_string(password_hash($_POST['password_repeat'], PASSWORD_BCRYPT));


    $result = $db->query("SELECT * FROM alumni WHERE email='$email'");

    if ($result->num_rows > 0) { // User doesn't exist
        $_SESSION['message'] = "User with that email already exist!, Please try a new email.";
        header("location: sign-up1_error.php?AlumniAdded=EmailAlreadyExist");
    } else {
        $sql = "INSERT INTO alumni (user_image, first_name, last_name, phone, phone_type, email,
                                   address1, address2, city, state, zipcode, password,
                                   password_repeat)
                VALUES('$user_image','$first_name','$last_name','$phone','$phone_type','$email','$address1',
                       '$address2','$city','$state','$zipcode','$password','$password_repeat' );";

        $sql .= "INSERT INTO users (first_name, last_name, email, password, hash)
                VALUES('$first_name','$last_name','$email','$password','$hash' );";

        // Add user to the database
        if ($db->multi_query($sql)) {

            move_uploaded_file($_FILES['user_image']['tmp_name'], "img/user/" . $_FILES['user_image']['name']);

            $_SESSION['active'] = 0; //0 until user activates their account with verify.php
            $_SESSION['logged_in'] = true; // So we know the user has logged in
            $_SESSION['message'] =

                "Confirmation link has been sent to $email, please verify
                         your account by clicking on the link in the message!";

            header("location: alumni.php?RegisterAlumni=Success");

        } else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: sign-up1_error.php");
        }
    }

}//end if
?>