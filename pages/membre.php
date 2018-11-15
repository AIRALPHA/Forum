<?php 
	error_reporting(-1);
	ini_set("display_errors", 1);

	include("body/header.php");
	include("body/menu.php");

 ?>

	
<body>
	<div class="container">
		<?php 

			foreach ($infos as $info) 
			{
		?>
			<div class="jumbotron col-md-8">
				<?php
				//Verification du sexe pour afficher la bonne photo de profil
				?>
				<h1 class="text-center">Informations Personnelles </h1>
				<img src="avatar/<?= $info['avatar'] ?>" height="150" width="150" alt="Image de profil">
				<p><span class="font-weight-bold">Email </span>📌 <?php echo "<span class='text-success font-italic' style='text-decoration: underline;'>".$info['email']."</span>"; ?></p>
				<p><span class="font-weight-bold">Sexe </span>📌 <?php echo "<span class='text-success text-uppercase'>".$info['sexe']."</span>"; ?></p>
				<p><span class="font-weight-bold">Situation </span>📌 <?php echo "<span class='text-success text-uppercase'>".$info['situation']."</span>"; ?></p>
				<p><span class="font-weight-bold">Apropos </span>📌 <?php echo "<span class='text-success' >".$info['apropos']."</span>"; ?></p>
			</div>
		<?php  
			}
		?>	

		 
	</div><!-- /.container -->
</body>