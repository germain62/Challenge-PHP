<?php
include_once("connexion.php");

$valid = $_GET['valid'];


if($valid){
  $res = mysqli_query($cnx,"UPDATE repertoire SET valide=1 WHERE id='$valid'");
}
header('location:admin.php');

?>
