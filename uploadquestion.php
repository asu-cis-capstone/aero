<!DOCTYPE html>

<!--
Edit Question Page for Aeroapps Technology
-->

<html lang ="en">
  	
  <head>
    <!-- Meta tag -->
    <meta name="robots" content="noindex,nofollow" />
    <meta charset = "utf-8"> 

    <!-- Link tag for CSS -->
	<link type="text/css" rel="stylesheet" href="stylesheets/style.css" />

    <!-- Web Page Title -->
    <title></title>

  </head>

  <body>
	<div id="header">
		<p>
			<span class="left"><a href="menu.php"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></a></span>
			<span class="right">Welcome, Admin</span><br />
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
	<div id="main">
		<center>
		<p id="title">Add a Question</p>
		
		<form id="questionform" action="uploadquestion.php" method="post">
			<h2>Enter Question Information Below</h2>
			<label for="test">Test</label> <input type="text" name="test"><br />
			<label for="qID">Question ID</label> <input type="text" name="qID"><br /> 
  			<label for="qText">Question Text:</label>
  			<textarea name="qText" rows="5" cols="30"></textarea><br />
  			<label for="qImg1">Question Image 1:</label> <input type="file" name="qImg1">
  			<label for="qImg2">Question Image 2:</label> <input type="file" name="qImg2">
  			<label for="qImg3">Question Image 3:</label> <input type="file" name="qImg3">
  			<label for="qImg4">Question Image 4:</label> <input type="file" name="qImg4">
  			<label for="qImg5">Question Image 5:</label> <input type="file" name="qImg5"><br />
  			<label for="aText">Answer Choice A</label> <input type="text" name="aText"><br />
  			<label for="bText">Answer Choice B</label> <input type="text" name="bText"><br />
  			<label for="cText">Answer Choice C</label> <input type="text" name="cText"><br />
  			<label>Correct Answer:</label>
  			<SELECT name="Single-line ListBox example">
			<OPTION selected value="A">A</OPTION>
			<OPTION value="B">B</OPTION>
			<OPTION value="C">C</OPTION>
			</SELECT><br />
			<label for="ls_code">LS Code</label> <input type="text" name="ls_code"><br />
			<label for="refName">Reference Name</label> <input type="text" name="refName"><br />
			<label for="refPincite">Reference Pincite</label> <input type="text" name="refPincite"><br />
  			<label>Select Existing Image:</label>
  			<SELECT name="Single-line ListBox example">
			<OPTION selected value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			</SELECT><br />
 			
  			<p class="submit">
			<input type ="submit" value="Submit Question" />
			
			<span class="reset">
				<input type="reset" value="Clear Everything" onclick="history.go(0)" />
			</span>
		</p>
		</form>	
		</center>
		
		<?php
		
		mysql_connect("localhost","root","root") or die(mysql_error());
		mysql_select_db("aeroapps") or die(mysql_error());
		
		// Values from HTML
		$test 			= $_POST['test'];
		$qID 			= $_POST['qID'];
		$qText			= mysqli_real_escape_string($dbc, $_POST['qText']);
		$aText			= mysqli_real_escape_string($dbc, $_POST['aText']);
		$bText			= mysqli_real_escape_string($dbc, $_POST['bText']);
		$cText 			= mysqli_real_escape_string($dbc, $_POST['cText']);
		$ls_code		= $_POST['ls_code'];
		$refName		= mysqli_real_escape_string($dbc, $_POST['refName']);
		$refPincite 	= mysqli_real_escape_string($dbc, $_POST['refPincite']);
	
	
		
	
		// Initialize reference variables for questions tied to images. This is done to prevent multiple image uploads to db
		$qImgID1;
		$qImgID2;
		$qImgID3;
		$qImgID4;
		$qImgID5;
			
		// file properties
		$file1			= $_FILES['qImg1']['tmp_name'];
		$file2			= $_FILES['qImg2']['tmp_name'];
		$file3			= $_FILES['qImg3']['tmp_name'];
		$file4			= $_FILES['qImg4']['tmp_name'];
		$file5			= $_FILES['qImg5']['tmp_name'];
		
		for ($x = 1; $x <= 5; $x++) 
		{
			if (!isset(${'file' . $x})) 
				echo ".";
			else 
			{
				// set image file names with appropriate database text
				// Question Image
				${'qImg' . $x} 				= addslashes(file_get_contents($_FILES['qImg'. $x]['tmp_name']));
				${'qImg' . $x . '_name'} 	= addslashes($_FILES['qImg' . $x]['name']);
				${'qImg' . $x . '_size'} 	= getimagesize($_FILES['qImg' . $x]['tmp_name']);
			
				if (${'qImg' . $x . '_size'}==FALSE)
					echo "That's not an image.";
				else 
				{
					if (!$insert = mysql_query("INSERT INTO images VALUES ('','" . ${'qImg' . $x . '_name'} . "','" . ${'qImg' . $x} . "')"))
					{
						echo "Problem uploading image.";
					}
					else
					{
						$lastid = mysql_insert_id();
						${'qImgID' . $x} = $lastid;
					}
				}
			}	
		}
			
			
			
			
			
			
			
			
			
			
			
			
			
		/*	
		// loop through each image. This checks if any file was uploaded for each slot, uploads image, and assigns its ID reference to question
		for ($x = 1; $x <= 5; $x++) 
		{
    		if (isset(${'file' . $x})) {
    			if (${'qImg' . $x . '_size'}==FALSE)
					echo "One or more files chosen to upload for Question Images is not an image.";
				else 
				{
					if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg". $x ."_name','$qImg". $x ."')"))
						echo "Problem uploading question image(s).";
					else
					{
						$lastid = mysql_insert_id();
						${'qImgID' . $x} = $lastid;
						echo "Image(s) uploaded.";
					}
				}
    		}
    		else
    		{
    		
    		}
		} 
		*/	
	
		// Build our SQL statement and Insert Values
		if (empty($_POST['test'])) 
		{
			echo "Please enter the question information.";
		}
		else
		{
			if (!$query = mysql_query("INSERT INTO test_questions VALUES('$test','$qID','$qText','$ls_code','$qImgID1','$qImgID2','$qImgID3','$qImgID4','$qImgID5','$refName','$refPincite')")) {
				echo "There was a problem uploading question information.";
			}
			else {
				echo "Question information uploaded!";
			}
		}
	
		// Close the SQL connection
		mysql_close($dbc);
		
		?>
	</div>
  </body>

</html>