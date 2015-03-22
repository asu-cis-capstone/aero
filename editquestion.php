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
		<p id="title">Edit a Question</p>
		
		<form id="questionform" action="demo_form.asp">
			<h2>Enter Question Information Below</h2>
			<label>Test</label> <input type="text" value="1111"><br />
			<label>Question ID</label> <input type="text"><br /> 
  			<label>Question Text:</label>
  			<textarea rows="5" cols="30"></textarea><br />
  			<label>Answer Choice A</label> <input type="text"><br />
  			<label>Answer Choice B</label> <input type="text"><br />
  			<label>Answer Choice C</label> <input type="text"><br />
  			<label>Correct Answer:</label>
  			<SELECT name="Single-line ListBox example">
			<OPTION selected value="A">A</OPTION>
			<OPTION value="B">B</OPTION>
			<OPTION value="C">C</OPTION>
			</SELECT><br /><br />
			<label>Learning Statement Code</label><br /> <input type="text"><br />
			<label>Reference Name</label> <input type="text"><br />
			<label>Upload an Image:</label> <input type="file" name="img">
  			<br />
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
	</div>
  </body>

</html>