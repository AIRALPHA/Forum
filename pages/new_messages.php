<?php 
	
	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	if (!empty($_GET['pseudo'])) 
	{
		if (isset($_POST['submit'])) 
		{
			$sujet = mysqli_real_escape_string($link, htmlentities($_POST['sujet']));
			$message = mysqli_real_escape_string($link, htmlentities($_POST['message']));

			if (empty($sujet) || empty($message)) 
			{
			?>
				<div class="alert alert-danger col-md-6 offset-2" role="alert">
				  	Tout les champs doivent être remplis
				</div>
			<?php	
			}
			else
			{
				creer_conversation_et_message($sujet, $message);
			?>
				<div class="alert alert-success col-md-6 offset-2" role="alert">
				  	Votre message a ete envoyé
				</div>
			<?php
			}
		}
	}
	else
	{
		header("Location:index.php?page=membre");
	}
?>

<form method="POST" action="" class="jumbotron col-md-6 offset-2">
	<h1>Envoyer un message</h1>
	<br>
	<div class="form-group">
		<label for="destinataire" class="control-label">Déstinataire : </label>
		<input type="text" name="destinataire" placeholder="" class="form-control" value="<?= $_GET['pseudo']; ?>" disabled="">
	</div>
	
	<div class="form-group">
		<label for="sujet" class="control-label">Sujet : </label>
		<input type="text" name="sujet" placeholder="" class="form-control" value="<?= (isset($sujet)) ? $sujet : ""; ?>">
	</div>

	<div class="form-group">
		<label for="message" class="control-label">Message : </label>
			<textarea cols="30" rows="6" name="message" class="form-control" placeholder="Votre message !"><?= (isset($message)) ? $message : ""; ?></textarea><br/>
	</div>
	
	<input type="submit" value="Envoyer le message" name="submit" class="btn btn-success"><br><br>
</form>