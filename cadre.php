<?php
//session_start();
/*****Verification du mot de passe ****/
if(isset($_POST['mdp'])){
if($_POST['mdp']!="" and $_POST['pseudo']!=""){
	$mdp=$_POST['mdp'];
	$pseudo=$_POST['pseudo'];
	$con=mysqli_connect("localhost", "root","","bdfaculte");
	$nb=mysqli_fetch_array(mysqli_query($con,"select count(*) as nb,type,Num from login where pseudo='$pseudo' and passe='$mdp'"));
	if($nb['nb']==1){
		if($nb['type']=="etudiant")
			$_SESSION['etudiant']=$nb['Num'];
		else if($nb['type']=="admin")
			$_SESSION['admin']=$nb['Num'];
		else if($nb['type']=="prof")
		$_SESSION['prof']=$nb['Num'];
	}
	else{
	?>	<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect");</SCRIPT> 	<?php
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}
else if(isset($_GET['sortir'])){
session_destroy();
header("location:index.php");
}
Function colspan($min,$max){
if(isset($_SESSION['admin']))
	return $max;
else
	return $min;
}
Function rond(){
if(isset($_SESSION['admin']))
	return 'rounded-q1';	
else
	return 'rounded-company';
}
Function Edition(){
 if(isset($_SESSION['admin']))
 return '<th colspan="2" class="rounded-company">EDITION</th>';
 else
 return '';
}
Function Edition2(){//si on veut affcher edtition pour le prof aussi
 if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
 return '<th colspan="2" class="rounded-company">EDITION</th>';
 else
 return '';
}
Function rond2(){//si on veut affcher edtition pour le prof aussi
if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
	return 'rounded-q1';	
else
	return 'rounded-company';
}
Function colspan2($min,$max){//si on veut affcher edtition pour le prof aussi
if(isset($_SESSION['admin']) or isset($_SESSION['prof']))
	return $max;
else
	return $min;
}
Function choixpardefault2($var1,$var2)//pour selection l'element � modifier par defautl
{
if($var1==$var2)
return 'selected="selected"';
else
return "";
}

$con=mysqli_connect("localhost", "root", "","bdfaculte");
$data=mysqli_query($con,"select distinct NomClasse from classe");
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body >
	<div class="align-middle">
<div class="connexion2">
&nbsp;&nbsp;&nbsp;<font color="white">Connexion</font><br/><br/>
<?php if(!(isset($_SESSION['admin'])) and !isset($_SESSION['prof']) and !isset($_SESSION['etudiant'])){
?>
<form action="index.php" method="post">
<LEGEND align=top>Authentification :<LEGEND>  
<div class="form-row">
	<div class="form-group col-md-6">
		Pseudo :<input type="text" class="form-control" name="pseudo">
	</div>
	<div class="form-group col-md-6">
		Mot de passe :<input type="password" class="form-control" name="mdp">
	</div>
</div>
<br>
	<input class="btn btn-primary" type="submit" value="Connexion"><br/>
</form>
<?php
}
else
echo '<button class="btn btn-secondary type="button"><a href="index.php?sortir=1">Deconexion</a></button>';
?>
</div>
<br>
<?php 
				if(isset($_SESSION['prof']) or isset($_SESSION['admin']) or isset($_SESSION['etudiant']) ){ 
				?>
<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					Etudiants</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<li><a class="dropdown-item" href="listeEtudiant.php?list=true">Consulter la liste</a></li>
				<?php 
				if(!isset($_SESSION['etudiant']) and !isset($_SESSION['prof']) ){ echo '<li><a class="dropdown-item" href="Ajout_etudiant.php">Ajouter un etudiant</a></li>';
					} 
				?>
				<li><a class="dropdown-item" href="chercher_etud.php?cherche_etud=true">Chercher un etudiant</a></li>
				</ul>
			<?php if( isset($_SESSION['etudiant']) or isset($_SESSION['admin']) or isset($_SESSION['prof'])){
					echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					Les notes</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
							if(!isset($_SESSION['etudiant'])){ echo '<li><a class="dropdown-item" href="ajouter_note.php">Ajouter Note</a></li>';}
							 echo '<li><a class="dropdown-item" href="afficher_note.php">Note Session Principale</a></li>'; }
						echo '</ul>';
						?>
			
			<?php
			echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			Classes</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="affiche_classe.php">Voir les classes</a></li>';
						if(!isset($_SESSION['admin']))
						echo '</ul>';
						 else{
						echo '<li><a class="dropdown-item" href="ajout_classe.php">Ajouter une classe</a></li>
					</ul>
					';}?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			Matière</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<li><a class="dropdown-item" href="afficher_matiere.php">Voir les matières</a></li>
				<?php if(isset($_SESSION['admin'])){ echo '<li><li><a class="dropdown-item" href="ajout_matiere.php">Ajouter une matière</a></li>'; }
				echo '</ul>';
		?>
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		Enseignants</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<li><a class="dropdown-item" href="afficher_enseign.php">Liste des enseignants</a></li>
					<?php if((isset($_SESSION['admin'])) ){
					if(!isset($_SESSION['prof'])){echo '<li><a class="dropdown-item" href="ajout_enseignement.php">Ajouter un enseignant</a></li>';}
					}
					?>	
					<li><a class="dropdown-item" href="chercher_prof.php?cherche_ens=true">Chercher un enseignant</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
		
		</div>
<?php } ?>
				</div>
</body>
</html>