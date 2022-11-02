<?php
session_start();
include('cadre.php');
$con=mysqli_connect("localhost", "root","", "bdfaculte");
?>
<html>
<body>
<div class="corp">
<h1 align="center">Affichage des matières</h1>
<pre>
<?php 

$data=mysqli_query($con,"select * from matiere");
?>

<?php   
     while($a=mysqli_fetch_array($data)){
      if(isset($_SESSION['admin'])){ echo '<table class="table table-striped table-dark"><tr><td>
            '.$a['NomMatiere'].'</tr></td></table>';
      }}

?>
<?php 
echo '<br/><br/><a href="afficher_matiere.php">Revenir à la page principale</a>';
 ?>
</div>
</pre>

</body>
</html>