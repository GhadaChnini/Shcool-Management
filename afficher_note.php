<?php
session_start();
include('cadre.php');
?>
<div class="corp">
<h1>Affichage des notes</h1><br><br>
<?php

$data=mysqli_query($con,"select * from etudiant ");
?>
<form action="afficher_note.php" method="POST" class="formulaire">
Veuillez choisir le nom de l'étudiant :
   <FIELDSET>
 <select name="nom">
    <option>choisir un etudiant</option>
<?php while($a=mysqli_fetch_array($data)){
echo '<option value="'.$a['IDEtudiant'].'">'.$a['NomEtudiant'].'</option>';
}?></select>
<input class="btn btn-primary" type="submit" value="Chercher">
</pre></fieldset>
</form>
<?php 
if(isset($_POST['nom'])){
   $etudiant = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);

$donnee=mysqli_query($con,"select * from etudiant, note where note.IDEtudiant=etudiant.IDetudiant and etudiant.IDetudiant=$etudiant");//select nommat from matiere,classe where matiere.codecl=classe.codecl and classe.nom='$classe'
$donnee2=mysqli_query($con,"select * from matiere, note where note.IDmatiere=matiere.IDmatiere and note.IDetudiant=$etudiant");
//$_SESSION['classe']=$classe;
?>

<?php


?><table class="table table-striped table-dark">
<tr><th class="rounded-company">Matière</th>
<th scope="col" class="rounded-q2">Coefficient</th>
<th scope="col" class="rounded-q2">Note</th>
<th scope="col" class="rounded-q4">action</th>
<?php
$somme_coeff=0;
$somme_mat=0;
$moyenne=0;
while($a=mysqli_fetch_array($donnee2) and $a2=mysqli_fetch_array($donnee)){
   echo '<tr><td>'.$a['NomMatiere'].'</td><td>'.$a['Coeff_matiere'].'</td>';
   echo '<td>'.$a2['NoteMatiere'].'</td>'.'<td><a href="<supp_note.php?supp_note='.$a2['IDNote'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce note?\ntous les enregistrements en relation avec cette entrée seront perdus\'));">supprimer</a>'.'</td></tr>';
   $somme_coeff=$somme_coeff+$a['Coeff_matiere'];
   $somme_mat=$somme_mat+$a['Coeff_matiere']*$a2['NoteMatiere'];
}
$moyenne=$somme_mat/$somme_coeff;
echo "La moyenne est $moyenne";
?>
</table>
<?php
}//fin   if(isset($_POST['radio']
?>
</pre>
</div>
<body>
</html>

