<?php
	// deleteimageprocess.php for Aeroapps Admin Portal
	
	// Set up db connection
	include('connect/local-connect.php');
	
	// PHP variables for the HTML elements
	$id = $_POST['tempDeleteID'];
	
	// Build the delete question query
	$query = "DELETE FROM images WHERE id = '$id'";
	
	// Run the delete question query
	$result = mysqli_query($dbc, $query) or die('Question read error!'); 
	
	// Close the db connection
	mysqli_close($dbc);
	
	// start a PHP session
	session_name('admin');
	session_start('admin');
	
	// Redirect back to Questions.php
	header('Location: images.php');
	exit;
?>