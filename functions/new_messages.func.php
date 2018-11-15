<?php 

	//La function qui va creer le message et la conversation
	function creer_conversation_et_message($sujet, $message)
	{
		global $link;
		//creer la conversation
		mysqli_query($link, "INSERT INTO conversations(id_conversation, sujet_conversation) VALUES(NULL, '$sujet')") or die(mysqli_error($link));
		$id_conversation = mysqli_insert_id($link);
		//creer le message
		mysqli_query($link, "INSERT INTO conversations_messages(id_conversation, pseudo_exp, corp_message, date_message, date_vue, pseudo_dest1) VALUES('$id_conversation', '{$_SESSION['pseudo']}', '$message', NOW(), NOW(), '{$_GET['pseudo']}')") or die(mysqli_error($link));
		//creer la conversation membre
		mysqli_query($link, "INSERT INTO conversations_membres(id_conversation, pseudo_dest) VALUES('$id_conversation', '{$_GET['pseudo']}')") or die(mysqli_error($link));
	}

?>