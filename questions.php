<!DOCTYPE html>

<!--
Questions Page
-->



<html lang ="en">
  	
  <head>
    <!-- Meta tag -->
    <meta name="robots" content="noindex,nofollow" />
    <meta charset = "utf-8"> 

    <!-- Link tag for CSS -->
	<link type="text/css" rel="stylesheet" href="stylesheets/style.css" />

    <!-- Web Page Title -->
    <title>Questions</title>

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
    		<li><a href="questions.html">Questions</a></li>
    		<li><a href="images.html">Images</a></li>
    		<li><a href="resources.html">Resources</a></li>
      		<li><a href="explanations.html">Explanations</a></li>
   			<li><a href="aircrafts.html">Aircrafts</a></li>
    	</ul>
    </div>
	<div id="title">Questions</div>
	<div id="selection">
    	<ul id="options">
    		<li><a href="uploadquestion.html">Add</a></li>
    		<li>Search</li>
    	</ul>
    </div>
    <div id=list>
    	<?php
			echo "<table style='border: solid 1px black;'>";
<<<<<<< Updated upstream
			echo "<tr><th width='10%'>ID</th><th>Question Text</th><th width='8%'>Edit</th><th width='8%'>Delete</th></tr>";
=======
			echo "<tr><th>Question Id</th><th>Question Text</th></tr>";
>>>>>>> Stashed changes

			class TableRows extends RecursiveIteratorIterator { 
    			function __construct($it) { 
        			parent::__construct($it, self::LEAVES_ONLY);
    			}

    			function current() {
        			return "<td style='width:1000px;border:1px solid black;'>" . parent::current(). "</td>";
    			}

    			function beginChildren() { 
        			echo "<tr>"; 
    			} 

    			function endChildren() { 
        			echo "</tr>" . "\n";
    			} 
			} 

			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "aeroapps";

			try {
    			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$stmt = $conn->prepare("SELECT qID, qText FROM test_questions"); 
    			$stmt->execute();

    			// set the resulting array to associative
    			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    			foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        			echo $v;
    			}
			}
			catch(PDOException $e) {
    			echo "Error: " . $e->getMessage();
			}
			$conn = null;
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