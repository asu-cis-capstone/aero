<!DOCTYPE html>

<!--
Images Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	
	// Check to see if user is NOT logged in
	/*if (!isset($_SESSION["name"]))
	{
		header('Location: questions.php');
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
    <title>Images</title>

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
	<div id="title">Images</div>
	<div id="selection">
    	<ul id="options2">
    		<li><a href="uploadimage.php">Add</a></li>
    		<li>Search</li>
    	</ul>
    </div>
    <div id=list>
    	<?php
			echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
			echo "<tr><th width='10%'>ID</th><th>Image Name</th><th width='40%'>Image</th><th>Edit</th><th>Delete</th></tr>";

			include('connect/local-connect.php');

			$query = mysql_query("SELECT id, name, image FROM images") or die(mysql_error($dbc));
			if(mysql_num_rows($query) > 0) {
    			while($row = mysql_fetch_array($query)) {
        			echo "<tr><td style='outline: thin solid black'>".$row['id']."</td>";
        			echo "<td style='outline: thin solid black'>".$row['name']."</td>";
        			echo "<td style='outline: thin solid black'><img src=get.php?id=".$row['id']." width='400px'></td>";
					echo "<td style='outline: thin solid black'><form action='editimage.php' method='POST'><input type='hidden' name='tempEditID' value='".$row["qID"]."'/><input type='submit' name='edit-btn' value='Edit' /></form></td>";
					echo "<td style='outline: thin solid black'><form action='deleteimageprocess.php' method='POST' onSubmit=\"return confirm('Are you sure you want to delete?')\"><input type='hidden' name='tempDeleteID' value='".$row["id"]."'/><input type='submit' name='delete-btn' value='Delete' /></form></td></tr>";
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