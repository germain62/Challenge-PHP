<?php
include('connexion.php');
echo"<form method='POST' action='adminCheck.php'>
  <input type='text' name='username' value='username' /><br>
  <input type='text' name='password' value='password' /><br>
  <input type='submit' name='login'value='login' />
</form>";

?>
