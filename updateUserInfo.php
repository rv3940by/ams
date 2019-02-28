<?php

    $link = mysqli_connect("localhost","root","","alumni") or die("Error ".mysqli_error($link));
    if (isset($_POST['ID'])) {

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
        if ($fileExistsFlag == 0 ) {
            $target = "img/user/";
            $fileTarget = $target . $fileName;
            $tempFileName = $_FILES["user_image"]["tmp_name"];

            $update_id = mysqli_real_escape_string($link, $_POST['ID']);
            $user_image = mysqli_real_escape_string($link, $_POST['user_image']);
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

            $result = move_uploaded_file($tempFileName, $fileTarget);
            /*
            *	If file was successfully uploaded in the destination folder
            */
            if ($result) {
                echo "Your file <html><b><i>" . $fileName . "</i></b></html> has been successfully uploaded";
                $query = "UPDATE alumni
            SET  id = '$update_id',
                user_image = '$fileName',
                first_name = '$first_name',
                last_name = '$last_name',
                phone = '$phone',
                phone_type = '$phone_type',
                email = '$email',
                address1 = '$address1',
                address2 = '$address2',
                city = '$city',
                state = '$state',
                zipcode = '$zipcode'
    
              WHERE id = '$update_id'";

                $link->query($query) or die("Error : " . mysqli_error($link));
                header('location: alumni.php?UserUpdated=Success');
            } else {
                echo "Sorry !!! There was an error in uploading your file";
            }
            mysqli_close($link);
        } /*
    * 	If file is already present in the destination folder
    */
        else {
            $update_id = mysqli_real_escape_string($link, $_POST['ID']);
            $user_image = mysqli_real_escape_string($link, $_POST['user_image']);
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

            $query = "UPDATE alumni
            SET  id = '$update_id',
                first_name = '$first_name',
                last_name = '$last_name',
                phone = '$phone',
                phone_type = '$phone_type',
                email = '$email',
                address1 = '$address1',
                address2 = '$address2',
                city = '$city',
                state = '$state',
                zipcode = '$zipcode'
    
              WHERE id = '$update_id'";

            $link->query($query) or die("Error : " . mysqli_error($link));
            header('location: alumni.php?UserUpdated=Success');


            //echo "File <html><b><i>" . $fileName . "</i></b></html> already exists in your folder. Please rename the file and try again.";
            mysqli_close($link);
        }
    }

?>