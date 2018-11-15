<?php 
	$smtp_port = "1000";
	ini_set("smtp_port", $smtp_port);
	function verif_email()
	{
		global $link;
		
		$email = mysqli_real_escape_string($link, htmlentities($_POST["f_email"]));

		$query = mysqli_query($link, "SELECT COUNT(id) FROM utilisateurs WHERE email='$email'") or die(mysqli_error($link));

		$count = mysqli_fetch_row($query);

		return current($count);
	}

	function recuperer_pass($password)
	{
		global $link;
		$password = sha1($password);
		$email = mysqli_real_escape_string($link, htmlentities($_POST["f_email"]));

		$query = mysqli_query($link, "UPDATE utilisateurs SET password='$password'  WHERE email='$email'") or die(mysqli_error($link));
	}

?>