<?php 

	//La function qui affiche la liste d'amis
	function liste_amis_env()
	{
		global $link;

		$results = [];

		$query = mysqli_query($link, "SELECT pseudo_dest, avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo=amis.pseudo_dest WHERE(pseudo_exp='{$_SESSION['pseudo']}' AND active=1)");
		while($row=mysqli_fetch_assoc($query))
		{
			$results[] = $row;
		}
		return $results;
	}

	function liste_amis_rec()
	{
		global $link;

		$results = [];

		$query = mysqli_query($link, "SELECT pseudo_exp, avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo=amis.pseudo_exp WHERE(pseudo_dest='{$_SESSION['pseudo']}' AND active=1)");
		while($row=mysqli_fetch_assoc($query))
		{
			$results[] = $row;
		}
		return $results;
	}

?>