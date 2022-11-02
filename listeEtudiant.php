<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
session_start();
include('cadre.php');
?>
<div class="corp">
<?php 
$donnee=mysqli_query($con,"select * from etudiant ");
?>
<br>
<table class="table table-striped table-dark">
<tr><th colspan="5">Liste des etudiants</th></th>
<tr><?php  if(!isset($_SESSION['etudiant'])) {echo Edition();} ?>
<th class="rounded-q2">Nom</th>
<th class="rounded-q2">Prenom </th>
<th class="rounded-q4">Age</th>
</tr>

 <tr>
<?php
while($a=mysqli_fetch_array($donnee)){
?>
<tr><?php if(isset($_SESSION['admin'])  or isset($_SESSION['prof'])){
echo '<td><a href="modif_etud.php?modif_el='.$a['IDEtudiant'].'">modifier</a></td><td><a href="modif_etud.php?supp_el='.$a['IDEtudiant'].'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette entre?\ntous les enregistrements en relation avec cette entr�e seront perdus\'));">supprimer</a></td>';}
echo '<td>'.$a['NomEtudiant'].'</td><td>'.$a['PrenomEtudiant'].'</td><td>'.$a['Age'].'</td></tr>';
}
?>
</tr>
</table>
<br/><br/><a href="index.php?">Revenir à la page précédente !</a>
</div>
