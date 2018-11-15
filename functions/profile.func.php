<?php 

	function recuperer_info_membre_choisi()
	{
		global $link;

		$results = [];
		$pseudo = mysqli_real_escape_string($link, htmlentities($_GET['pseudo']));

		$query = mysqli_query($link, "SELECT * FROM utilisateurs WHERE pseudo='$pseudo'");
		while ($row = mysqli_fetch_assoc($query)) 
		{
			$results[] = $row;
		}

		return $results;
	}

	//function qui verifie si une demande d'amis a ete envoye

	function demande_amis_existe()
	{
		global $link;

		$query = mysqli_query($link, "SELECT COUNT(id_invitation) FROM amis WHERE (pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}' OR (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}'))");

		$count = mysqli_fetch_row($query);

		return current($count);
	}

	//function qui va regarder si la demande a été accepte
	function acepter_demande()
	{
		global $link;

		$query = mysqli_query($link, "SELECT active FROM amis WHERE(pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}') OR(pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')");
		while ($row=mysqli_fetch_assoc($query)) 
		{
			return ($row['active']==0) ? false : true;
		}
	}

	function verifier_expediteur()
	{
		global $link;

		$query = mysqli_query($link, "SELECT COUNT(id_invitation) FROM amis WHERE(pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}')") or die(mysqli_error($link));

		$count = mysqli_fetch_row($query);

		return current($count);
	}
 ?>