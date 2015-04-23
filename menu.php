<!DOCTYPE html>

<!--
Menu Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");

	// Check to see if user is NOT logged in to prevent unauthorized access
	if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'user')
	{
		echo '';
	}
	else
	{
		header("Location: index.php");
		die();
	}	
?>


<html lang ="en">
  	
  <head>
    <!-- Meta tag -->
    <meta name="robots" content="noindex,nofollow" />
    <meta charset = "utf-8"> 

    <!-- Link tag for CSS -->
	<link type="text/css" rel="stylesheet" href="stylesheets/style.css" />
	
	<!-- JavaScript Tags -->
	<script type="text/javascript" src="javascript/loadNavbar.js"></script>

    <!-- Web Page Title -->
    <title>Aeroapps Menu</title>

  </head>

  <body>
  	<div id="header">
		<p>
			<span class="left"><a href="menu.php"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></a></span>
			<?php
			
			if (isset($_SESSION["name"]))
			{
				echo '<span class="right">Welcome, ' . $_SESSION["name"] . '!</span><br />';
			}
			else
			{
				echo '<span class="right">Welcome, Guest!</span><br />';
			}
			?>
			<span class="right"><span class="small"><a href="logout.php">Log Out</a></span></span>
			<br />
		</p>
	</div>
    <div id="main">
      <h1>Main Menu</h1>
      	<script>
      		loadNavbar();
      	</script>
    </div>
    
    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>
