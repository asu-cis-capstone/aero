<?php
	// connect to database
	include('connect/local-connect.php');
		
	$id = addslashes($_REQUEST['id']);	
	
	$query = "SELECT * FROM images WHERE id = '$id'";
	
	$image = mysqli_query($dbc, $query);
	$image = mysqli_fetch_assoc($image);
	$image = $image['image'];
	
	header("Content-type: image/jpeg");
	
	echo $image;
?>