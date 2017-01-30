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
				border: 1px solid grey;
				padding : 3px 10px;
			}
			th{
				border: 1px solid black;
				background-color: red;
				color:white;
			}
      #scrollTop{
        z-index: 1;
          position: fixed;
      	bottom: 20%;
      	right: 5%;
      }

</style>
<body>


    <!-- Navigation -->
    <?php

    if($data['fixed']== 1){
      echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
    }
    else{
      echo '<nav class="navbar navbar-inverse" role="navigation" style="margin-top:-50px;">';
    }
    ?>
        <div class="container">
            <!-- Left -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Start Bootstrap</a>
            </div>
            <!-- Right -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="repertory.php">Repertory</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                      <?php
                      $_SESSION['log'] = isset($_SESSION['log'])?$_SESSION['log']: "";

                      if($_SESSION['log']=== true){
                        echo"<a href='admin.php'>Admin</a>
                        </li>
                        <li>
                        <a href='adminLogout.php'>Deco</a>
                        </li>";
                      }
                      else{
                        echo"<a href='login.php'>Connexion</a>";
                      }


                      ?>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <button id="scrollTop">Go Top</button>
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Repertory</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- Friends Row -->
        <div class="row">
        <?php

        $res1 = mysqli_query($cnx,"SELECT image , prenom , pseudo , naissance ,jeux FROM repertoire WHERE valide=1 ");
        $data1 = mysqli_fetch_assoc($res1);

        mysqli_data_seek($res1 ,0);
         while ($data1 = mysqli_fetch_assoc($res1)) {




            echo "<div class='col-md-4 img-portfolio'>
                <img class='img-responsive img-hover' src='../img/".$data1['image']."' alt='' '>
                <h3>".$data1['prenom']."</h3>
                <p>22 ans <span>".$data1['naissance']."</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class='table table-striped  table-hover'>
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>".$data1['jeux']."</td>
                        <td>".$data1['pseudo']."</td>
                    </tr>
                </table>
            </div>";}

 ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; SimplonBSM 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
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


</body>

</php>
