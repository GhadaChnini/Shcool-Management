<?php
session_start();
include('cadre.php');
if(isset($_GET['supp_classe'])){
$id=$_GET['supp_classe'];
mysqli_query($con,"delete from classe where IDclasse='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="affiche_classe.php">Revenir à la page  precedente !</a>';
}
?>
</center></pre>
</div>