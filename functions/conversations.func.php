<?php 

	//function qui va recuperer les conversations
	function recuperer_conversation()
	{
		global $link;

		$results = [];

		$query = mysqli_query($link, "SELECT conversations.id_conversation, conversations.sujet_conversation, utilisateurs.pseudo, utilisateurs.avatar, conversations_messages.date_message FROM conversations LEFT JOIN conversations_messages ON conversations.id_conversation=conversations_messages.id_conversation INNER JOIN conversations_membres ON conversations.id_conversation=conversations_membres.id_conversation INNER JOIN utilisateurs ON conversations_messages.pseudo_exp=utilisateurs.pseudo WHERE pseudo_dest='{$_SESSION['pseudo']}' GROUP BY conversations.id_conversation ORDER BY conversations_messages.date_message") or die(mysqli_error($link));

		while ($row = mysqli_fetch_assoc($query)) 
		{
			$results[] = $row;
		}

		return $results;
	}

?>