<!DOCTYPE html>

<!--
Aeroapps Admin Portal Login Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	// Check to see if user is logged in
	/*if (isset($_SESSION["name"]))
	{
		header('Location: menu.php');
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
    <title>Aeroapps Web Portal</title>

  </head>

  <body>
  	<div id="header">
		<p>
			<span class="left"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></span>
			<br />
		</p>
	</div>
	<div id="main">
		<h1>Aeroapps Web Portal</h1>
	</div>
	
	<form id="joinform" action="loginprocess.php" method="post">

		<p class="fh1">
			Please login here:
			<?php
				// Check return code from loginprocess.php
				if ($_GET["rc"] == 1)
				{
					echo '<p class="logerr">Username not found!</p>';
				}
				if ($_GET["rc"] == 2)
				{
					echo '<p class="logerr">Password not found!</p>';
				}
				if ($_GET["rc"] == 3)
				{
					echo '<p class="logerr">Returned from process.php...</p>';
				}
			?>
			<br />
			<br />
			<!--	Username	-->
			<label for="uName">Username:</label>
			<input type="text" id="uName" name="uName" 
			required
			placeholder="Username..."
			autofocus
			/>
			<br />
			
			<!--	Password	-->
			<label for="uPass">Password:</label>
			<input type="password" id="uPass" name="uPass" 
			required
			placeholder="Password..." 
			/>
			<br />
		</p>
		
		<p class="submit">
			<input type="submit" value="Submit"/>
		</p>	
	</form>
	
	<div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
	
  </body>

</html>