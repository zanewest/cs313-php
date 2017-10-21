<?php
/******************************************************
* Connects to database whether on Heroku or on local
*
*
*
*******************************************************/

// Heroku
	$dbUrl = getenv('DATABASE_URL');
	if (empty($dbUrl)) {
// Local
		$dbPass = "password1";
		$dbUser = "pureaddiction";
		$dbUrl = "postgres://$dbUser:$dbPass@localhost:5432/pureaddictiondb";
	}
	$dbopts = parse_url($dbUrl);
//print "<p>$dbUrl</p>\n\n";
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');
//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";
	try {
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
	catch (PDOException $ex) {
 //print "<p>error: $ex->getMessage() </p>\n\n";
		die();
	}
	return $db;

?>