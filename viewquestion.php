<!DOCTYPE html>

<!--
View Question Page for Aeroapps Technology
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
    <title>View Question</title>


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
			<li><a href="weather.php">Weather</a></li>
    	</ul>
    </div>
	<div id="main">
		<center>
		<p id="title">View Question</p>
		
		<form id="questionform" action="#" method="POST" enctype="multipart/form-data">
			
			<?php
		
			// Set up db connection
			include('connect/local-connect.php');
	
			// PHP variables for the HTML elements
			$qID = $_POST['tempViewID'];
			
	
			// Build the edit question query
			$questionQuery 	= "SELECT * FROM test_questions WHERE qID = '$qID'";
			$answerQuery 	= "SELECT * FROM test_answers WHERE qID = '$qID'";
		
			// Run the queries
			$questionResult 	= mysql_query($questionQuery) or die('Question read error!');
			$imageResult 		= mysql_query($answerQuery) or die('Answer read error!');
		
			// Fetch all elements of a table and store them as array
			$questionRow 	= mysql_fetch_array($questionResult);
			$answerRow 		= mysql_fetch_array($imageResult);
			
			$faaQuery 		= "SELECT * FROM faa WHERE ls_code = '".$questionRow['ls_code']."'";
			$faaResult 		= mysql_query($faaQuery) or die('FAA read error!');
			$faaRow			= mysql_fetch_array($faaResult);
			
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
			
			$expImgID1 = $answerRow['expImgID1'];
			$expImgID2 = $answerRow['expImgID2'];
			$expImgID3 = $answernRow['expImgID3'];
			$expImgID4 = $answerRow['expImgID4'];
			$expImgID5 = $answerRow['expImgID5'];
			
			// Build/Run Image 1 Queries and fetch elements of table and store them as array
			$expImageQuery1 	= "SELECT * FROM images WHERE id = '$expImgID1'";
			$expImageResult1	= mysql_query($expImageQuery1) or die('Explanation Image 1 read error!');
			$expImageRow1 		= mysql_fetch_array($expImageResult1);
			
			// Build/Run Image 2 Queries and fetch elements of table and store them as array
			$expImageQuery2 	= "SELECT * FROM images WHERE id = '$expImgID2'";
			$expImageResult2	= mysql_query($expImageQuery2) or die('Explanation Image 2 read error!');
			$expImageRow2 		= mysql_fetch_array($expImageResult2);
			
			// Build/Run Image 3 Queries and fetch elements of table and store them as array
			$expImageQuery3 	= "SELECT * FROM images WHERE id = '$expImgID3'";
			$expImageResult3	= mysql_query($expImageQuery3) or die('Explanation Image 3 read error!');
			$expImageRow3 		= mysql_fetch_array($expImageResult3);
			
			// Build/Run Image 4 Queries and fetch elements of table and store them as array
			$expImageQuery4 	= "SELECT * FROM images WHERE id = '$expImgID4'";
			$expImageResult4	= mysql_query($expImageQuery4) or die('Explanation Image 4 read error!');
			$expImageRow4 		= mysql_fetch_array($expImageResult4);
			
			// Build/Run Image 5 Queries and fetch elements of table and store them as array
			$expImageQuery5 	= "SELECT * FROM images WHERE id = '$expImgID5'";
			$expImageResult5	= mysql_query($expImageQuery5) or die('Explanation Image 5 read error!');
			$expImageRow5		= mysql_fetch_array($expImageResult5);
			
			
			echo '<p>Question #'.$qID.'</p>';
			echo '<p>Test: '.$questionRow['test'].'</p>';
			echo '<p>Subject: '.$faaRow['subj'].'</p>';
			echo '<p>Topic: '.$faaRow['topic'].'</p>';
			echo '<p>'.$questionRow['qText'].'</p>';
			echo '<div class="">';
			echo 'A: '.$answerRow['aText'].'<br />';
			echo 'B: '.$answerRow['bText'].'<br />';
			echo 'C: '.$answerRow['cText'].'<br />';
			echo '</div>';
			if ($imageRow1['id'] != 0)
			{
				echo "<p><img src=get.php?id=".$imageRow1['id']." width='400px'>";
			}
			else
			{
				echo '';
			}
			
			
			?>
			
			<script type="text/javascript"> 
			function showHide(divId){
    			var theDiv = document.getElementById(divId);
    			if(theDiv.style.display=="none"){
        			theDiv.style.display="";
    			}else{
        			theDiv.style.display="none";
    			}    
			}
			</script>
			<br />
			<input type="button" onclick="showHide('hidethis')" value="Show/Hide Answer"> 
			<div id="hidethis" style="display:none">
			<?php
				
				echo '<p>Answer: '.$answerRow['answer'].'</p>';
				if ($answerRow['exp'] != '')
				{
					echo '<p>Explanation:<br />'.$answerRow['exp'].'</p>';
				}
				else
				{
					echo '<p>Explanaion: No Explanation provided.</p>';
				}
				if ($expImageRow1['id'] != 0)
				{
					echo "<p><img src=get.php?id=".$expImageRow1['id']." width='400px'>";
				}
				else
				{
					echo '';
				}
				
			?>
			</div>
			
  			
		</form>	
		</center>
	</div>
	
	<div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
  </body>

</html>