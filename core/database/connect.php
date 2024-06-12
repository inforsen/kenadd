<?php

	$host = "localhost";
	$user = "cartsenc_festus";
	$password = "AbbY@Nz!26@FeZzaH";
	$dbname = "cartsenc_cartsen";

	$dsn = "mysql:host=". $host . "; dbname=". $dbname;

	try {
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	} catch (PDOException $e) {
		echo 'Database Connection Failed. <br/>'. $e->getMessage();
	}

?>$mJHn8s2