<?php

require_once("model/Manager.php");

class VehiculeManager extends Manager
{
	public function getVehicules()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM Vehicule, Type, VehiculeType, Marque WHERE idTypeVehicule = idType AND idMarqueVehicule = idMarque AND idVehicule = idVehiculeVT');
		$req->execute();

		return $req;
	}

	public function getVehicule($idVehicule)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM Vehicule, Type, VehiculeType, Marque WHERE idMarqueVehicule = idType AND idMarqueVehicule = idMarque AND idVehicule = ?');
		$req->execute(array($idVehicule));

		return $req;
	}

	public function createVehicule($couleurVehicule, $idMarqueVehicule, $idTypeVehicule, $nombreRoueVT, $poidVT, $decapotableVT)
	{
		$db1 = $this->dbConnect();
		$req1 = $db1->prepare('INSERT INTO Vehicule(couleurVehicule, idMarqueVehicule, idTypeVehicule) 
									VALUES(?, ?, ?)');
		$affectedLines1 = $req1->execute(array($couleurVehicule, $idMarqueVehicule, $idTypeVehicule));

		$last_id = $db1->lastInsertId();
		$db2 = $this->dbConnect();
		$req2 = $db2->prepare('INSERT INTO VehiculeType(idVehiculeVT, idTypeVT, nombreRoueVT, poidVT, decapotableVT) 
									VALUES(?, ?, ?, ?, ?)');
		$affectedLines2 = $req2->execute(array($last_id, $idTypeVehicule, $nombreRoueVT, $poidVT, $decapotableVT));

		return $affectedLines2;
	}

	public function updateVehicule($couleurVehicule, $idMarqueVehicule, $idTypeVehicule, $idVehicule)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE Vehicule SET couleurVehicule = ?, idMarqueVehicule = ?, idTypeVehicule = ? WHERE idVehicule = ?');
		$req->execute(array($couleurVehicule, $idMarqueVehicule, $idTypeVehicule, $idVehicule));

		return $req;
	}

	public function deleteVehicule($idVehicule, $idTypeVT)
	{
		$db1 = $this->dbConnect();
		$req1 = $db1->prepare('DELETE FROM VehiculeType WHERE idVehiculeVT = ? AND idTypeVT = ?');
		$req1->execute(array($idVehicule, $idTypeVT));

		$db2 = $this->dbConnect();
		$req2 = $db2->prepare('DELETE FROM Vehicule WHERE idVehicule = ?');
		$req2->execute(array($idVehicule));

		return $req2;
	}
}