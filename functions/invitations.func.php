<?php 

	function recuperer_invitation()
	{
		global $link;

		$query = mysqli_query($link, "SELECT pseudo_exp, date_invitation, active, avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo=amis.pseudo_exp WHERE pseudo_dest='{$_SESSION['pseudo']}' ORDER BY date_invitation DESC");

		$results = [];
		while ($row=mysqli_fetch_assoc($query)) 
		{
			$results[] = $row;
		}
		return $results;
	}
 ?>