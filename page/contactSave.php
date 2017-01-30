<?php

include_once 'connexion.php';

$res1 = mysqli_query($cnx, 'SELECT * FROM repertoire ');

$name = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$jeux = isset($_POST['jeux']) ? $_POST['jeux'] : '';
$naissance = isset($_POST['naissance']) ? $_POST['naissance'] : '';
$mail = isset($_POST['email']) ? $_POST['email'] : '';
$valide=0;

$dir = $_SERVER['DOCUMENT_ROOT'].'/Challenge/img';
$filelist = scandir($dir);
array_splice($filelist, 0, 2);

$photoprofil = $_FILES['userfile']['name'];
$photoprofil= explode('.',$photoprofil);
$rand=(int)rand(0,1000);
$photoprofil=($photoprofil[0].$rand.'.'.$photoprofil[1]);
$type = $_FILES['userfile']['type'];

$verifpseudo = '#[A-Za-z]#';
$verifprenom = '#[^0-9]#';
$verifnaissance = '#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#';

if (preg_match($verifpseudo, $name)) {
    $name = $name;
} else {
    $name = '';
}

if (preg_match($verifprenom, $prenom)) {
    $prenom = $prenom;
} else {
    $prenom = '';
}

if (preg_match($verifnaissance, $naissance)) {
    $naissance = $naissance;
} else {
    $naissance = '';
}

// $res1 = mysqli_query($cnx,"INSERT INTO repertoire(pseudo,image,prenom,mail,jeux,naissance) VALUES ('$name' ,'$photoprofil', '$prenom' , '$mail' , '$jeux' , '$naissance')");
//  echo "INSERT = " .(int)$res1;

// $res = move_uploaded_file($_FILES['userfile']['tmp_name'], "/var/www/html/Challenge/img".$_FILES['userfile']['name']);

if ($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/gif') {
    $res1 = move_uploaded_file($_FILES['userfile']['tmp_name'], '/var/www/html/Challenge/img/'.$photoprofil);
    if ($name != '' && $prenom != '' && $jeux != '' && $naissance != '' && $mail != '' && $photoprofil != '') {
        $res1 = mysqli_query($cnx, "INSERT INTO repertoire(pseudo,image,prenom,mail,jeux,naissance,valide) VALUES ('$name' ,'$photoprofil', '$prenom' , '$mail' , '$jeux' , '$naissance' , '$valide')");
        echo 'INSERT = '.(int) $res1;
    }
} else {
    $res1 = 0;
}
header('location:admin.php');
