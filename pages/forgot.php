<?php 
	include('../functions/connect.php');
	include('../functions/forgot.func.php');

	$alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l' ,'m' ,'n' ,'o' ,'p' ,'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

	if (isset($_POST['submit'])) 
	{
		$password = "";
		
		for ($i=0; $i < 10 ; $i++) 
		{ 
			$c = rand(0, 35);
			$password = $password.$alphabet[$c];
		}


		if(verif_email())
		{
			recuperer_pass($password);
			$subject = "AIR ALPHA - Recuperation";
			$message = "Voici votre nouveau mot de passe : ".$password;
			mail($_POST['f_email'], $subject, $message);
		}
		else
		{
		?>
			<div class="alert alert-primary col-md-6 offset-3" role="alert">
			  	Desolé nous n'avons aucun utilisateur enregistrer avec cette email
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
		}
	}

?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/main.css">

<div class="container">
	<div class="jumbotron col-md-6 offset-3">
		<h4 class="lead text-danger">Recuperation du mot de passe</h4>
		<form method="POST" action="">
			<div class="form-group">
			    <label for="f_email">Address e-mail</label>
			    <input type="email" class="form-control" name="f_email" placeholder="Enter email">	
		  	</div>
		  	<br><br>
		  	<input type="submit" name="submit" class="btn btn-success" value="Envoyer">
		</form>
	</div>
</div>