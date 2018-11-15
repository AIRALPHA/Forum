<?php 

	//la function qui va recuperer les messages
	function recuperer_message()
	{
		global $link;

		$messages = [];
		$query = mysqli_query($link, "SELECT conversations_messages.date_message, conversations_messages.corp_message, conversations.sujet_conversation, utilisateurs.pseudo, utilisateurs.avatar FROM conversations_messages INNER JOIN conversations ON conversations.id_conversation=conversations_messages.id_conversation INNER JOIN utilisateurs ON conversations_messages.pseudo_exp=utilisateurs.pseudo INNER JOIN conversations_membres ON conversations_messages.id_conversation=conversations_membres.id_conversation WHERE conversations_messages.id_conversation='{$_GET['id']}' AND conversations_membres.pseudo_dest='{$_SESSION['pseudo']}' ORDER BY conversations_messages.date_message DESC") or die(mysqli_error($link));

		while ($row=mysqli_fetch_assoc($query)) 
		{
			$messages[] = $row;
		}

		return $messages;
	}

?>