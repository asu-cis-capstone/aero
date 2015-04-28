<?php
	if(isset($_POST['tempViewID'])) 
	{
	// if id is set then get the file with the id from database

	include ('connect/local-connect.php');
	$id    = $_POST['tempViewID'];
	$query = "SELECT name, type, size, content " .
      "FROM resources WHERE id = '$id'";

	$result = mysql_query($query) or die('Error, query failed');
	list($name, $type, $size, $content) = mysql_fetch_array($result);

	header("Content-length: $size");
	header("Content-type: $type");
	header("Content-Disposition: attachment; filename=$name");
	echo $content;

	mysql_close($dbc);
	exit;
	}

?>
