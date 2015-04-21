<!DOCTYPE html>

<!--
Weather Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	// Check to see if user is NOT logged in to prevent unauthorized access
	/*if (!isset($_SESSION["logged"]))
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
    <title>AIDAP NOTAM Query</title>

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
	<div id="title">AIDAP NOTAM Query</div>

    <div id=list>
    	<form id="joinform" action="#" method="POST">
    		<p>Enter Location ID Below:</p>
    		<input type="text" placeholder="Location ID..." name="location" id="location" autofocus></input>
    		
    		<p class="submit">
			<input type="submit" value="Submit"/>
			</p>
    	</form>
    	<br/>
    	<?php
		// connect to database
		include('connect/local-connect.php');
		
		$location = '';
		$location = $_POST['location'];
	
		
		$urlNew = 'https://www.aidap.naimes.faa.gov/aidap/XmlNotamServlet?uid=aeroapps&password=Diode1234!&location_id='.$location;
		
		if ($location == '') {
			echo '<center>Please enter an airport location.</center>';
		}
		else {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSLCERT, 'file.crt.pem');
			curl_setopt($ch, CURLOPT_SSLKEY, 'file.key.pem');
			curl_setopt($ch, CURLOPT_SSLCERTPASSWD, 'naimes2015');
			curl_setopt($ch, CURLOPT_SSLKEYPASSWD, 'naimes2015');
			curl_setopt($ch, CURLOPT_URL, $urlNew);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$result = curl_exec($ch);
		
			
			
			$xml = simplexml_load_string($result);
			if ($xml === false) {
    			echo "Failed loading XML: ";
    			foreach(libxml_get_errors() as $error) {
        		echo "<br>", $error->message;
    			}
			} 
				else 
				{
					echo $xml->usns-lastmod-dtg . "<br>";
					
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
