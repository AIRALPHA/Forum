<?php 

	//function qui verifie le pseudo et password
	function relation_pseudo_password($pseudo, $password)
	{
		global $link;

		$pseudo = mysqli_real_escape_string($link, htmlentities($_POST["pseudo"]));
		$password = mysqli_real_escape_string($link, htmlentities($_POST["password"]));
		$password = sha1($password);

		$query = mysqli_query($link, "SELECT pseudo,password FROM utilisateurs WHERE pseudo='$pseudo' AND password='$password'");
		
		$count = mysqli_num_rows($query);

		return $count;
	}


 ?>