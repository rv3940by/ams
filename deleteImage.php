    <?php
        include_once 'db_configuration.php';

        if (isset($GET_['id'])){
            $delete_image = $_GET['id'];

            $sqlImage = "DELETE FROM images WHERE id = '$delete_image'";

            mysqli_query($db, $sqlImage);
            header('location: index.php?DeleteImage=Success');
        }else{
            header('location: index.php?DeleteImage=Fail');
        }
    ?>