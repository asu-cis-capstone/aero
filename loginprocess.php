<?php
	// loginprocess.php for Aeroapps Admin Portal
	
	// Set up db connection
	include('connect/local-connect.php');
	
	// PHP variables for the HTML elements
	$uName = $_POST['uName'];
	$uPass = $_POST['uPass'];
	
	// Build the username query
	$query = "SELECT * FROM users WHERE uName = '$uName'";
	
	// Run the username query
	$result = mysqli_query($dbc, $query) or die('Username read error!');
	
	// Check to see if we got any rows
	if (mysqli_num_rows($result) == 0)
	{
		header('Location: index.php?rc=1');
		exit;
	}
	
	// If we got here, we can verify a username
	
	// Build the password query
	$query = "SELECT * FROM users WHERE uName = '$uName' AND uPass = '$uPass'";
	
	// Run the username query
	$result = mysqli_query($dbc, $query) or die('Username read error!');
	
	// Check to see if we got any rows
	if (mysqli_num_rows($result) == 0)
	{
		header('Location: index.php?rc=2');
		exit;
	}
	
	// If we got here, we can verify a username and password combo. 
	
	// Close the db connection
	mysqli_close($dbc);
	
	// start a PHP session
	session_name('admin');
	session_start('admin');
	
	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['admin'] = $row['uName'];
	header('Location: menu.html');
	exit;
	
	// This block of code MUST be the last block of code in this file
	// Pass a return code of 3 back to index.php
	header('Location: index.php?rc=3');
	exit;
?>