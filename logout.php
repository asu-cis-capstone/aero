<?php
	// logout.php
	
	session_name("logged");
	session_start("logged");
	session_unset("logged");
	session_destroy();
	header('Location: index.php');
?>