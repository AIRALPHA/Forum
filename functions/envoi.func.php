<?php 

//function qui enregistre l'invitation dans la bdd
function enregistre_invitation()
{
	global $link;

	$query = mysqli_query($link, "INSERT INTO amis(id_invitation, pseudo_exp, pseudo_dest, date_invitation, date_confirmation, active) VALUES (NULL, '{$_SESSION['pseudo']}', '{$_GET['pseudo']}', NOW(), NOW(), 0)") or die(mysqli_error($link));
}

?>