<?php
include_once("connexion.php");
$res=mysqli_query($cnx ,"SELECT * FROM custom ORDER BY id DESC LIMIT 1");
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
