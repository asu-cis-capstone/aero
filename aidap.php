<!DOCTYPE html>

<!--
Weather Page
-->

<?php
	// Start a PHP session
	session_name("logged");
	session_start("logged");
	
	// Check to see if user is NOT logged in to prevent unauthorized access
	if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'user')
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
    	<script>
    		loadNavbar();
    	</script> 
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
			
			// Table headers to organize the AIDAP infromation.
			echo "<table width='100%' cellspacing='6px' style='border: solid 1px black;'>";
			echo "<tr>";
			echo "<th>source_id</th>";
			echo "<th>notam_id</th>";
			echo "<th>xovernotamid</th>";
			echo "<th>notam_part</th>";
			echo "<th>icao_name</th>";
			echo "<th>total_parts</th>";
			echo "<th>notam_effective_dtg</th>";
			echo "<th>notam_expire_dtg</th>";
			echo "<th>notam_lastmod_dtg</th>";
			echo "<th>notam_text</th>";
			echo "<th>notam_report</th>";
			echo "<th>notam_qcode</th>";
			echo "</tr>";
			
			// This is the beginning of the table data that loops to organize AIDAP info
			// It is currently commented out because it causes a blank page if ran in its current state
			// Perhaps this looping table method does not need to be used since the xml parsing already loops
			/*
			while ()
			{
				echo '<tr>';
				echo '<td>COLUMN ONE</td>';
				echo '<td>COLUMN TWO</td>';
				echo '</tr>';
			}
			*/
			
			//This ends the table. No need to modify this. Please do not remove.
			echo '</table>';
		
			
			
			
			// This creates a SimpleXML Element Object
			// The "xpath" goes down one level on the tree
			// Then echoes every element of <notam-rec> (A single NOTAM)
			// NOTAM elements are stored into an array
			// This code already loops if there are multiple NOTAMS for one airport location
			$doc = new SimpleXMLElement($result);
			$valueList = $doc->xpath('/notam-query-result-set/notam-rec');
			while(list(, $node) = each($valueList)) {
    		$source_id = $node->xpath('source_id');
    		echo $source_id[0] . PHP_EOL . "<br/>";
    		$notam_id = $node->xpath('notam_id');
    		echo $notam_id[0] . PHP_EOL . "<br/>";
			$xovernotamid = $node->xpath('xovernotamid');
    		echo $xovernotamid[0] . PHP_EOL . "<br/>";
    		$notam_part = $node->xpath('notam_part');
    		echo $notam_part[0] . PHP_EOL . "<br/>";
    		$icao_name = $node->xpath('icao_name');
    		echo $icao_name[0] . PHP_EOL . "<br/>";
    		$total_parts = $node->xpath('total_parts');
    		echo $total_parts[0] . PHP_EOL . "<br/>";
    		$notam_effective_dtg = $node->xpath('notam_effective_dtg');
    		echo $notam_effective_dtg[0] . PHP_EOL . "<br/>";
    		$notam_expire_dtg = $node->xpath('notam_expire_dtg');
    		echo $notam_expire_dtg[0] . PHP_EOL . "<br/>";
    		$notam_lastmod_dtg = $node->xpath('notam_lastmod_dtg');
    		echo $notam_lastmod_dtg[0] . PHP_EOL . "<br/>";
    		$notam_text = $node->xpath('notam_text');
    		echo $notam_text[0] . PHP_EOL . "<br/>";
    		$notam_report = $node->xpath('notam_report');
    		echo $notam_report[0] . PHP_EOL . "<br/>";
    		$notam_qcode = $node->xpath('notam_qcode');
    		echo $notam_qcode[0] . PHP_EOL . "<br/>";
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
