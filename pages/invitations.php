<?php 
	
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	$invitations = recuperer_invitation();

	if($invitations==true)
	{
		echo '<div class="jumbotron col-md-9">
			<div class="card-deck">';
		foreach ($invitations as $invitation) 
		{
			if ($invitation['active']==0) 
			{
		?>
			  	<div class="card col-md-4">
				    <img class="card-img-top rounded-circle border border-danger" src="avatar/<?= $invitation['avatar'] ?>" height="239" width="180" alt="Avatar">
				    <div class="card-body">
				      	<h5 class="card-title">Demande d'amis</h5>
				      	<p class="card-text"><span class="font-weight-bold text-uppercase text-success"><?= $invitation['pseudo_exp'] ?></span> veut être votre ami</p>
				    </div>
				    <div class="card-footer">
				      	<small class="text-muted">
				      		<span class="row">
				      			<a href="index.php?page=accepter&pseudo=<?= $invitation['pseudo_exp'] ?>" class="btn btn-success col-md-6">Accepter ?</a> <a href="index.php?page=refuser&pseudo=<?= $invitation['pseudo_exp'] ?>" class="btn btn-danger col-md-6">Refuser ?</a>
				      		</span>
				      	</small>
				    </div>
			  	</div>
		<?php
			}
			elseif($invitation==true && $invitation['active']==1)
			{
			?>
				<div class="alert alert-success col-md-4" role="alert">
				  	<h4 class="alert-heading">Bravo !!</h4>
				  	<p>Vous etes deja ami avec <span class="font-weight-bold text-uppercase text-success"><?= $invitation['pseudo_exp'] ?></span> </p>
				  	<hr>
				  	<p class="mb-0"><a href="index.php?page=amis" class="btn btn-outline-primary">Aller dans la liste des amis ?</a></p>
				</div>
			<?php
			}
		}
	}
	else
	{
	?>
		<div class="alert alert-success col-md-4" role="alert">
		  	<h4 class="alert-heading">Désolé !!</h4>
		  	<p>Personne ne vous a envoyé une invitation</p>
		  	<hr>
		  	<p class="mb-0"><a href="index.php?page=liste_membre" class="btn btn-outline-primary">Aller sur la liste des membres ?</a></p>
		</div>
	<?php	
	}

 ?>