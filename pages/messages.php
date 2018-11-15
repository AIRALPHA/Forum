<?php 

	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	$messages = recuperer_message();
?>
<div class="container">
	<div class="jumbotron col-md-8">
		<h1>Vos messages</h1>
	<?php
		foreach ($messages as $message) 
		{
		?>
		<div class='row'>
			<div class="col-md-6">
				<img src="avatar/<?= $message['avatar']; ?>" class="rounded-circle border border-success" height="150" width="150" alt=""><br> <br>
				<span class="font-weight-bold">Envoyé par <span class="text-danger font-weight-bold text-uppercase"><?= $message['pseudo']; ?></span><br/></span>
				<span class="font-weight-bold">Le : <em class="text-success"><?= date("D-dM-Y à G:i:s", strtotime($message['date_message'])); ?></em></span>
			</div>
			<div>
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
				  	<div class="card-header">Contenu</div>
				  	<div class="card-body">
					    <p class="card-text"><?= $message['corp_message']; ?></p>
				  	</div>
				</div>
			</div>
		</div>
		<br>
		<a href="index.php?page=new_messages&pseudo=<?= $message['pseudo']; ?>" class="btn btn-outline-danger">Repondre</a>
		<?php
		}
