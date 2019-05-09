<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kalitics - <?php echo $title ?></title>
	<link rel="stylesheet" href="public/css/style.css">
</head>
<body>

	<a href="/Kalitics/?action=addVehicule">
		<div class="add">+</div>
	</a>
	<div class="titleNavBar"><a href="/Kalitics/">Accueil</a></div>

	<div id="content">
		<?php echo $content ?>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> <!-- CDN jQuery -->
	<script src="public/js/main.js"></script>

</body>
</html>