<?php 

	function accepter_invitation()
	{
		global $link;

		$query = mysqli_query($link, "UPDATE amis SET active=1, date_confirmation=NOW() WHERE(pseudo_exp='{$_GET['pseudo']}' AND pseudo_dest='{$_SESSION['pseudo']}')") or die(mysqli_error($link));
	}

?>