<?php 
	
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	$infos_membres_choisis = recuperer_info_membre_choisi();

	if($infos_membres_choisis==TRUE && $_GET['pseudo']!=$_SESSION['pseudo'])
	{
		foreach ($infos_membres_choisis as $info_membre_choisi) 
		{
			//Verifie si il existe une demande d'amis entre les deux
		?>
		<?php if(demande_amis_existe()==0): ?>
			<div class="alert alert-danger col-md-4 offset-2" role="alert">
				<h4 class="alert-heading">Désolé !!</h4>
			  	<p>Vous devez être ami avec <span class="font-weight-bold text-uppercase text-success"><?= $info_membre_choisi['pseudo']; ?></span> pour visiter son profil</p>
			  	<hr>
			  	<p class="mb-0"><a href="index.php?page=envoi&pseudo=<?= $info_membre_choisi['pseudo']; ?>" class="btn btn-outline-primary">Envoyer une invitation ?</a></p>
			</div>
		<?php elseif(acepter_demande()==0 && verifier_expediteur()==1): ?>
			<div class="alert alert-primary col-md-4 offset-2" role="alert">
				<h4 class="alert-heading">Yello !!</h4>
			  	<p>Votre invitation a étée envoyée avec succés à <span class="font-weight-bold text-uppercase text-success"><?= $info_membre_choisi['pseudo']; ?></span></p>
			  	<hr>
			  	<p class="mb-0"><a href="index.php?page=annule&pseudo=<?= $info_membre_choisi['pseudo'] ?>" class="btn btn-outline-danger">Annuler la demande ?</a></p>
			</div>
		<?php elseif(acepter_demande()==0 && verifier_expediteur()==0): ?>
			<div class="alert alert-primary col-md-4 offset-2" role="alert">
				<h4 class="alert-heading">Demande en cour !!</h4>
			  	<p>Vueillez verifier vos invitations</span></p>
			  	<hr>
			  	<p class="mb-0"><a href="index.php?page=invitations" class="btn btn-outline-success">Allez dans vos invitations ?</a></p>
			</div>
		<?php else: ?>
			<div class="jumbotron col-md-8">
					
					<h1 class="lead">Informations de <span class="text-danger font-weight-bold text-uppercase"><?= $info_membre_choisi['pseudo'] ?></span></h1>
					<img src="avatar/<?= $info_membre_choisi['avatar'] ?>" height="150" width="150" alt="Image de profil">
					<p><span class="font-weight-bold">Email </span>📌 <?php echo "<span class='text-success font-italic' style='text-decoration: underline;'>".$info_membre_choisi['email']."</span>"; ?></p>
					<p><span class="font-weight-bold">Sexe </span>📌 <?php echo "<span class='text-success text-uppercase'>".$info_membre_choisi['sexe']."</span>"; ?></p>
					<p><span class="font-weight-bold">Situation </span>📌 <?php echo "<span class='text-success text-uppercase'>".$info_membre_choisi['situation']."</span>"; ?></p>
					<p><span class="font-weight-bold">Apropos </span>📌 <?php echo "<span class='text-success' >".$info_membre_choisi['apropos']."</span>"; ?></p>
					<p class="col-md-6">
						<div class="row">
						<a href="index.php?page=supprimer_amis&pseudo=<?= $info_membre_choisi['pseudo']; ?>" class="btn btn-success col-md-4">Rétirer <?= $info_membre_choisi['pseudo']; ?> de votre liste d'amis</a>
						<a href="index.php?page=new_messages&pseudo=<?= $info_membre_choisi['pseudo']; ?>" class="btn btn-outline-danger col-md-3">Envoyer un message</a>
						</div>
					</p>
		    </div>
		<?php endif ?>
			
	    <?php
		}
	}
	else
	{
		header("Location:index.php?page=membre");
	}
 ?>
