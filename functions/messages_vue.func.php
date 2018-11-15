<?php 


function vue_message($id)
{
	global $link;

	$query = mysqli_query($link, "UPDATE conversations_messages SET date_vue=NOW() WHERE id_conversation='$id'") or die(mysqli_error($link));
}

?>