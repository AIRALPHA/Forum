<?php $title = "Connexion"; ?>
<div class="container">
	<h1 class="text-center"> Connexion </h1>

	<?php 
	

	if(isset($_POST["submit"]))
	{
		if(empty(trim($_POST["pseudo"])))
		{
			$errors[] = "Veuillez saisir votre pseudo";
		}

		if(empty(trim($_POST["password"])))
		{
			$errors[] = "Veuillez saisir votre password";
		}

		if(empty($errors))
		{
			if(relation_pseudo_password($_POST["pseudo"], $_POST["password"]))
			{
				$_SESSION["pseudo"] = $_POST["pseudo"];
				header("Location:index.php?page=membre");
			} 
			else
			{
				echo "<div class='container col-md-6'>";
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert'>✗</button>
						Pseudo ou Password incorect
					  </div> <br/>";
				echo "</div>";
			}
		}
		else
		{
			echo "<div class='container col-md-6'>";
			foreach ($errors as $error) {
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert'>✗</button><li>".$error."</li></div> <br/>";
			}
			echo "</div>";
		}
	}

	 ?>

	<form method="POST" action="" class="jumbotron col-md-6 offset-3">
		<div class="form-group">
			<label for="pseudo" class="control-label">Votre Pseudo : </label>
			<input type="text" name="pseudo" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="password" class="control-label">Password : </label>
			<input type="password" name="password" class="form-control">
		</div>
		
		<br/><br/>

		<input type="submit" value="Connexion" name="submit" class="btn btn-primary plg"> 

		<br/><br/>
	<strong>Pas encore membre : <em><a href="index.php?page=register">Inscrivez-vous</em></a></strong>
	</form>
	
</div>	
