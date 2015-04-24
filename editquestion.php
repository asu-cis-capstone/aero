<!DOCTYPE html>

<!--
Edit Question Page for Aeroapps Technology
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

	<!-- Script tag-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>


    <!-- Web Page Title -->
    <title>Edit Question</title>

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
		<p id="title">Edit a Question</p>
		
		<?php
		$qID = $_POST['tempEditID'];
		
		echo '<form id="questionform" action="#" method="POST" enctype="multipart/form-data">
			<h2>Enter Question Information Below</h2>';
			
			
		
			// Set up db connection
			include('connect/local-connect.php');
	
			// This helps display special characters displayed on the web page
			mysql_set_charset('utf8');
			
	
			// Build the edit question query
			$questionQuery 	= "SELECT * FROM test_questions WHERE qID = '$qID'";
			$answerQuery 	= "SELECT * FROM test_answers WHERE qID = '$qID'";
		
			// Run the queries
			$questionResult 	= mysql_query($questionQuery) or die('Question read error!');
			$imageResult 		= mysql_query($answerQuery) or die('Answer read error!');
		
			// Fetch all elements of a table and store them as array
			$questionRow 	= mysql_fetch_array($questionResult);
			$answerRow 		= mysql_fetch_array($imageResult);
			
			$qImgID1 = $questionRow['qImgID1'];
			$qImgID2 = $questionRow['qImgID2'];
			$qImgID3 = $questionRow['qImgID3'];
			$qImgID4 = $questionRow['qImgID4'];
			$qImgID5 = $questionRow['qImgID5'];
			
			// Build/Run Image 1 Queries and fetch elements of table and store them as array
			$imageQuery1 	= "SELECT * FROM images WHERE id = '$qImgID1'";
			$imageResult1	= mysql_query($imageQuery1) or die('Image 1 read error!');
			$imageRow1 		= mysql_fetch_array($imageResult1);
			
			// Build/Run Image 2 Queries and fetch elements of table and store them as array
			$imageQuery2 	= "SELECT * FROM images WHERE id = '$qImgID2'";
			$imageResult2	= mysql_query($imageQuery2) or die('Image 2 read error!');
			$imageRow2 		= mysql_fetch_array($imageResult2);
			
			// Build/Run Image 3 Queries and fetch elements of table and store them as array
			$imageQuery3 	= "SELECT * FROM images WHERE id = '$qImgID3'";
			$imageResult3	= mysql_query($imageQuery3) or die('Image 3 read error!');
			$imageRow3 		= mysql_fetch_array($imageResult3);
			
			// Build/Run Image 4 Queries and fetch elements of table and store them as array
			$imageQuery4 	= "SELECT * FROM images WHERE id = '$qImgID4'";
			$imageResult4	= mysql_query($imageQuery4) or die('Image 4 read error!');
			$imageRow4 		= mysql_fetch_array($imageResult4);
			
			// Build/Run Image 5 Queries and fetch elements of table and store them as array
			$imageQuery5 	= "SELECT * FROM images WHERE id = '$qImgID5'";
			$imageResult5	= mysql_query($imageQuery5) or die('Image 5 read error!');
			$imageRow5		= mysql_fetch_array($imageResult5);
			
			// Query all images without an ID constraint. 
			// This will be used to generate the drop down list for all images in the database when selecting which image to be paired with a question. 
			$allImageQuery 	= "SELECT * FROM images";
			$allImageResult = mysql_query($allImageQuery) or die ('Image table read error!');
			
			echo '<label for="editor">Last Edited By:</label>';
			echo $questionRow['editor'];
			echo '<br>';
			echo '<label for="timestamp">Last Edit Time:</label>';
			echo $questionRow["edit_time"];
			echo '<br><br>';
			
			echo '<label for="oldqID"></label><input type="hidden" name="oldqID" value="'.$questionRow["qID"].'"></input>
			<label for="test">Test</label> <input type="text" name="test" formvalidate title="Please enter a Test for the Question" autofocus value="'.$questionRow["test"].'" /><br />
			<label for="newqID">Question ID</label> <input type="text" name="newqID" required title="Please enter an ID for the Question" value="'.$questionRow["qID"].'" /><br /> 
 			<label for="qText">Question Text:</label>
			<textarea name="qText" rows="5" cols="30" required />'.$questionRow["qText"].'</textarea><br />';
			?>
			<script>
			$("[name=select]").change(function(){
  $("#list").toggle($("[name=select]").index(this)===2);
});
$("[name=select2]").change(function(){
  $("#list2").toggle($("[name=select2]").index(this)===2);
});
			</script>
			
  			<label for="qImg1">Question Image 1:</label> 
     		<div id='buttons'>
  <label><input type="radio" name="select" /> Option 1 </label>
  <label><input type="radio" name="select" /> Option 2</label>
  <label><input type="radio" name="select" /> Option 3</label>
</div>
<div id="list" style="display: none;">
  <label>Please Select From the List: 
    <select>
      <option>True</option>
      <option>False</option>
    </select>
  </label>
</div>
<div id='buttons'>
  <label><input type="radio" name="select2" /> Option 1 </label>
  <label><input type="radio" name="select2" /> Option 2</label>
  <label><input type="radio" name="select2" /> Option 3</label>
</div>
<div id="list2" style="display: none;">
  <label>Please Select From the List: 
    <select>
      <option>True</option>
      <option>False</option>
    </select>
  </label>
</div>


            
  			<label for="qImg3">Question Image 3:</label> <input type="file" name="qImg3">
  			
  			<label for="qImg4">Question Image 4:</label> <input type="file" name="qImg4">
  			<label for="qImg5">Question Image 5:</label> <input type="file" name="qImg5"><br />'
  			
  			
  			<?php
  			echo '<label for="aText">Answer Choice A</label> <input type="text" name="aText" required value="'.$answerRow["aText"].'" /><br />
  			<label for="bText">Answer Choice B</label> <input type="text" name="bText" required value="'.$answerRow["bText"].'" /><br />
  			<label for="cText">Answer Choice C</label> <input type="text" name="cText" required value="'.$answerRow["cText"].'" /><br />
  			<label for="answer">Correct Answer:</label>
  			<SELECT name="answer">';
  			
			if ($answerRow["answer"] == "A")
			{
				echo '<OPTION selected value="A">A</OPTION>';
			}
			else
			{
				echo '<OPTION value="A">A</OPTION>';
			}
			if ($answerRow["answer"] == "B")
			{
				echo '<OPTION selected value="B">B</OPTION>';
			}
			else
			{
				echo '<OPTION value="B">B</OPTION>';
			}
			if ($answerRow["answer"] == "C")
			{
				echo '<OPTION selected value="C">C</OPTION>';
			}
			else
			{
				echo '<OPTION value="C">C</OPTION>';
			}
		
			
			echo '</SELECT><br />
			<label for="exp">Explanation:</label>
  			<textarea name="exp" rows="5" cols="30" required />'.$answerRow["exp"].'</textarea><br />
  			<label for="expImg1">Explanation Image 1:</label> <input type="file" name="expImg1">
  			<label for="expImg2">Explanation Image 2:</label> <input type="file" name="expImg2">
  			<label for="expImg3">Explanation Image 3:</label> <input type="file" name="expImg3">
  			<label for="expImg4">Explanation Image 4:</label> <input type="file" name="expImg4">
  			<label for="expImg5">Explanation Image 5:</label> <input type="file" name="expImg5"><br />
			<label for="ls_code">LS Code</label> <input type="text" name="ls_code" required value="'.$questionRow["ls_code"].'" /><br />
			<label for="refName">Reference Name</label> <input type="text" name="refName" required value="'.$questionRow["refName"].'" /><br />
			<label for="refPincite">Reference Pincite</label> <input type="text" name="refPincite" required value="'.$questionRow["refPincite"].'" /><br />';
			
			
			
			/*<!--
  			<label>Select Existing Image:</label>
  			<SELECT name="Single-line ListBox example">
			<OPTION selected value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			</SELECT><br />
			-->*/
 			
  			echo '<p class="submit">
			<input type ="submit" value="Submit Question" />
			
			<span class="reset">
				<input type="reset" value="Clear Everything" onclick="history.go(0)" />
			</span>
		</p>
		</form>	
		</center>';
		
		// Values from HTML
		$oldqID			= $_POST['oldqID'];
		$test 			= $_POST['test'];
		$newqID 		= $_POST['newqID'];
		$qText			= mysql_real_escape_string($_POST['qText']);
		$aText			= mysql_real_escape_string($_POST['aText']);
		$bText			= mysql_real_escape_string($_POST['bText']);
		$cText 			= mysql_real_escape_string($_POST['cText']);
		$answer 		= $_POST['answer'];
		$exp			= mysql_real_escape_string($_POST['exp']);
		$ls_code		= $_POST['ls_code'];
		$refName		= mysql_real_escape_string($_POST['refName']);
		$refPincite 	= mysql_real_escape_string($_POST['refPincite']);
		
		$editor 	= $_SESSION['name'];
		$now 		= time();
		date_default_timezone_set('MST');
		$timestamp 	= date('Y-m-d H:i:s', $now);
		
			
		// Build our SQL statement and Insert Values
		if (empty($_POST['test'])) 
		{
			echo "Please enter the question information.";
		}
		else
		{
			if (!$query = mysql_query("UPDATE test_questions SET qID = '$newqID', qText = '$qText', editor = '$editor', edit_time = '$timestamp' WHERE qID = '$oldqID'")) 
			{
				echo "There was a problem uploading question information.";
			}
			else {
				mysql_query("UPDATE test_answers SET answer = '$answer', aText = '$aText', bText = '$bText', cText = '$cText', qID = '$newqID', exp = '$exp', expImgID1 = '$expImgID1', expImgID2 = '$expImgID2', expImgID3 = '$expImgID3', expImgID4 = '$expImgID4', expImgID5 = '$expImgID5', editor = '$editor', edit_time = '$timestamp' WHERE qID = '$oldqID'");
				echo 'Edit Success!';
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
