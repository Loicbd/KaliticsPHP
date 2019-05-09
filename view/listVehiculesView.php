<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<?php
while ($donees = $vehicules->fetch()) {
	echo "<div class='vehiculeList'>";
	echo "Véhicule : ".$donees['idVehicule']."<br>";
	echo "Couleur : ".$donees['couleurVehicule']."<br>";
	echo "Marque : ".$donees['nomMarque']."<br>";
	echo "Type : ".$donees['nomType']."<br>";
	if ($donees['nomType'] == "Camion") {
		echo "Nb roue : ".$donees['nombreRoueVT']."<br>";
		echo "Poid : ".$donees['poidVT']."<br>";
	}
	elseif ($donees['nomType'] == "Voiture") {
		if ($donees['decapotableVT'] == 0) {
			echo "Décapotable : Non<br>";
		}
		else {
			echo "Décapotable : Oui<br>";
		}
	}
	echo "<form method='post' action='?action=removeVehicule'>";
	echo "<input type='hidden' name='idVehicule' value='".$donees['idVehicule']."'>";
	echo "<input type='hidden' name='idType' value='".$donees['idType']."'>";
	echo "<input type='submit' value='Supprimer'>";
	echo "</form>";
	echo "</div>";
}
/*
$donees['idVehicule']
$donees['couleurVehicule']
$donees['nomMarque']
$donees['nomType']
$donees['idVehiculeVT']
$donees['idTypeVT']
*/
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>