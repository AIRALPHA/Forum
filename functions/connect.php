<?php 
echo "<script>document.write('<script src=\"http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>";
session_start();
//Connexion a la base de donnees
	
	$link = mysqli_connect("localhost", "root", "", "sn") or die ("Erreur de connexion ou BDD introuvable");

	mysqli_query($link, "SET NAMES utf8");

	define("WEBSITE_NAME", "AIR ALPHA");

	function set_active($page_courante)
	{
		if ($page_courante == $_GET['page']) 
		{
			echo "active";
		}
	}

 ?>
