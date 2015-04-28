<!DOCTYPE html>

<!--
View Resources Page
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
    <title>View Resources</title>

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
	
	<div id="navselection">
    	<script>
    		loadNavbar();
    	</script>	
    </div>
    
    <div id="list">
		<center>
		
		<p id="title">View Resource</p>
		
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
		
		</center>
	</div>
	
  </body>

</html>