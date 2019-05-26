<?php
    $username = "shayan";
	$password = "Karachi1%";
	$host = "192.168.20.250";
	$dbname = "tez_mis";
	$db = NULL;
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

	try
	{
		DB::$dsn = "mysql:host=$host;dbname=$dbname";
		DB::$account = $username;
		DB::$password = $password;
		$db = DB::instance();
	}
	catch(PDOException $ex)
	{
	    die("Failed to connect to the database: " . $ex->getMessage());
	}
