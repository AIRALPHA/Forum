<?php 

	//function qui va supprimer un amis
	function supprimer_amis()
	{
		global $link;

		$query = mysqli_query($link, "DELETE FROM amis WHERE (pseudo_exp='{$_SESSION['pseudo']}' AND pseudo_dest='{$_GET['pseudo']}') OR (pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')");
	}

?>