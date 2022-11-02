<?php
session_start();
include('cadre.php');
$con=mysqli_connect("localhost", "root", "","bdfaculte");
if(isset($_GET['modif_el'])){//modif_el qu'on a recup�rer de l'affichage (modifier)
$id=$_GET['modif_el'];
$ligne=mysqli_fetch_array(mysqli_query($con,"select * from etudiant,classe where etudiant.classe=classe.IDclasse and etudiant.IDEtudiant='$id'"));
$nom=stripslashes($ligne['NomEtudiant'])	;
$prenom=stripslashes($ligne['PrenomEtudiant']);
$age=stripslashes($ligne['Age']);
$classe=stripslashes($ligne['classe']);

?>
<div class="corp">
	<h1>Modification d'un etudiant</h1><br><br>	
<pre>
<form action="modif_etud.php" method="POST" class="formulaire">
   
 <LEGEND align=top>Modifier un étudiant<LEGEND>  <pre>
Nom étudiant        :      <input type="text" name="nom" value="<?php echo $nom; ?>" /><br/>
Prénom                   :         <input type="text" name="prenom" value="<?php echo $prenom; ?>" /><br/>
Age     :               <input type="number" name="age" value="<?php echo $age; ?>" /><br/>
classe                   :       <input type="number" name="classe" value="<?php echo $classe; ?>" /><br/>
<input type="hidden" name="id" value="<?php echo $id; ?>"><br/>
<input type="image" src="button.png">
</pre>
</form><a href="listeEtudiant.php?NomClasse=<?php echo $ligne['NomEtudiant']; ?>">Revenir à la page précédente !</a>
</div>
<?php

	if(isset($_POST['nom']) and (isset($_GET['modif_el']))){
		$id=$_GET['modif_el'];
		if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['age']!="" and $_POST['classe']!=""){
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$age=$_POST['age'];
			$classe=$_POST['classe'];
			mysqli_query($con,"update etudiant set NomEtudiant='$nom', PrenomEtudiant='$prenom', Age='$age', classe='$classe' where IDEtudiant='$id'");
			?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT> 
			<?php
			
		}
		else{
		?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss"); </SCRIPT> <?php
		}
	echo '<div class="corp"><br/><br/><a href="modif_etud.php?modif_el='.$id.'">Revenir à la page precedente !</a></div>';
}}
if(isset($_GET['supp_el'])){
$id=$_GET['supp_el'];
mysqli_query($con,"delete from etudiant where IDEtudiant='$id'");
mysqli_query($con,"delete from note where IDEtudiant='$id'");/*	Supprimier tous les entres en relation		*/
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php?">Revenir à la page principale !</a>';
}
?>
</center></pre>

</body>
</html>