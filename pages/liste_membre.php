<?php 
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

 ?>

<div class="container">
	 <div class="jumbotron col-md-6">
	 	<h1>Liste des membres</h1>
	 	<div class="row">
	 	<?php 
	 		$pseudos_avatars = recuperer_pseudo_avatar();

	 		foreach ($pseudos_avatars as $pseudo_avatar) 
	 		{
	 	?>	
	 			<div class="well col-md-6">
		 			<a href="index.php?page=profile&pseudo=<?= $pseudo_avatar['pseudo']; ?>"><img src="avatar/<?php echo $pseudo_avatar['avatar']; ?>" class="rounded-circle border border-success" height="150" width="150"></a><br>
		 			<a href="index.php?page=profile&pseudo=<?= $pseudo_avatar['pseudo']; ?>"> <?php echo $pseudo_avatar["pseudo"]; ?></a>
	 			</div>
	 		
	 		
	 		
	 	<?php
	 			
	 		}
	 	 ?>
	 </div>
</div>