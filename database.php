<?php
	session_start();

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'c19vs';
	try
	{
		$db = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	}
	catch(PDOException $e)
	{
		die('Could not connect to database: ' . $e->getMessage());
	}



?>