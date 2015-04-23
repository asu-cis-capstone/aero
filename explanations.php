<!DOCTYPE html>

<!--
Explanations Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	// Check to see if user is NOT logged in to prevent unauthorized access
	/*if (!isset($_SESSION["name"]))
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
	
	<!-- JavaScript Tags -->
	<script type="text/javascript" src="javascript/loadNavbar.js"></script>

    <!-- Web Page Title -->
    <title>Explanations</title>

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
	<div id="title">Explanations</div>
	<div id="selection">
    	<ul id="options2">
    		<li><a href="uploadquestion.php">Add</a></li>
    		<li>Search</li>
    	</ul>
    </div>
    <div id=list>
    	<?php
    		include ('connect/local-connect.php');	
    			
			$query = mysql_query("SELECT * FROM test_answers ORDER BY qID asc") or die(mysql_error($dbc));
			if(mysql_num_rows($query) > 0) {
				if ($_SESSION['type'] == 'admin') 
				{
					echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
					echo "<tr><th width='10%'>Question ID</th><th>Explanation Text</th><th>View</th><th>Edit</th></tr>";
    				while($row = mysql_fetch_array($query)) {
    					if ($row['exp'] != '') {
    						echo "<tr>";
        					echo "<td style='outline: thin solid black'>".$row['qID']."</td>";
        					echo "<td style='outline: thin solid black'>".$row['exp']."</td>";
        					echo "<td style='outline: thin solid black'><form action='viewquestion.php' method='POST'><input type='hidden' name='tempViewID' value='".$row["qID"]."'/><input type='submit' name='view-btn' value='View' /></form></td>";
							echo "<td style='outline: thin solid black'><form action='editquestion.php' method='POST'><input type='hidden' name='tempEditID' value='".$row["qID"]."'/><input type='submit' name='edit-btn' value='Edit' /></form></td>";
							echo "</tr>";
    					}
    				}
    			}
    			if ($_SESSION['type'] == 'user')
    			{
    				echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
					echo "<tr><th width='10%'>ID</th><th>Question Text</th><th>View</th></tr>";
    				while($row = mysql_fetch_array($query)) {
        				echo "<tr><td style='outline: thin solid black'>".$row['qID']."</td>";
        				echo "<td style='outline: thin solid black'>".$row['qText']."</td>";
        				echo "<td style='outline: thin solid black'><form action='viewquestion.php' method='POST'><input type='hidden' name='tempViewID' value='".$row["qID"]."'/><input type='submit' name='view-btn' value='View' /></form></td>";
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