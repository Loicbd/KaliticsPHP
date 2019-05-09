<?php 

require("config.php");

class Manager
{
    protected function dbConnect()
    {
		global $dbpath;
		global $dblogin;
		global $bdPassword;
		$bdd = new PDO($dbpath, $dblogin, $bdPassword);
		return $bdd;
	}
}