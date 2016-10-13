<?php

	function connection(){
		try {
			$db = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->exec("set names utf8");

			return $db;
		}catch(PDOException $e){
			echo "Echec de la connexion : ".$e->getMessage();
			return false;
		}
	}