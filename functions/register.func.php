<?php 

	//function d'inscription

	function inscrire_utilisateur($pseudo, $password, $email, $sexe, $situation, $apropos)
	{
		global $link;

		if ($_POST['sexe'] == "Femme") 
		{
			$avatar = "default1.png";
		}
		else
		{
			$avatar = "default.png";
		}

		$password = sha1($password);

		mysqli_query($link, "INSERT INTO UTILISATEURS(id, pseudo, password, email, sexe, situation, apropos, avatar) VALUES (NULL, '$pseudo', '$password', '$email', '$sexe', '$situation', '$apropos', '$avatar')") or die(mysqli_error($link));
	}

	//function de verification des doublures de pseudo

	function pseudo_existe($pseudo)
	{
		global $link;

		$query = mysqli_query($link, "SELECT COUNT(id) FROM UTILISATEURS WHERE pseudo='$pseudo'");
		$count = mysqli_fetch_row($query);
		//return mysqli_result($query, 0);
		return $count[0];
	}

	function email_existe($email)
	{
		global $link;
		
		$query = mysqli_query($link, "SELECT COUNT(id) FROM UTILISATEURS WHERE email='$email'");
		$count = mysqli_fetch_row($query);
		
		return $count[0];
	}
?>  