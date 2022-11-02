<?php
session_start();
include('cadre.php');
	?>
<div class="corp">
<h1 align=center>Ajouter un enseignant</h1><br>
<?php
$con=mysqli_connect("localhost", "root", "","bdfaculte");
if(isset($_POST['nom'])){
	if($_POST['nom']!="" and $_POST['prenom']!=""  and $_POST['age']!=""){
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$age=$_POST['age'];
	$nb=mysqli_fetch_array(mysqli_query($con,"select count(*) as nb from enseignant where NomEnseignant='$nom' and PrenomEnseignant='$prenom'"));
	if($nb['nb']!=0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet etudiant existe déja!");</SCRIPT><?php
	}
	else{
	
	mysqli_query($con,"INSERT into enseignant values('','$nom','$prenom','$age')");
	
	?>	<SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT> 	<?php
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}
?>
<form action="ajout_enseignement.php" method="POST" class="formulaire">
 <LEGEND align=top>Ajouter un Etudiant<LEGEND>
 <div class="form-row">
<div class="form-group col-md-6"> 
Nom enseignant:<input type="text" name="nom" class="form-control">
Prénom:<input type="text" name="prenom" class="form-control">
Age:<input type="number" name="age" class="form-control">
</div>
<br>
<input class="btn btn-primary" type="submit" value="Ajouter">		
</form>
</div>
</body>
</html>