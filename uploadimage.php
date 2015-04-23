<!DOCTYPE html>

<!--
Top Comment
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
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
	
	<!-- JavaScript Tags -->
	<script type="text/javascript" src="javascript/loadNavbar.js"></script>

    <!-- Web Page Title -->
    <title>Upload File</title>

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
		<p id="title">Upload a file</p>
		
		<form id="uploadform" action="uploadimage.php" method="POST" enctype="multipart/form-data">
			File:
			<input type="file" name="image"> <input type="submit" value="Upload">
		</form>
		<br /><br /><br />
		
		<?php
		
		
		// connect to database
		include('connect/local-connect.php');
		
		// file properties
		$file = $_FILES['image']['tmp_name'];
		
		if (!isset($file)) 
			echo "Please select an image.";
		else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE)
				echo "That's not an image.";
			else {
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$image_name','$image')"))
					echo "Problem uploading image.";
				else
				{
					$lastid = mysql_insert_id();
					echo "Image uploaded.<p />Your image:<p /><img src=get.php?id=$lastid>";
				}
			}
		}
		
		
		?>
		
	</div>
	
	<div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>