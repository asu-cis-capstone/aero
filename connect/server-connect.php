<?php
	// server-connect.php

	// Variables
	$host	= 'www.aeroappstechnology.com';
	$user	= 'jarballo';
	$pw		= 'aeroapps';
	$db		= 'aeroapps';
	
	// Connect to the DB
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect! (SERVER)');
?>