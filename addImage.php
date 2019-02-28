<?php
    include_once 'db_configuration.php';
    session_start();
    // REFERENCES SOURCE: https://www.codexworld.com/upload-multiple-images-store-in-database-php-mysql/
    if ( isset($_POST['submit']) ){
        $alumni_id = mysqli_real_escape_string($db, $_POST['alumni_id']);
//        $image = mysqli_real_escape_string($db, $_POST['image']);
//
//        $sql = "INSERT INTO images (alumni_id, image)
//          VALUES('$alumni_id','$image' );";

        // File upload configuration
        $targetDir = "img/gallery/";
        $allowTypes = array('jpg','png','jpeg','gif');

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        if(!empty(array_filter($_FILES['files']['name']))){
            foreach($_FILES['files']['name'] as $key=>$val){
                // File upload path
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                        // Image db insert sql
                        $insertValuesSQL .= "('".$alumni_id."', '".$fileName."', NOW()),";
                    }else{
                        $errorUpload .= $_FILES['files']['name'][$key].', ';
                    }
                }else{
                    $errorUploadType .= $_FILES['files']['name'][$key].', ';
                }
            }

            if(!empty($insertValuesSQL)){
                $insertValuesSQL = trim($insertValuesSQL,',');
                // Insert image file name into database
                $insert = $db->query("INSERT INTO images (alumni_id, file_name, uploaded_on) VALUES $insertValuesSQL ");
                if($insert){
                    $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                    $statusMsg = "Files are uploaded successfully.".$errorMsg;
                    header('location: index.php?Upload=Successful');
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                    header('location: index.php?Upload=Fail');
                }
            }

        }else{
            $statusMsg = 'Please select a file to upload.';
        }

        // Display status message
        echo $statusMsg;
    }

//        mysqli_query($db, $sql);
//        header('location: index.php?ImageUpload=Success');
    else{
        header('location: index.php?Fail');
    }//end if
?>