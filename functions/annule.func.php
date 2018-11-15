<?php 

	//function qui supprime l'invitation
	function supprimer_invitation()
	{
		global $link;

		$query = mysqli_query($link, "DELETE FROM amis WHERE(pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}')") or die(mysqli_error($link));
	}

 ?>