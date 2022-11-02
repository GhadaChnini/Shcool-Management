<?php
session_start();
include('cadre.php');
mysqli_connect("localhost", "root", "","bdfaculte");
?>
<html>
<div class="corp">
<h1>Ajouter classe</h1><center>
<div class="formulaire">
<?php
if($_POST){
$nomcl=$_POST['nomcl'];
$compte=mysqli_fetch_array(mysqli_query($con,"select count(*) as nb from classe where NomClasse='$nomcl' "));
$bool=true;
if($compte['nb']>0){
$bool=false;
echo '<h2>Erreur d\'insertion, l\'enregistrement existe déja </h2>';
}
if($bool==true){
mysqli_query($con,"insert into classe values ('','$nomcl')");
?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT> <?php
}
echo '<br/><a href="ajout_classe.php">Revenir à la page précédente !</a>';
}   
 ?>
 <form action="ajout_classe.php" method="POST">
 <div class="form-group col-md-6"> 
 Nom classe:<input type="text" name="nomcl" class="form-control"><br/>
 <input class="btn btn-primary" type="submit" value="Ajouter">
</form>
<br/><br/><a href="index.php">Revenir à la page principale !</a>
</div>
</pre></center>
<?php

?>
</div>
</pre>
</center>
</div>
</html>
