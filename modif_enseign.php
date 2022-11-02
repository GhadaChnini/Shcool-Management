<?php
session_start();
include('cadre.php');
$con=mysqli_connect("localhost", "root", "","bdfaculte");
if(isset($_GET['modif_en'])){//modif_en qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_en'];
$ligne=mysqli_fetch_array(mysqli_query($con,"select * from enseignant where enseignant.IDEnseignant='$id'"));
$nom=stripslashes($ligne['NomEnseignant'])	;
$prenom=stripslashes($ligne['PrenomEnseignant']);
$age=stripslashes($ligne['Age']);

?>
<div class="corp">
	<h1>Modification d'un etudiant</h1><br><br>	
<pre>
<form action="modif_enseign.php" method="POST" class="formulaire">
   
 <LEGEND align=top>Modifier un enseignant<LEGEND>  <pre>
Nom enseignant        :      <input type="text" name="nom" value="<?php echo $nom; ?>" /><br/>
Prénom                   :         <input type="text" name="prenom" value="<?php echo $prenom; ?>" /><br/>
Age     :               <input type="number" name="age" value="<?php echo $age; ?>" /><br/>
<input type="hidden" name="id" value="<?php echo $id; ?>"><br/>
<input type="image" src="button.png">
</pre>
</form><a href="afficher_enseign.php">Revenir à la page précédente !</a>
</div>
<?php
}
	if(isset($_POST['nom'])){
		if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['age']!=""){
			$nom=addslashes(Htmlspecialchars($_POST['nom']));
			$prenom=addslashes(Htmlspecialchars($_POST['prenom']));
			$age=addslashes(Htmlspecialchars($_POST['age']));
			mysqli_query($con,"update enseignant set NomEnseignant='$nom', PrenomEnseignant='$prenom', Age='$age', classe='$classe' where IDEnseignant='$id'");
			?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT> 
			<?php
			
		}
		else{
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss"); </SCRIPT> <?php
		}
	echo '<div class="corp"><br/><br/><a href="modif_etud.php?modif_en='.$id.'">Revenir à la page precedente !</a></div>';
}
if(isset($_GET['supp_en'])){
$id=$_GET['supp_en'];
mysqli_query($con,"delete from enseignant where enseignant.IDEnseignant='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php?">Revenir � la page principale !</a>';
}
?>
</center></pre>

</body>
</html>