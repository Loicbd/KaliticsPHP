<?php

require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class MarqueManager extends Manager
{
	public function getMarques()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM Marque ORDER BY nomMarque');

		return $req;
	}
}