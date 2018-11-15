<?php 

	//function qui va recuperer les infos des utilisateurs connectés
	function info_membre_conect()
	{
		global $link;

		$infos = [];

		$pseudo = $_SESSION['pseudo'];
		$query = mysqli_query($link, "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");

		while($rows = mysqli_fetch_assoc($query))
		{
			$infos[] = $rows;
		}

		return $infos;
	}

	//function qui compte le nombre de personnes inscrites
	function nombre_membre()
	{
		global $link;

		$query = mysqli_query($link, "SELECT COUNT(id) FROM utilisateurs");
		$count = mysqli_fetch_row($query);
		return $count[0];
	}

 ?>