<?php
include_once("connexion.php");



  $numid = $_POST['id'];

  $delete = isset($_POST['delete'])? $_POST['delete'] : "";
  if($delete){
    $res = mysqli_query($cnx,"DELETE FROM repertoire WHERE id='$numid'");
  }
header('location:admin.php');

?>
