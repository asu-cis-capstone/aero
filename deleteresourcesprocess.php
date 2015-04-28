<?php
	// deleterocess.php for Aeroapps Admin Portal
	
	// Set up db connection
	include('connect/local-connect.php');
	
	// PHP variables for the HTML elements
	$id = $_POST['tempDeleteID'];
	
	// Build the delete question query
	$query 		= "DELETE FROM resources WHERE id = '$id'";
	
	// Run the delete question query
	$result 	= mysql_query($query) or die('Question read error!');
	
	// Close the db connection
	mysql_close($dbc);
	
	// start a PHP session
	session_name('logged');
	session_start('logged');
	
	// Redirect back to Questions.php
	header('Location: resources.php');
	exit;
?>