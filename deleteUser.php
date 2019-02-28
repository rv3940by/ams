<?php
/* DELETING BOTH USER FROM ALUMNI AND USERS TABLE */
include_once 'db_configuration.php';

if (isset($_GET['email'])){

  $delete_email = $_GET['email'];

  $sql = "DELETE FROM alumni
          WHERE email = '$delete_email'";
  $sqlEmail = "DELETE FROM users
  		  WHERE email = '$delete_email'";

  mysqli_query($db, $sql);
  mysqli_query($db, $sqlEmail);
  header('location: alumni.php?DeleteCeremony=Success');

}//end if
?>
