<?php
include_once("connexion.php");
$res=mysqli_query($cnx ,"SELECT * FROM custom ORDER BY id DESC LIMIT 1");
$data=mysqli_fetch_assoc($res);



echo "<form action='persoSave.php' method='POST'>
<label for='color'>couleur titre:</label>
<input name='color' type='text' /><br>

<label for='nav'>couleur nav:</label>
<input name='nav' type='text' /><br>

<label for='url'>couleur url:</label>
<input name='url' type='text' /><br>

<label for='button'>couleur boutton:</label>
<input name='button' type='text' /><br>
<label>Choissisez votre police</label>
<select name='font'/>
			<option value='Lemonada'>Lemonada</option>
			<option value='Pacifico'>Pacifico</option>
			<option value='Satisfy'>Satisfy</option>
		</select>

		<br><label>navbar fixed</label>";
		if($data['fixed']== 0){
			echo"<input type='checkbox' name='checkbox1' value=''/>;";
		}
		else{
			echo"<input type='checkbox' name='checkbox1' value='' checked/>;";
		}
		echo "<br><label>neige</label>";
		if($data['neige']== 0){
			echo"<input type='checkbox' name='neige' value=''/>;";
		}
		else{
			echo"<input type='checkbox' name='neige' value='' checked/>;";

		}
echo"
<input type='submit' name='submit' value='Envoyer'/><br>


</form>
";





?>
