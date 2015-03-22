<?php
	//Local-connect.php
	
	//Variables 
	$host	='localhost';
	$user	='root';
	$pw		='root';
	$db		='aeroapps';
	
	//connect to the DB
	$dbc = mysqli_connect($host,$user,$pw,$db) or die('unable to connect! (LOCAL)');
?>