<?php 

	//La function qui va refuser l'invitation
	function refuser_invitation()
	{
		global $link;

		$query = mysqli_query($link, "DELETE FROM amis WHERE( pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')");
	}

?>