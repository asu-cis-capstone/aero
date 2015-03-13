<!DOCTYPE html>

<!--
Menu Page
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
    <title>Aeroapps Menu</title>

  </head>

  <body>
  	<div id="header">
		<p>
			<span class="left"><a href="menu.html"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></a></span>
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
    <div id="main">
      <h1>Main Menu</h1>
      	<ul>
    		<li><a href="questions.html">Questions</a></li>
    		<li><a href="images.html">Images</a></li>
    		<li><a href="resources.html">Resources</a></li>
      		<li><a href="explanations.html">Explanations</a></li>
      		<li><a href="aircrafts.html">Aircrafts</a></li>
      	</ul>
    </div>
    
    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>