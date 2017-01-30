<?php


include_once ('connexion.php');


$color = isset($_POST['color'])?$_POST['color']: "";
$nav = isset($_POST['nav'])?$_POST['nav']: "";
$url=isset($_POST['url'])?$_POST['url']: "";
$button=isset($_POST['button'])?$_POST['button']: "";
$font = isset($_POST['font'])? $_POST['font'] : "";









if($color != ""){
  $res=mysqli_query($cnx ,"INSERT INTO histo(title) VALUE ('$color')";
}
if($nav !=""){
  $res=mysqli_query($cnx ,"INSERT INTO histo(navbar) VALUE ('$nav')");
}
if($url !=""){
  $res=mysqli_query($cnx ,"INSERT INTO histo(url)  VALUE('$url')  ");
}
if($button !=""){
  $res=mysqli_query($cnx ,"INSERT INTO histo(button) VALUE('$button')  ");
}
if($font !=""){
  $res=mysqli_query($cnx ,"INSERT INTO histo(font)  VALUE('$font')  ");
}
$data=mysqli_fetch_assoc($res);
var_dump($res);

// header('location:../index.php');

?>
