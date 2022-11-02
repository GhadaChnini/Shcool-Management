<?php
session_start();
include('cadre.php');
$con=mysqli_connect("localhost", "root", "","bdfaculte");
?>
<div class="corp">
<h1 align="center">Ajouter matiére</h1>
<div class="formulaire">
<form action="ajout_matiere.php" method="POST" >
Veuillez saisir la nouvelle matière :
<div class="form-row">
<div class="form-group col-md-6"> 
Nom du matière:<input type="text" name="nommat" class="form-control">
Coefficient : <input type="number" name="coeff" class="form-control">
</div>
<br>
<input class="btn btn-primary" type="submit" value="Ajouter">		
</form>
<?php 
if($_POST){
	if($_POST['nommat']!=""){
		$nommat=$_POST['nommat'];
	    $coeff=$_POST['coeff'];
		$compte=mysqli_fetch_array(mysqli_query($con,"select count(*) as nb from matiere where NomMatiere='$nommat' "));
		$bool=true;
		if($compte['nb']>0){
			$bool=false;
			?> <SCRIPT LANGUAGE="Javascript">	alert("Erreur d\'insertion, l\'enregistrement existe déja"); </SCRIPT> <?php
		}
		if($bool==true){
			mysqli_query($con,"INSERT into matiere values('','$coeff','$nommat')");
		?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT> <?php
		}
	}
	else {
	?> <SCRIPT LANGUAGE="Javascript">	alert("Veuilliez remplire tous les champs!"); </SCRIPT> <?php
	}
	echo '<a href="Ajout_matiere.php">Revenir à la page précédente !</a>';
}
?>
</pre>
</div>
</div>
</html>
