<?php
session_start();
include('cadre.php');
?>
<html>
<body><div class="corp">
    <h1 align=center>Ajout des notes</h1>
    <center><pre>
<table>
<form action="" method="POST">
<tr>
<td> Etudiant :</td>
<td><select  name="etudiant" class="dropdown-item">
    <option>Séléctinner un etudiant</option>
    <?php 
  $con = mysqli_connect("localhost", "root", "","bdfaculte") ;
//   if (!$con)
// {
// die("ne pourrait pas se relier : ". mysqli_error ());
// }
  $req = "SELECT * from etudiant";   
  $result=mysqli_query($con,$req);
  while($don=mysqli_fetch_array($result)){
    echo "<option value=$don[IDEtudiant]> $don[NomEtudiant] </option>";
          } 


    ?>
    </select>
</td>
</tr>
<tr>
<td> Matiere </td>
<td><select  name="matiere" class="dropdown-item">
    <option>Séléctionner une matiere</option>
<?php

  $req1 = "SELECT * from matiere";
  $result1=mysqli_query($con,$req1);
  while($don1=mysqli_fetch_array($result1)){
    echo "<option value=$don1[IDmatiere]> $don1[NomMatiere] </option>";
          } 
    ?> 
    </select></td>
</tr>
<tr>
<td> Session </td>
<td><input type="radio" name="session" value="Principale"> Principale <input type="radio" name="session" value="Rattrapage"> Rattrapage</td>
</tr>
<tr>
<td> Note </td>
<td><input type="text" name="note" class="form-control" /></td>
</tr>
<tr><td colspan="2"><input class="btn btn-primary" type="submit" value="Enregistrer">
&nbsp;
<input class="btn btn-danger" type="reset" value="Effacer">
</td></tr>
</form>
</table>
</pre></center>
        </div>
</body>
</html>
<?PHP
if($_POST){
$etudiant = filter_input(INPUT_POST, 'etudiant', FILTER_SANITIZE_STRING);
$matiere = filter_input(INPUT_POST, 'matiere', FILTER_SANITIZE_STRING);
$note = $_POST['note'];
$session = $_POST['session'];

$sql2="INSERT INTO note VALUES ('','$etudiant','$matiere','$note','$session')";
if (!mysqli_query($con,$sql2))
{
die('Error: ' . mysql_error($con));
}
}



mysqli_close($con);

?>