<?php
	//Local-connect.php
	
	//Variables 
	$host	='localhost';
	$user	='root';
	$pw		='root';
	$db		='aeroapps';
	
	//connect to the DB
	$dbc = mysql_connect($host,$user,$pw) or die('unable to connect! (LOCAL)');
	mysql_select_db("aeroapps") or die(mysql_error());
?>