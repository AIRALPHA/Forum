<?php 
	
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");
?>
	<div class="container">
	<div class="jumbotron col-md-6">
		<h1>Liste des amis</h1>
<?php

	$amis_env = liste_amis_env();
	$amis_rec = liste_amis_rec();

	foreach ($amis_env as $ami_env) 
	{
	?>
	 	<div class="row">
	 			<div class="well col-md-6">
		 			<a href="index.php?page=profile&pseudo=<?= $ami_env['pseudo_dest']; ?>"><img src="avatar/<?php echo $ami_env['avatar']; ?>" class="rounded-circle border border-success" height="150" width="150"></a><br>
		 			<a href="index.php?page=profile&pseudo=<?= $ami_env['pseudo_dest']; ?>"> <?php echo $ami_env["pseudo_dest"]; ?></a>
	 			</div>
	<?php
	}
	foreach ($amis_rec as $ami_rec) 
	{
	?>
		<div class="well col-md-6">
		 			<a href="index.php?page=profile&pseudo=<?= $ami_rec['pseudo_exp']; ?>"><img src="avatar/<?php echo $ami_rec['avatar']; ?>" class="rounded-circle border border-success" height="150" width="150"></a><br>
		 			<a href="index.php?page=profile&pseudo=<?= $ami_rec['pseudo_exp']; ?>"> <?php echo $ami_rec["pseudo_exp"]; ?></a>
	 			</div>
	<?php
	}
	if ($amis_rec==false && $amis_env==false) 
	{
	?>
		<div class="alert alert-success" role="alert">
		  	<h4 class="alert-heading">Oh Non !!</h4>
		  	<p>Vous n'avez pas d'amis pour le moment</p>
		  	<hr>
		  	<p class="mb-0"><a href="index.php?page=liste_membre" class="btn btn-outline-primary">Liste des membres</a></p>
		</div>
	<?php
	}
?>