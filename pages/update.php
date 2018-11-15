<?php 

	include("functions/membre.func.php");
	include("body/header.php");
	include("body/menu.php");

	if (isset($_POST["submit"])) 
	{
		$pseudo = mysqli_real_escape_string($link, htmlentities(trim($_POST['pseudo'])));
		$password = mysqli_real_escape_string($link, htmlentities(trim($_POST['password'])));
		$repeatpassword = mysqli_real_escape_string($link, htmlentities(trim($_POST['repeatpassword'])));
		$email = mysqli_real_escape_string($link, htmlentities(trim($_POST['email'])));
		$sexe = mysqli_real_escape_string($link, htmlentities($_POST['sexe']));
		$situation = mysqli_real_escape_string($link, htmlentities($_POST['situation']));
		$apropos = mysqli_real_escape_string($link, htmlentities(trim($_POST['apropos'])));
		$avatar = ($sexe == 'Homme') ? 'default.png' : 'default1.png';
		// Verification si il a modifier le password
		$password = (empty($password)) ? $info['password'] : sha1($password);

		modifier_info_membre($pseudo, $password, $email, $sexe, $situation, $apropos, $avatar);
		header("Location:index.php?page=membre");
		

	}

	if (isset($_POST['submit_img'])) 
	{
		$avatar = $_FILES['avatar']['name'];
		$avatar_tmp = $_FILES['avatar']['tmp_name'];

		if (!empty($avatar)) 
		{
			$image_ext = strtolower(strrchr($avatar, "."));
			
			if (in_array($image_ext, array(".png", ".jpg", ".jpeg", ".jif"))) 
			{
				modifier_image_profil($avatar, $avatar_tmp);
				header("Location:index.php?page=membre");
			}
			else
			{
				echo "<div class='alert alert-danger alert-dismissable col-md-3' style='position: absolute; bottom: 0px; right: 250px;'>
						<button type='button' class='close' data-dismiss='alert'>✗</button>Veuiller saisir une image valide</div> <br/>";
			}
		}
	}
?>
<div class="container">

	 	 <?php 
	 	 	foreach ($infos as $info) 
	 	 	{
	 	 ?>
	 <form method="POST" action="" class="jumbotron col-md-6">
	 	<h1 style="margin-top: 0px;">Modifier Vos Informations</h1>
		<div class="form-group">
			<label for="pseudo" class="control-label">Nouveau Pseudo : </label>
			<input type="text" name="pseudo" placeholder="Entrer votre pseudo" class="form-control" value="<?php if(isset($info['pseudo'])) {echo $info['pseudo'];} ?>">
		</div>
		
		<div class="form-group">
			<label for="password" class="control-label">Password : </label>
			<input type="password" name="password" class="form-control" placeholder="Entrer votre nouveau password">
		</div>
		
		<div class="form-group">
			<label for="repeatpassword" class="control-label">Repeat Password : </label>
			<input type="password" name="repeatpassword" class="form-control" placeholder="Repeat votre nouveau password">
		</div>

		<div class="form-group">
			<label for="email" class="control-label">E-mail : </label>
			<input type="text" name="email" class="form-control" placeholder="Entrer votre adresse mail" value="<?php if(isset($info['email']) && filter_var($info['email'], FILTER_VALIDATE_EMAIL)) {echo $info['email'];} ?>">
		</div>
		
		<div class="form-group">
			<label for="sexe" class="control-label">Sexe : </label>
			<select name="sexe" class="form-control col-md-3">
				<option value='Homme' <?php if(isset($info['sexe']) && $info['sexe']=="Homme") {echo 'selected="selected"';} ?>>Homme</option>
				<option value='Femme' <?php if(isset($info['sexe']) && $info['sexe']=="Femme") {echo 'selected="selected"';} ?>>Femme</option>
			</select>
		</div>

		<div class="form-group">
			<label for="situation" class="control-label">Situation : </label>
			<select name="situation" class="form-control col-md-3">
				<option value='celibataire' <?php if(isset($info['situation']) && $info['situation']=="celibataire") {echo "selected";} ?>> Célibataire </option>
				<option value='couple' <?php if(isset($info['situation']) && $info['situation']=="couple") {echo "selected";} ?>> Couple </option>
				<option value='divorce' <?php if(isset($info['situation']) && $info['situation']=="divorce") {echo "selected";} ?>> Divorcé(e) </option>
				<option value='Veuf' <?php if(isset($info['situation']) && $info['situation']=="Veuf") {echo "selected";} ?>>Veuf(ve)</option>
			</select>
		</div>

		<div class="form-group">
			<label for="apropos" class="control-label">Apropos de vous : </label>
				<textarea cols="30" rows="6" name="apropos" class="form-control" placeholder="Quelque chose sur vous !"><?php if(isset($info['apropos'])) {echo $info['apropos'];} ?></textarea><br/>
		</div>
		
		<input type="submit" value="Changer ✓" name="submit" class="btn btn-primary col-md-5">
		<br/> <br/>
		<p class="text-danger font-weight-bold bg-dark" style="border-radius: 5px;">
			NB: Une fois la modification effectuée vous devez immédiatement vous déconnecter et vous reconnecter avec les nouveaux paramètres pour constater les éventuels changements.
		</p>
		<p class="text-danger font-weight-bold bg-dark" style="border-radius: 5px;">
			PS: Toutes fois, elle n’est pas nécessaire si vous n’avez pas modifié le pseudo et le password.
		</p>

	</form>
	 	 <?php
	 	 	}

	 	  ?>
	 	 <div class="jumbotron position-absolute" style="position: absolute; bottom: 60px; right: 200px;">
	 		<h1>Modifier votre photo</h1>
	 
	 		<img src="avatar/<?= $info['avatar']; ?>" height="150" width="150" alt="Image de profil">
	 		<br><br>
	 		<form method="POST" action="" enctype="multipart/form-data">
	 			<span class='btn btn-primary'>
	 				<input type="file" name="avatar">
	 				<input type="submit" name="submit_img" value="Valider">
	 			</span>
	 		</form>
	 	</div>
</div>
