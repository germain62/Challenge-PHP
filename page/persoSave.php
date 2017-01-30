<?php


include_once ('connexion.php');


$color = isset($_POST['color'])?$_POST['color']: "";
$nav = isset($_POST['nav'])?$_POST['nav']: "";
$url=isset($_POST['url'])?$_POST['url']: "";
$button=isset($_POST['button'])?$_POST['button']: "";
$font = isset($_POST['font'])? $_POST['font'] : "";

$fixed = isset($_POST['checkbox1']);
$neige = isset($_POST['neige']);

$resLast=mysqli_query($cnx, 'SELECT * FROM custom ORDER BY id DESC LIMIT 1');
$dataLast = mysqli_fetch_assoc($resLast);
$resLast=mysqli_query($cnx ,"INSERT INTO custom(title,navbar,url,button,font,fixed,neige)
                             VALUE ('".$dataLast['title']."', '".$dataLast['navbar']."', '".$dataLast['url']."',
                             '".$dataLast['button']."', '".$dataLast['font']."', ".$dataLast['fixed'].",
                             ".$dataLast['neige'].")");

$neige=(int)$neige;
$res=mysqli_query($cnx ,"UPDATE custom  SET neige='$neige' WHERE id=LAST_INSERT_ID()");
$fixed =(int)$fixed;
$res=mysqli_query($cnx ,"UPDATE custom  SET fixed='$fixed' WHERE id=LAST_INSERT_ID()");





if($color != ""){
  $res=mysqli_query($cnx ,"UPDATE custom  SET title='$color' WHERE id=LAST_INSERT_ID()");
}
if($nav !=""){
  $res=mysqli_query($cnx ,"UPDATE custom  SET navbar='$nav' WHERE id=LAST_INSERT_ID()");
}
if($url !=""){
  $res=mysqli_query($cnx ,"UPDATE custom  SET url='$url' WHERE id=LAST_INSERT_ID()");
}
if($button !=""){
  $res=mysqli_query($cnx ,"UPDATE custom  SET button='$button' WHERE id=LAST_INSERT_ID()");
}
if($font !=""){
  $res=mysqli_query($cnx ,"UPDATE custom  SET font='$font' WHERE id=LAST_INSERT_ID()");
}



header('location:../index.php');

?>
