<!DOCTYPE html>

<!--
Upload Resource Page for Aeroapps Technology
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	// Check to see if user is NOT logged in to prevent unauthorized access
	if($_SESSION['type'] == 'admin')
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
    <title>Upload Resource</title>

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
    
	<div id="resourcelist">
		<p id="title">Upload Resource</p>
		
		<form id="uploadform" method="post" enctype="multipart/form-data">
			Please select .pdf and .txt files only
			<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
				<tr> 
				<td width="246">
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<input name="userfile" type="file" id="userfile"> 
				</td>
				<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
				</tr>
			</table>
		</form>
		<br/>
		
		<?php
			include ('connect/local-connect.php');
			
			if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
			{
				$fileName = $_FILES['userfile']['name'];
				$tmpName  = $_FILES['userfile']['tmp_name'];
				$fileSize = $_FILES['userfile']['size'];
				$fileType = $_FILES['userfile']['type'];

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);

			if(!get_magic_quotes_gpc())
			{
    			$fileName = addslashes($fileName);
			}
			
			$editor 	= $_SESSION['name'];
			$now 		= time();
			date_default_timezone_set('MST');
			$timestamp 	= date('Y-m-d H:i:s', $now);

			$query = "INSERT INTO resources (name, size, type, content, editor, edit_time ) ".
			"VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$editor', '$timestamp')";
			
			// Add spacing so text reports appear under the form
			echo '<br /><br />';

			mysql_query($query) or die('Error, upload failed'); 
			mysql_close($dbc);

			echo "<br>File $fileName uploaded<br>";
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