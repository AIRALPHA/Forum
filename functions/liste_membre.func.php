<?php 

	//function qui renvoies les informations des membres sauf pour celui connecté

	function recuperer_pseudo_avatar()
	{
		global $link;

		$results = [];
		$query = mysqli_query($link, "SELECT pseudo,avatar FROM utilisateurs WHERE pseudo!='{$_SESSION['pseudo']}'");

		//Recuperation des resultats
		while ($rows = mysqli_fetch_assoc($query)) 
		{
			$results[] = $rows;
		}

		return $results;
	}

 ?>