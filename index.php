<?php

require('controller/controller.php');

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listVehicules') {
		listVehicules();
	}
	elseif ($_GET['action'] == 'viewVehicule') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			viewVehicule();
		}
		else {
			echo 'Erreur : aucun identifiant envoyé';
		}
	}
	elseif ($_GET['action'] == 'addVehicule') {
		addVehicule();
	}
	elseif ($_GET['action'] == 'insertVehicule') {
		insertVehicule();
	}
	elseif ($_GET['action'] == 'editVehicule') {
		editVehicule();
	}
	elseif ($_GET['action'] == 'removeVehicule') {
		removeVehicule();
	}
}
else {
   listVehicules();
}