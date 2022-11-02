<?php
session_start();
include('cadre.php');
	?>
<div class="corp">
<h1 align=center>Ajouter un etudinat</h1><br>
<?php
$con=mysqli_connect("localhost", "root", "","bdfaculte");
if(isset($_POST['nom'])){
	if($_POST['nom']!="" and $_POST['prenom']!=""  and $_POST['age']!="" and $_POST['classe']!=""){
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$age=$_POST['age'];
	$classe=$_POST['classe'];
	$nb=mysqli_fetch_array(mysqli_query($con,"select count(*) as nb from etudiant where NomEtudiant='$nom' and PrenomEtudiant='$prenom'"));
	if($nb['nb']!=0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet etudiant existe déja!");</SCRIPT><?php
	}
	else{
	
	mysqli_query($con,"INSERT into etudiant values('','$nom','$prenom','$age','$classe')");
	
	?>	<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT> 	<?php
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}
?>
<form action="Ajout_etudiant.php" method="POST" class="formulaire">
 <LEGEND align=top>Ajouter un Etudiant<LEGEND> 
 <div class="form-row">
 <div class="form-group col-md-6"> 
Nom étudiant:<input type="text" class="form-control" name="nom">
</div>
<div class="form-group col-md-6">
Prénom:<input type="text" class="form-control" name="prenom">
</div>
<div class="form-group col-md-6"> 
Age:<input type="number" class="form-control" name="age">
</div>
<div class="form-group col-md-6"> 
Classe:<input type="number" class="form-control" name="classe">	
</div>
<br>
<input class="btn btn-primary" type="submit" value="Ajouter">		
</form>
</div>
</body>
</html>