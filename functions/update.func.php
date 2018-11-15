<?php 

	//function qui met a jour les informations
	
	function modifier_info_membre($pseudo, $password, $email, $sexe, $situation, $apropos, $avatar)
	{
		global $link;

		//$password = sha1($password);

		$query = mysqli_query($link, "UPDATE utilisateurs SET pseudo='$pseudo', password='$password', email='$email', sexe='$sexe', situation='$situation', apropos='$apropos', avatar='$avatar' WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysqli_error($link));
	}

	//function qui va changer la photo de profil

	function modifier_image_profil($avatar, $avatar_tmp)
	{
		global $link;

		move_uploaded_file($avatar_tmp, 'avatar/'.$avatar);

		mysqli_query($link, "UPDATE utilisateurs SET avatar='{$_FILES['avatar']['name']}' WHERE pseudo='{$_SESSION['pseudo']}'") or die(mysqli_error($link));
	}

 ?>