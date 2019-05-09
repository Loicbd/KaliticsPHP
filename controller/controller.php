<?php

require_once('model/VehiculeManager.php');
require_once('model/MarqueManager.php');

function listVehicules() {
	$vehiculeManager = new VehiculeManager();
   $vehicules = $vehiculeManager->getVehicules();

   require('view/listVehiculesView.php');
}

function viewVehicule() {
   $vehiculeManager = new VehiculeManager();
   $vehicule = $vehiculeManager->getVehicule($_GET['idVehicule']);

   require('view/vehiculeView.php');
}

function addVehicule() {
   $marqueManager = new MarqueManager();
   $marques = $marqueManager->getMarques();

   require('view/vehiculeInsertView.php');
}

function insertVehicule() {
   if (isset($_POST['couleurVehicule']) && isset($_POST['idMarqueVehicule']) && isset($_POST['idTypeVehicule'])) {
      $vehiculeManager = new VehiculeManager();
   	$vehicule = $vehiculeManager->createVehicule($_POST['couleurVehicule'], $_POST['idMarqueVehicule'], $_POST['idTypeVehicule'], $_POST['nombreRoueVT'], $_POST['poidVT'], $_POST['decapotableVT']);
   	header('Location: /Kalitics/');
	}
}

function editVehicule() {
	if (isset($_POST['idVehicule']) && isset($_POST['idType'])) {
		$vehiculeManager = new VehiculeManager();
   	$vehicule = $vehiculeManager->updateVehicule($_POST['idVehicule']);

   	header('Location: ?action=viewVehicule&id=' . $_POST['idVehicule']);
	}
}

function removeVehicule() {
	if (isset($_POST['idVehicule']) && isset($_POST['idType'])) {
		$vehiculeManager = new VehiculeManager();
   	$vehicule = $vehiculeManager->deleteVehicule($_POST['idVehicule'], $_POST['idType']);

   	header('Location: /Kalitics/');
	}
}