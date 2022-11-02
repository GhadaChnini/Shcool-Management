<?php
session_start();
include('cadre.php');
if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){
echo '<div class="corp">';
if(isset($_GET['cherche_ens'])){ 

?>
<form action="chercher_prof.php" method="post" class="formulaire">
<LEGEND align=top>Critère de recherche<LEGEND>
<div class="form-row">
<div class="form-group col-md-6"> 
Nom:<input type="text" name="nomel" class="form-control">
Prenom:<input type="text" name="prenomel" class="form-control">
</div>
<br>
<input class="btn btn-primary" type="submit" value="Chercher">		
</form>
<br>
<a href="index.php">Revenir à la page principale!</a>
<?php
}
else if(isset($_POST['nomel'])){
	$nomel=$_POST['nomel'];
	$prenomel=$_POST['prenomel'];
	if($nomel!="" )
	$cherche=mysqli_query($con,"select * from enseignant where enseignant.NomEnseignant LIKE '%$nomel%' and enseignant.PrenomEnseignant LIKE '%$prenomel%'");//option contient les info suplimentaire
?>
<br>
<table class="table table-striped table-dark">
<tr><th class="rounded-company">Nom</th>
<th class="rounded-q1">Prenom</th>
<th class="rounded-q3">Age</th>
 <?php
	while($a=mysqli_fetch_array($cherche)){
		echo '<tr><td>'.$a['NomEnseignant'].'</td><td>'.$a['PrenomEnseignant'].'</td><td >'.$a['Age'].'</td></tr>';
	}
	?>
	</table>
	<a href="chercher_prof.php?cherche_ens=true">Revenir à la page precedente !</a>
	<?php
	}
}
?>
</div>
</body>
</html>