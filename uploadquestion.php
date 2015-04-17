<!DOCTYPE html>

<!--
Edit Question Page for Aeroapps Technology
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

    <!-- Web Page Title -->
    <title></title>

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
    	<ul id="navbar">
    		<li><a href="questions.php">Questions</a></li>
    		<li><a href="images.php">Images</a></li>
    		<li><a href="resources.php">Resources</a></li>
      		<li><a href="explanations.php">Explanations</a></li>
			<li><a href="aircrafts.php">Aircrafts</a></li>
			<li><a href="aidap.php">AIDAP</a></li>
    	</ul>
    </div>
	<div id="main">
		<center>
		<p id="title">Add a Question</p>
		
		<form id="questionform" action="uploadquestion.php" method="POST" enctype="multipart/form-data">
			<h2>Enter Question Information Below</h2>
			<label for="test">Test</label> <input type="text" name="test" required title="Please enter a Test for the Question" autofocus placeholder="Test..." /><br />
			<label for="qID">Question ID</label> <input type="text" name="qID" required title="Please enter an ID for the Question" placeholder="Question ID..." /><br /> 
  			<label for="qText">Question Text:</label>
  			<textarea name="qText" rows="5" cols="30" required placeholder="Question Text..." /></textarea><br />
  			<label for="qImg1">Question Image 1:</label> <input type="file" name="qImg1">
  			<label for="qImg2">Question Image 2:</label> <input type="file" name="qImg2">
  			<label for="qImg3">Question Image 3:</label> <input type="file" name="qImg3">
  			<label for="qImg4">Question Image 4:</label> <input type="file" name="qImg4">
  			<label for="qImg5">Question Image 5:</label> <input type="file" name="qImg5"><br />
  			<label for="aText">Answer Choice A</label> <input type="text" name="aText" required placeholder="Choice A..." /><br />
  			<label for="bText">Answer Choice B</label> <input type="text" name="bText" required placeholder="Choice B..." /><br />
  			<label for="cText">Answer Choice C</label> <input type="text" name="cText" required placeholder="Choice C..." /><br />
  			<label for="answer">Correct Answer:</label>
  			<SELECT name="answer">
			<OPTION selected value="A">A</OPTION>
			<OPTION value="B">B</OPTION>
			<OPTION value="C">C</OPTION>
			</SELECT><br />
			<label for="exp">Explanation:</label>
  			<textarea name="exp" rows="5" cols="30" required placeholder="Question Explanation..." /></textarea><br />
  			<label for="expImg1">Explanation Image 1:</label> <input type="file" name="expImg1">
  			<label for="expImg2">Explanation Image 2:</label> <input type="file" name="expImg2">
  			<label for="expImg3">Explanation Image 3:</label> <input type="file" name="expImg3">
  			<label for="expImg4">Explanation Image 4:</label> <input type="file" name="expImg4">
  			<label for="expImg5">Explanation Image 5:</label> <input type="file" name="expImg5"><br />
			<label for="ls_code">LS Code</label> <input type="text" name="ls_code" required placeholder="Learning Statement Code..." /><br />
			<label for="refName">Reference Name</label> <input type="text" name="refName" required placeholder="Reference Name..." /><br />
			<label for="refPincite">Reference Pincite</label> <input type="text" name="refPincite" required placeholder="Reference Pincite..." /><br />
			
			<!--
  			<label>Select Existing Image:</label>
  			<SELECT name="Single-line ListBox example">
			<OPTION selected value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			</SELECT><br />
			-->
 			
  			<p class="submit">
			<input type ="submit" value="Submit Question" />
			
			<span class="reset">
				<input type="reset" value="Clear Everything" onclick="history.go(0)" />
			</span>
		</p>
		</form>	
		</center>
		
		<?php
		
		include('connect/local-connect.php');
		
		// Values from HTML
		$test 			= $_POST['test'];
		$qID 			= $_POST['qID'];
		$qText			= mysql_real_escape_string($_POST['qText']);
		$file1			= $_FILES['qImg1']['tmp_name'];
		$file2			= $_FILES['qImg2']['tmp_name'];
		$file3			= $_FILES['qImg3']['tmp_name'];
		$file4			= $_FILES['qImg4']['tmp_name'];
		$file5			= $_FILES['qImg5']['tmp_name'];
		$aText			= mysql_real_escape_string($_POST['aText']);
		$bText			= mysql_real_escape_string($_POST['bText']);
		$cText 			= mysql_real_escape_string($_POST['cText']);
		$answer 		= $_POST['answer'];
		$exp			= mysql_real_escape_string($_POST['exp']);
		$file6			= $_FILES['expImg1']['tmp_name'];
		$file7			= $_FILES['expImg2']['tmp_name'];
		$file8			= $_FILES['expImg3']['tmp_name'];
		$file9			= $_FILES['expImg4']['tmp_name'];
		$file10			= $_FILES['expImg5']['tmp_name'];
		$ls_code		= $_POST['ls_code'];
		$refName		= mysql_real_escape_string($_POST['refName']);
		$refPincite 	= mysql_real_escape_string($_POST['refPincite']);
	
		// Initialize reference variables for questions tied to images. This is done to prevent multiple image uploads to db
		$qImgID1 = null;
		$qImgID2 = null;
		$qImgID3 = null;
		$qImgID4 = null;
		$qImgID5 = null;
		
		//Question Image 1 Upload
		if (!isset($file1)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Question Image
			$qImg1 			= addslashes(file_get_contents($_FILES['qImg1']['tmp_name']));
			$qImg1_name 	= addslashes($_FILES['qImg1']['name']);
			$qImg1_size 	= getimagesize($_FILES['qImg1']['tmp_name']);
			
			if ($qImg1_size==FALSE)
				echo "Nothing uploaded for Image 1 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg1_name','$qImg1')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$qImgID1 = $lastid;
				}
			}
		}	
		
		// Question Image 2 Upload
		if (!isset($file2)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Question Image
			$qImg2 			= addslashes(file_get_contents($_FILES['qImg2']['tmp_name']));
			$qImg2_name 	= addslashes($_FILES['qImg2']['name']);
			$qImg2_size 	= getimagesize($_FILES['qImg2']['tmp_name']);
			
			if ($qImg2_size==FALSE)
				echo "Nothing uploaded for Image 2 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg2_name','$qImg2')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$qImgID2 = $lastid;
				}
			}
		}	
			
		//Question Image 3 Upload
		if (!isset($file3)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Question Image
			$qImg3 			= addslashes(file_get_contents($_FILES['qImg3']['tmp_name']));
			$qImg3_name 	= addslashes($_FILES['qImg3']['name']);
			$qImg3_size 	= getimagesize($_FILES['qImg3']['tmp_name']);
			
			if ($qImg3_size==FALSE)
				echo "Nothing uploaded for Image 3 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg3_name','$qImg3')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$qImgID3 = $lastid;
				}
			}
		}
		
		//Question Image 4 Upload
		if (!isset($file4)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Question Image
			$qImg4 			= addslashes(file_get_contents($_FILES['qImg4']['tmp_name']));
			$qImg4_name 	= addslashes($_FILES['qImg4']['name']);
			$qImg4_size 	= getimagesize($_FILES['qImg4']['tmp_name']);
			
			if ($qImg4_size==FALSE)
				echo "Nothing uploaded for Image 4 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg4_name','$qImg4')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$qImgID4 = $lastid;
				}
			}
		}
			
		//Question Image 5 Upload
		if (!isset($file5)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Question Image
			$qImg5 			= addslashes(file_get_contents($_FILES['qImg5']['tmp_name']));
			$qImg5_name 	= addslashes($_FILES['qImg5']['name']);
			$qImg5_size 	= getimagesize($_FILES['qImg5']['tmp_name']);
			
			if ($qImg5_size==FALSE)
				echo "Nothing uploaded for Image 5 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$qImg5_name','$qImg5')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$qImgID5 = $lastid;
				}
			}
		}
		
		// Initialize reference variables for questions tied to images. This is done to prevent multiple image uploads to db
		$expImgID1 = null;
		$expImgID2 = null;
		$expImgID3 = null;
		$expImgID4 = null;
		$expImgID5 = null;
		
		//Explanation Image 1 Upload
		if (!isset($file6)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Explanation Image
			$expImg1 		= addslashes(file_get_contents($_FILES['expImg1']['tmp_name']));
			$expImg1_name 	= addslashes($_FILES['expImg1']['name']);
			$expImg1_size 	= getimagesize($_FILES['expImg1']['tmp_name']);
			
			if ($expImg1_size==FALSE)
				echo "Nothing uploaded for Image 6 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$expImg1_name','$expImg1')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$expImgID1 = $lastid;
				}
			}
		}	
		
		// Explanation Image 2 Upload
		if (!isset($file7)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Explanation Image
			$expImg2 		= addslashes(file_get_contents($_FILES['expImg2']['tmp_name']));
			$expImg2_name 	= addslashes($_FILES['expImg2']['name']);
			$expImg2_size 	= getimagesize($_FILES['expImg2']['tmp_name']);
			
			if ($expImg2_size==FALSE)
				echo "Nothing uploaded for Image 7 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$expImg2_name','$expImg2')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$expImgID2 = $lastid;
				}
			}
		}	
			
		//Explanation Image 3 Upload
		if (!isset($file8)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Explanation Image
			$expImg3 		= addslashes(file_get_contents($_FILES['expImg3']['tmp_name']));
			$expImg3_name 	= addslashes($_FILES['expImg3']['name']);
			$expImg3_size 	= getimagesize($_FILES['expImg3']['tmp_name']);
			
			if ($expImg3_size==FALSE)
				echo "Nothing uploaded for Image 8 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$expImg3_name','$expImg3')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$expImgID3 = $lastid;
				}
			}
		}
		
		//Explanation Image 4 Upload
		if (!isset($file9)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Explanation Image
			$expImg4 		= addslashes(file_get_contents($_FILES['expImg4']['tmp_name']));
			$expImg4_name 	= addslashes($_FILES['expImg4']['name']);
			$expImg4_size 	= getimagesize($_FILES['expImg4']['tmp_name']);
			
			if ($expImg4_size==FALSE)
				echo "Nothing uploaded for Image 9 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$expImg4_name','$expImg4')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$expImgID4 = $lastid;
				}
			}
		}
			
		//Explanation Image 5 Upload
		if (!isset($file10)) 
			echo " ";
		else 
		{
			// set image file names with appropriate database text
			// Explanation Image
			$expImg5 		= addslashes(file_get_contents($_FILES['expImg5']['tmp_name']));
			$expImg5_name 	= addslashes($_FILES['expImg5']['name']);
			$expImg5_size 	= getimagesize($_FILES['expImg5']['tmp_name']);
			
			if ($expImg5_size==FALSE)
				echo "Nothing uploaded for Image 10 or it was not an image file.<br>";
			else 
			{
				if (!$insert = mysql_query("INSERT INTO images VALUES ('','$expImg5_name','$expImg5')"))
				{
					echo "Problem uploading image.";
				}
				else
				{
					$lastid = mysql_insert_id();
					$expImgID5 = $lastid;
				}
			}
		}
		
		$editor 	= $_SESSION['name'];
		$now 		= time()
		date_default_timezone_set('MST');
		$timestamp 	= date('Y-m-d H:i:s', $now);
			
		// Build our SQL statement and Insert Values
		if (empty($_POST['test'])) 
		{
			echo "Please enter the question information.";
		}
		else
		{
			if (!$query = mysql_query("INSERT INTO test_questions VALUES('$test','$qID','$qText','$ls_code','$qImgID1','$qImgID2','$qImgID3','$qImgID4','$qImgID5','$refName','$refPincite','$editor','$timestamp')")) 
			{
				echo "There was a problem uploading question information.";
			}
			else {
				mysql_query("INSERT INTO test_answers VALUES('$answer','$aText','$bText','$cText','$qID','$exp','$expImgID1','$expImgID2','$expImgID3','$expImgID4','$expImgID5','$editor','$timestamp')");
				echo "Question information uploaded!";
			}
		}
	
		// Close the SQL connection
		mysql_close($dbc);
		
		?>
	</div>
	
	<div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>