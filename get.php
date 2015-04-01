<?php
	// connect to database
	include('connect/local-connect.php');
		
	$id = addslashes($_REQUEST['id']);	
	
	$query = "SELECT * FROM images WHERE id = '$id'";
	
	$image = mysql_query($query);
	$image = mysql_fetch_assoc($image);
	$image = $image['image'];
	
	header("Content-type: image/jpeg");
	
	echo $image;
?>