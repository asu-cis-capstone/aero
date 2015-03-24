<?php
	// questionprocess.php 
	
	// Connect to the db (LOCAL OR SERVER)
	mysql_connect("localhost","root","root") or die(mysql_error());
	mysql_select_db("aeroapps") or die(mysql_error());
	
	// Values from HTML
	$test 			= $_POST['test'];
	$qID 			= $_POST['qID'];
	$qText			= mysqli_real_escape_string($dbc, $_POST['qText']);
	$file1			= $_FILES['qImg1']['tmp_name'];
	$file2			= $_FILES['qImg2']['tmp_name'];
	$file3			= $_FILES['qImg3']['tmp_name'];
	$file4			= $_FILES['qImg4']['tmp_name'];
	$file5			= $_FILES['qImg5']['tmp_name'];
	$aText			= mysqli_real_escape_string($dbc, $_POST['aText']);
	$bText			= mysqli_real_escape_string($dbc, $_POST['bText']);
	$cText 			= mysqli_real_escape_string($dbc, $_POST['cText']);
	$ls_code		= $_POST['ls_code'];
	$refName		= mysqli_real_escape_string($dbc, $_POST['refName']);
	$refPincite 	= mysqli_real_escape_string($dbc, $_POST['refPincite']);
	
	
	// set image file names with appropriate database text
	// Question Image 1
	$qImg1 = addslashes(file_get_contents($_FILES['qImg1']['tmp_name']));
	$qImg1_name = addslashes($_FILES['qImg1']['name']);
	$qImg1_size = getimagesize($_FILES['qImg1']['tmp_name']);
	
	// Question Image 2
	$qImg2 = addslashes(file_get_contents($_FILES['qImg2']['tmp_name']));
	$qImg2_name = addslashes($_FILES['qImg2']['name']);
	$qImg2_size = getimagesize($_FILES['qImg2']['tmp_name']);
	
	// Question Image 3
	$qImg3 = addslashes(file_get_contents($_FILES['qImg3']['tmp_name']));
	$qImg3_name = addslashes($_FILES['qImg3']['name']);
	$qImg3_size = getimagesize($_FILES['qImg3']['tmp_name']);
	
	// Question Image 4
	$qImg4 = addslashes(file_get_contents($_FILES['qImg4']['tmp_name']));
	$qImg4_name = addslashes($_FILES['qImg4']['name']);
	$qImg4_size = getimagesize($_FILES['qImg4']['tmp_name']);
	
	// Question Image 5
	$qImg5 = addslashes(file_get_contents($_FILES['qImg5']['tmp_name']));
	$qImg5_name = addslashes($_FILES['qImg5']['name']);
	$qImg5_size = getimagesize($_FILES['qImg5']['tmp_name']);
	
	// Initialize reference variables for questions tied to images. This is done to prevent multiple image uploads to db
	$qImgID1 = 0;
	$qImgID2 = 0;
	$qImgID3 = 0;
	$qImgID4 = 0;
	$qImgID5 = 0;
			
	// loop through each image. This checks if any file was uploaded for each slot, uploads image, and assigns its ID reference to question
	for ($x = 1; $x <= 5; $x++) 
	{
    	if (isset(${'file' . $x})) {
    		if (${'qImg' . $x . '_size'}==FALSE)
				echo "One or more files chosen to upload for Question Images is not an image.";
			else 
			{
				if (!$insert = mysqli_query("INSERT INTO images VALUES ('','$qImg". $x ."_name','$qImg". $x ."')"))
					echo "Problem uploading question image(s).";
				else
				{
					$lastid = mysqli_insert_id();
					${'qImgID' . $x} = $lastid;
					echo "Image(s) uploaded.";
				}
			}
    	}
    	else
    	{
    		
    	}
	} 	
	
	// Build our SQL statement
	$query	= 
	"INSERT INTO test_questions VALUES ('$test', '$qID', '$qText', '$ls_code', '$qImgID1', '$qImgID2', '$qImgID3', '$qImgID4', '$qImgID5', '$refName', '$refPincite')";
	
	// Run the query
	$result = mysqli_query($query) or die('Unable to write to DB!');
	
	// Close the SQL connection
	mysqli_close($dbc);
	
	header('Location: uploadquestion.php');
	
	
?>