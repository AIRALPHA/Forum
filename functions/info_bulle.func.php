<?php 

	//function qui affiche l'info_bulle
	function afficher_info_bulle()
	{
		global $link;

		$query = mysqli_query($link, "SELECT COUNT(id_invitation) FROM amis WHERE pseudo_dest='{$_SESSION['pseudo']}' AND date_invitation=date_confirmation");
		$count = mysqli_fetch_row($query);
		return current($count);
	}

	function info_bulle_message()
	{
		global $link;
		$query = mysqli_query($link, "SELECT COUNT(id_conversation) FROM conversations_messages WHERE pseudo_dest1='{$_SESSION['pseudo']}' AND date_vue=date_message");
		$count = mysqli_fetch_row($query);
		return current($count);
	}

?>