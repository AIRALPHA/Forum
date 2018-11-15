<?php

include('functions/connect.php');
include('functions/info_bulle.func.php');

$page = htmlentities($_GET['page']);

include('functions/'.$_GET['page'].'.func.php');

$pages = scandir('pages');


if(!empty($page) && in_array($_GET['page'].'.php', $pages))
{
	$content = 'pages/'.$_GET['page'].'.php';
}
else
{
	header("Location:index.php?page=login");
}

if (isset($_SESSION['pseudo']) && $page!="membre" && $page!="update" && $page!="liste_membre" && $page!="profile" && $page!="envoi" && $page!="annule" && $page!="invitations" && $page!="refuser" && $page!="accepter" && $page!="amis" && $page!="supprimer_amis" && $page!="new_messages" && $page!="conversations" && $page!="messages" && $page!="messages_vue" && $page!="forum")
{
	header("Location:index.php?page=membre");
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon">
	<title>
		<?php
			echo WEBSITE_NAME;
		 ?>
	</title>
</head>
<body>
	<div id="content">
		<?php
			include($content);
		?>
	</div>

    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
