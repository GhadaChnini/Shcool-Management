<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<?php
session_start();
include('cadre.php');
$con=mysqli_connect("localhost", "root", "","bdfaculte");
?>
<div class="corp">
<?php
$data=mysqli_query($con,"select * from classe  ");
?>
<br>
<table class="table table-striped table-dark">
<tr><th colspan="5">Liste des classes</th>
<tr><?php echo Edition();?>
 <th class="<?php echo rond(); ?>">Nom de la classe</th>
<?php
while($a=mysqli_fetch_array($data)){
?>
<tr><?php if(isset($_SESSION['admin'])){ 
?><td><a href="modif_classe.php?modif_classe=<?php echo $a['IDclasse']; ?>">modifier</a></td><td><a href="modif_classe.php?supp_classe=<?php echo $a['IDclasse']; ?>" onclick="return(confirm('Etes-vous sur de vouloir supprimer cette entrée?\ntous les enregistrements en relation avec cette entrée seront perdus'));">supprimer</a></td> <?php }
echo '<td>'.$a['NomClasse'].'</td></tr>';
}
?>
</table>
<?php
echo '<br/><br/><a href="index.php">Revenir à la page précédente !</a>';
?>
</center>
</div>
</html>