<?php

/* DATABASE CONFIGURATION */


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
//define('DB_DATABASE', 'buyowlcakebruh');
//define("BASE_URL", "http://localhost/buyowlcakebruh/");


//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
define('DB_DATABASE', 'id1185980_infs3202');
define("BASE_URL", "http://localhost/buyowlcakebruh/");


//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'id1185980_infs3202');
//define('DB_PASSWORD', 'infs3202');
//define('DB_DATABASE', 'id1185980_infs3202');
//define("BASE_URL", "http://buyowlcakebruh.000webhost.com/");

date_default_timezone_set('Australia/Brisbane');


/**
 * Makes a database connection
 * @return PDO The connection to the database
 */
function connect_database()
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
		$dbConnection->exec("set names utf8");
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConnection;
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
		$url=BASE_URL.'databaseError.php';
		header("Location: $url");
	}

}





?>