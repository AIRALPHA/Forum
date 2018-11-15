<?php 

	$id = $_GET['id'];
	vue_message($id);
	
	header("Location:index.php?page=messages&id=".$id)

?>