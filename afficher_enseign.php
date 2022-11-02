<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
session_start();
include('cadre.php');
?>
<div class="corp">
<?php 

$donnee=mysqli_query($con,"select * from enseignant ");
?>
<br>
<table class="table table-striped table-dark">
<tr><th colspan="5">Liste des enseignants</th></th>
<tr><?php  if(!isset($_SESSION['prof'])) {echo Edition();} ?>
<th class="rounded-q2">Nom</th>
<th class="rounded-q2">Prenom </th>
<th class="rounded-q4">Age</th>
</tr>

 <tr>
<?php
while($a=mysqli_fetch_array($donnee)){
?>
<tr><?php if(isset($_SESSION['admin'])  or isset($_SESSION['prof'])){
echo '<td><a href="modif_enseign.php?modif_en='.$a['IDEnseignant'].'">modifier</a></td><td><a href="modif_enseign.php?supp_en='.$a['IDEnseignant'].'" onclick="return(confirm(\'Etes-vous s�r de vouloir supprimer cette entr�e?\ntous les enregistrements en relation avec cette entr�e seront perdus\'));">supprimer</a></td>';}
echo '<td>'.$a['NomEnseignant'].'</td><td>'.$a['PrenomEnseignant'].'</td><td>'.$a['Age'].'</td></tr>';
}
?>
</tr>
</table>
<br/><br/><a href="index.php?">Revenir à la page précédente !</a>
</div>
