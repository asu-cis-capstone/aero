<!DOCTYPE html>

<!--
Resources Page
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
    <title>Resources</title>

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
	<div id="title">Resources</div>
	<div id="selection">
    	<ul id="option">
    		<li><a href="uploadresource.php">Add</a></li>
    	</ul>
    </div>
    		<?php
    		
    		include('connect/local-connect.php');
    		
    		$minID = mysql_query("SELECT * FROM resources ORDER BY id");
    		$minIDrow = mysql_fetch_assoc($minID);
    		
    		echo "<li><form action='viewquestion.php' method='POST'><input type='hidden' name='tempViewID' value='".$minIDrow['qID']."'/><input type='submit' name='start-btn' value='Start' /></form><li>";
    		
    		?>
    	</ul>
    </div>
    <div id=list>
    	<?php
    		// This helps display special characters displayed on the web page
    		mysql_set_charset('utf8');
    		
			$query = mysql_query("SELECT * FROM resources ORDER BY id") or die(mysql_error($dbc));
			if(mysql_num_rows($query) > 0) {
				if ($_SESSION['type'] == 'admin') 
				{
					echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
					echo "<tr><th width='10%'>ID</th><th>Question Text</th><th>View</th<th>Delete</th></tr>";
    				while($row = mysql_fetch_array($query)) {
        				echo "<tr><td style='outline: thin solid black'>".$row['id']."</td>";
        				echo "<td style='outline: thin solid black'>".$row['name']."</td>";
        				echo "<td style='outline: thin solid black'><form action='viewresource.php' method='POST'><input type='hidden' name='tempViewID' value='".$row["id"]."'/><input type='submit' name='view-btn' value='View' /></form></td>";
						echo "<td style='outline: thin solid black'><form action='deleteresourcesprocess.php' method='POST' onSubmit=\"return confirm('Are you sure you want to delete?')\"><input type='hidden' name='tempDeleteID' value='".$row["id"]."'/><input type='submit' name='delete-btn' value='Delete' /></form></td></tr>";
    				}
    			}
    			if ($_SESSION['type'] == 'user')
    			{
    				echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
					echo "<tr><th width='10%'>ID</th><th>Question Text</th><th>View</th></tr>";
    				while($row = mysql_fetch_array($query)) {
        				echo "<tr><td style='outline: thin solid black'>".$row['id']."</td>";
        				echo "<td style='outline: thin solid black'>".$row['name']."</td>";
        				echo "<td style='outline: thin solid black'><form action='viewresource.php' method='POST'><input type='hidden' name='tempViewID' value='".$row["id"]."'/><input type='submit' name='view-btn' value='View' /></form></td>";
    				}
    			}	
			}
			
			echo "</table>";
		?>
    </div>
    
    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>