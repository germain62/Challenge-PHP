
<?php
session_start();
include_once('connexion.php');
$res=mysqli_query($cnx ,"SELECT * FROM custom ORDER BY id DESC LIMIT 1");
$data=mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Challenge PHP de </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=<?php echo $data['font'] ;?>');



h1 , h2 ,h3,h4{
  color:<?php echo $data['title'] ; ?>;
  font-family: <?php echo $data['font'] ;?>;
}
.navbar-inverse{
  background-color:<?php echo $data['navbar'] ; ?>;
}
a{
  color:<?php echo $data['url'] ; ?>!important;
}
.btn{
  background-color: <?php echo $data['button'] ;?>;
}
button{
  background-color: <?php echo $data['button'] ;?>;
  color:<?php echo $data['url'] ; ?>!important;
}
table{
				border: 1px solid black;
				border-collapse: collapse;
				margin:auto;
			}
			td{
				border: 1px solid black;
				padding : 3px 10px;
        background-color: red;
				color:white;
        text-align: center;
			}
      td a{
        color:white !important;
      }
			th{
				border: 1px solid black;
				background-color: red;
				color:white;
        text-align: center;
			}
      img{
        height:100px;
        width: 100px;
      }
      input , label{
        color:red;
      }
      #scrollTop{
        z-index: 1;
          position: fixed;
      	bottom: 20%;
      	right: 4%;
      }


</style>
<body>







<?php

// include_once("connexion.php");
include_once("utils.php");
include_once("nav.php");
echo'<h1 class="text-center">ESPACE ADMINISTRATION</h1>';
include_once("perso.php");



?>
<button id="scrollTop">Go Top</button>
<table>
      <?php

      $res1 = mysqli_query($cnx,"SELECT * FROM repertoire ");
      $data1 = mysqli_fetch_assoc($res1);
      // var_dump($data1);








        echo'<tr>';

      foreach ($data1 as $key=>$value){
        echo'<th>'.$key.'</th>';
      }
      echo'<th>supprimer</th>';
      echo'<th>valide</th>';
      echo'<th>modifier</th>';


      echo'</tr>';


      mysqli_data_seek($res1,0);
      while($data1 = mysqli_fetch_assoc($res1)){

        echo '<tr>';

        foreach ($data1 as $key => $value) {
          if($key == 'image'){
            echo'<td><img class="img-responsive" src="../img/'.$value.'"></td>';
          }
          else{
          echo '<td>'.$value.'</td>';
        }

      }
      echo'<td><form action="delete.php" method="POST">
      <input type="hidden" name="id" value="'.($data1['id']).'">
      <label style="color:white;">cocher si vous êtes sur</label>
      <input type="checkbox" name="delete"><br>
      <input type="submit" name="delete" value="supprimer">
      </form>
      </td>';
      echo'<td>
        <a href="validate.php?valid='.$data1['id'].'">valide</a>
        </td>';
      echo'<td><a href="modif.php?modif='.$data1['id'].'">modif</a></td>';



        echo '</tr>';
      }




    ?>

  </table>
  <h1 class="text-center">HISTORIQUE DES CHANGEMENTS DE STYLES</h1>
<div class="col-md-12 text-center">
  <table class="text-center">
        <?php

        $res1 = mysqli_query($cnx,"SELECT * FROM custom ");
        $data1 = mysqli_fetch_assoc($res1);
        // var_dump($data1);








          echo'<tr>';

        foreach ($data1 as $key=>$value){
          echo'<th>'.$key.'</th>';
        }
        echo'<th>supprimer</th>';
        echo'<th>valide</th>';
        echo'<th>modifier</th>';


        echo'</tr>';


        mysqli_data_seek($res1,0);
        while($data1 = mysqli_fetch_assoc($res1)){

          echo '<tr>';

          foreach ($data1 as $key => $value) {
            if($key == 'image'){
              echo'<td><img class="img-responsive" src="../img/'.$value.'"></td>';
            }
            else{
            echo '<td>'.$value.'</td>';
          }

        }
        echo'<td><form action="delete.php" method="POST">
        <input type="hidden" name="id" value="'.($data1['id']).'">
        <label style="color:white;">cocher si vous êtes sur</label>
        <input type="checkbox" name="delete"><br>
        <input type="submit" name="delete" value="supprimer">
        </form>
        </td>';
        echo'<td>
          <a href="validate.php?valid='.$data1['id'].'">valide</a>
          </td>';
        echo'<td><a href="modif.php?modif='.$data1['id'].'">modif</a></td>';



          echo '</tr>';
        }




      ?>
    </table>
  </div>



<script src="../js/challenge.js"></script>
  <script src="<?php $res=mysqli_query($cnx ,"SELECT * FROM custom  WHERE id=1 ");
  if($data['neige']== 1){
    echo '../js/snowstorm-min.js';
  }
  else{
    echo '';
  }
  ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
</body>
</html>
