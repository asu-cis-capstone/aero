<?php
	// server-connect.php

	// Variables
	$host	= 'localhost';
	$user	= 'jarballo';
	$pw		= 'aeroapps';
	$db		= 'aeroapps';
	
	// Connect to the DB
	$dbc = mysql_connect($host,$user,$pw) or die('unable to connect! (SERVER)');
	mysql_select_db("aeroapps") or die(mysql_error());
?>