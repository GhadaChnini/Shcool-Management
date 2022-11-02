<?php
session_start();
include('cadre.php');
if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){
echo '<div class="corp">';
if(isset($_GET['cherche_etud'])){ 
$retour=mysqli_query($con,"select distinct *, NomClasse from classe"); 

?>
<form action="chercher_etud.php" method="post" class="formulaire">
 <LEGEND align=top>Critère de recherche<LEGEND>
 <div class="form-row">
 <div class="form-group col-md-6"> 
Nom:<input type="text" class="form-control" name="nomel">
</div>
<div class="form-group col-md-6"> 
Prenom:<input type="text" class="form-control" name="prenomel">
</div>
<input class="btn btn-primary" type="submit" value="Chercher">		
</form>
<br>
<a href="index.php">Revenir à la page principale!</a>
<?php
}
else if(isset($_POST['nomel'])){
	$nomel=$_POST['nomel'];
	$prenomel=$_POST['prenomel'];
	$cherche=mysqli_query($con,"select * from etudiant where NomEtudiant LIKE '%$nomel%' and PrenomEtudiant LIKE '%$prenomel%'");//option contient les info suplimentaire
?>
<br>
<table class="table table-striped table-dark">
<tr><th class="rounded-company">Nom</th>
<th class="rounded-q1">Prenom</th>
<th class="rounded-q3">Age</th>
<th class="rounded-q4">Classe</th>

 <?php
	while($a=mysqli_fetch_array($cherche)){
		echo '<tr><td>'.$a['NomEtudiant'].'</td><td>'.$a['PrenomEtudiant'].'</td><td >'.$a['Age'].'</td><td >'.$a['classe'].'</td></tr>';
	}
	?>
	</table>
	<a href="chercher_eleve.php?cherche_etud=true">Revenir à la page precedente !</a>
	<?php
	}
}
?>
</div>
</body>
</html>