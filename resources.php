<!DOCTYPE html>

<!--
Resources Page
-->

<?php
	// Start a PHP session
	session_name("admin");
	session_start("admin");
	
	// Check to see if user is NOT logged in to prevent unauthorized access
	/*if (!isset($_SESSION["admin"]))
	{
		header('Location: index.php');
		exit;
	}
	*/
?>

<html lang ="en">
  	
  <head>
    <!-- Meta tag -->
    <meta name="robots" content="noindex,nofollow" />
    <meta charset = "utf-8"> 

    <!-- Link tag for CSS -->
	<link type="text/css" rel="stylesheet" href="stylesheets/style.css" />

    <!-- Web Page Title -->
    <title>Resources</title>

  </head>

  <body>
	<div id="header">
		<p>
			<span class="left"><a href="menu.php"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></a></span>
			<?php
			
			if (isset($_SESSION["admin"]))
			{
				echo '<span class="right">Welcome, ' . $_SESSION["admin"] . '!</span><br />';
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
	<div id="navselection">
    	<ul id="navbar">
    		<li><a href="questions.php">Questions</a></li>
    		<li><a href="images.php">Images</a></li>
    		<li><a href="resources.php">Resources</a></li>
      		<li><a href="explanations.php">Explanations</a></li>
			<li><a href="aircrafts.php">Aircrafts</a></li>
    	</ul>
    </div>
	<div id="title">Resources</div>
	<div id="selection">
    	<ul id="options">
    		<li><a href="uploadresource.php">Add</a></li>
    		<li>Search</li>
    	</ul>
    </div>
    <div id=list>
    	Under Construction
    </div>
    
    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>