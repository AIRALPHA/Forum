<!DOCTYPE html>
<html>
<head>
	<title>Membre</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<div class="jumbotron bg-dark" style="padding-top: 10px; padding-bottom: 10px; float: right;">
	<h3><strong class="text-info">Espace Membres</strong> 👩 👨</h3>
	<?php 

		$infos = info_membre_conect();
		foreach ($infos as $info) 
			{
				echo "<h4 class='text-center'>";
				echo "<span class='text-warning'>Bienvenue<span> <strong class='text-uppercase text-danger'>".$info['pseudo']."</strong>";
				echo "</h4>";
			}
		if(!isset($_SESSION['pseudo']))
		{
			header("Location:index.php?page=login");
		}	
	?>
	<a href="index.php?page=logout" class="btn btn-primary text-center">Déconnexion</a>
</div>