<?php 
	
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	$conversations = recuperer_conversation();

	if ($conversations == true) 
	{
		echo "
		<div class='jumbotron col-md-6'>
		<div class='row'>";
		foreach ($conversations as $conversation) 
		{
		?>
					<div class="col-md-6">
						<a href="index.php?page=profile&pseudo=<?= $conversation['pseudo']; ?>" class="text-center"><?= $conversation['pseudo']; ?></a> <br/>
						<a href="index.php?page=profile&pseudo=<?= $conversation['pseudo']; ?>"><img src="avatar/<?= $conversation['avatar']; ?>"  class="rounded-circle border border-success" height="150" width="150" alt=""></a> <br>
						<a href="index.php?page=messages_vue&id=<?= $conversation['id_conversation']; ?>" class="font-weight-bold"> <?= $conversation['sujet_conversation']; ?> </a><br/>  
						<span class="text-success">	Posté le : <?= date("D-dM-Y à G:i:s", strtotime($conversation['date_message'])); ?> </span>
					</div>
				
		<?php
		}
	}
	else
	{
	?>
		<div class="alert alert-success col-md-6 offset-2" role="alert">
			Vous n'avez pas de messages
		</div>
	<?php
	}
?>