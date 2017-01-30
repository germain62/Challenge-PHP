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
$change=$_POST['id'];

$arrayQuery = array();
if ($name) {
    array_push($arrayQuery, "pseudo='$name'");
}
if ($photoprofil) {
    array_push($arrayQuery, "image='$photoprofil'");
}
if ($prenom) {
    array_push($arrayQuery, "prenom='$prenom'");
}
if ($jeux) {
    array_push($arrayQuery, "jeux='$jeux'");
}
if ($mail) {
    array_push($arrayQuery, "mail='$mail'");
}
if ($naissance) {
    array_push($arrayQuery, "naissance='$naissance'");
}
$arrayQuery = implode(', ', $arrayQuery);
if ($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/gif') {
    $res1 = move_uploaded_file($_FILES['userfile']['tmp_name'], '/var/www/html/Challenge/img/'.$_FILES['userfile']['name']);
}

 if (count($arrayQuery) != 0) {
     $res1 = mysqli_query($cnx, "UPDATE repertoire SET $arrayQuery WHERE id='$change'");
 }


header('location:admin.php');




?>
