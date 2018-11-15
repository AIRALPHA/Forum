<?php $title = "Inscription"; ?>
<div class="container">
	<h1 class="text-center"> Inscription </h1>

	<?php

		

		if(isset($_POST['submit']))
		{
			$pseudo = mysqli_real_escape_string($link, htmlentities(trim($_POST['pseudo'])));
			$password = mysqli_real_escape_string($link, htmlentities(trim($_POST['password'])));
			$repeatpassword = mysqli_real_escape_string($link, htmlentities(trim($_POST['repeatpassword'])));
			$email = mysqli_real_escape_string($link, htmlentities(trim($_POST['email'])));
			$sexe = mysqli_real_escape_string($link, htmlentities($_POST['sexe']));
			$situation = mysqli_real_escape_string($link, htmlentities($_POST['situation']));
			$apropos = mysqli_real_escape_string($link, htmlentities(trim($_POST['apropos'])));

			if (empty($pseudo))
			{
				$errors[] = "Veuillez saisir votre pseudo 😱";
			}
			if (empty($password))
			{
				$errors[] = "Veuillez saisir votre password 😱";
			}
			if ($password != $repeatpassword ) 
			{
				$errors[] = "Les deux password doivent être identiques 😱";
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$errors[] = "Adresse e-mail incorecte 😱";
			}
			if(empty($apropos))
			{
				$errors[] = "Veuillez vous decrire 😱";
			}

			if(pseudo_existe($pseudo))
			{
				$errors[] = "Ce Pseudo existe déja 😱";
			}

			if(email_existe($email))
			{
				$errors[] = "Cette Adresse existe déja 😱";
			}

			if (!empty($errors)) 
			{
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
						echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>';
						foreach ($errors as $error) 
						{
							echo $error.'<br/>';
							
						}
				echo "</div>";
			}
			else
			{
				inscrire_utilisateur($pseudo, $password, $email, $sexe, $situation, $apropos);
				die("<div class='alert alert-success col-md-6'>Inscription terminée vous pouvez vous <a href='index.php?page=login'class='alert-link'> connecter 😊 <a></div>");
			}
		}

	?>

<form method="POST" action="" class="jumbotron col-md-6 offset-3">

	<div class="form-group">
		<label for="pseudo" class="control-label">Votre Pseudo : </label>
		<input type="text" name="pseudo" placeholder="Entrer votre pseudo" class="form-control" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>">
	</div>
	
	<div class="form-group">
		<label for="password" class="control-label">Password : </label>
		<input type="password" name="password" class="form-control" placeholder="Entrer votre password">
	</div>
	
	<div class="form-group">
		<label for="repeatpassword" class="control-label">Repeat Password : </label>
		<input type="password" name="repeatpassword" class="form-control" placeholder="Repeat votre password">
	</div>

	<div class="form-group">
		<label for="email" class="control-label">E-mail : </label>
		<input type="text" name="email" class="form-control" placeholder="Entrer votre adresse mail" value="<?php if(isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {echo $email;} ?>">
	</div>
	
	<div class="form-group">
		<label for="sexe" class="control-label">Sexe : </label>
		<select name="sexe" class="form-control col-md-3">
			<option value='Homme' <?php if(isset($sexe) && $sexe=="Homme") {echo 'selected="selected"';} ?>>Homme</option>
			<option value='Femme' <?php if(isset($sexe) && $sexe=="Femme") {echo 'selected="selected"';} ?>>Femme</option>
		</select>
	</div>

	<div class="form-group">
		<label for="situation" class="control-label">Situation : </label>
		<select name="situation" class="form-control col-md-3">
			<option value='celibataire' <?php if(isset($situation) && $situation=="celibataire") {echo "selected";} ?>> Célibataire </option>
			<option value='couple' <?php if(isset($situation) && $situation=="couple") {echo "selected";} ?>> Couple </option>
			<option value='divorce' <?php if(isset($situation) && $situation=="divorce") {echo "selected";} ?>> Divorcé(e) </option>
			<option value='Veuf' <?php if(isset($situation) && $situation=="Veuf") {echo "selected";} ?>>Veuf(ve)</option>
		</select>
	</div>

	<div class="form-group">
		<label for="apropos" class="control-label">Apropos de vous : </label>
			<textarea cols="30" rows="6" name="apropos" class="form-control" placeholder="Quelque chose sur vous !"><?php if(isset($apropos)) {echo $apropos;} ?></textarea><br/>
	</div>
	
	<input type="submit" value="S'inscrire" name="submit" class="btn btn-primary plg"><br><br>
	<strong>Vous avez deja un compte : <em><a href="index.php?page=login">connecter vous</em></a></strong>
</form>
</div>

