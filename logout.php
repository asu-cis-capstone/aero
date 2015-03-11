<?php
	// logout.php
	
	session_name("admin");
	session_start("admin");
	session_unset("admin");
	session_destroy();
	header('Location: index.php');
?>