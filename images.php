<!DOCTYPE html>

<!--
Images Page
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
    <title>Images</title>

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
	<div id="title">Images</div>
	<div id="selection">
    	<ul id="options">
    		<li><a href="uploadquestion.html">Add</a></li>
    		<li>Search</li>
    	</ul>
    </div>
    <div id=list>
    	<?php
			echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
			echo "<tr><th width='10%'>ID</th><th>Images</th><th>Edit</th><th>Delete</th></tr>";

			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "aeroapps";
			
			$con = mysqli_connect($servername, $username, $password, $dbname);
			
			$message = "Are you sure?";

			$query = mysqli_query($con, "SELECT qID, qText FROM test_questions") or die(mysqli_error($con));
			if(mysqli_num_rows($query) > 0) {
    			while($row = mysqli_fetch_array($query)) {
        			echo "<tr><td style='outline: thin solid black'>".$row['qID']."</td>";
        			echo "<td style='outline: thin solid black'>".$row['qText']."</td>";
					echo "<td style='outline: thin solid black'><form action='editquestion.php' method='POST'><input type='hidden' name='tempEditID' value='".$row["qID"]."'/><input type='submit' name='edit-btn' value='Edit' /></form></td>";
					echo "<td style='outline: thin solid black'><form action='deletequestionprocess.php' method='POST' onSubmit=\"return confirm('Are you sure you want to delete?')\"><input type='hidden' name='tempDeleteID' value='".$row["qID"]."'/><input type='submit' name='delete-btn' value='Delete' /></form></td></tr>";
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