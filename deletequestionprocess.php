<?php
	// deleterocess.php for Aeroapps Admin Portal
	
	// Set up db connection
	include('connect/local-connect.php');
	
	// PHP variables for the HTML elements
	$ID = $_POST['tempDeleteID'];
	
	// Build the delete question query
	$query 		= "DELETE FROM test_questions WHERE qID = '$qID'";
	$query2 	= "DELETE FROM test_answers WHERE qID = '$qID'";
	
	// Run the delete question query
	$result 	= mysql_query($query) or die('Question read error!');
	$result2 	= mysql_query($query2) or die('Question read error!');  
	
	// Close the db connection
	mysql_close($dbc);
	
	// start a PHP session
	session_name('logged');
	session_start('logged');
	
	// Redirect back to Questions.php
	header('Location: questions.php');
	exit;
?>