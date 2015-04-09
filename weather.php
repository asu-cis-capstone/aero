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
    <title>Weather</title>

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
	<div id="title">Weather</div>

    <div id=list>
    	<?php
			/*echo "<table cellspacing='6' cellpadding='4' border='0' width='700' style='border: solid 1px black;'>";
			echo "<tr align='center'>
							<th style= 'outline: thin solid black' rowspan='3' width='17'>D<br>a<br>t<br>e</th>
							<th style= 'outline: thin solid black' rowspan='3' width='32'>Time<br>(mst)</th>
							<th style= 'outline: thin solid black' rowspan='3' width='80'>Wind<br>(mph)</th>
							<th style= 'outline: thin solid black' rowspan='3' width='40'>Vis.<br>(mi.)</th>
							<th style= 'outline: thin solid black' rowspan='3' width='80'>Weather</th>
							<th style= 'outline: thin solid black' rowspan='3' width='65'>Sky Cond.</th>
							<th style= 'outline: thin solid black' colspan='4'>Temperature (&ordm;F)</th>
							<th style= 'outline: thin solid black' rowspan='3' width='65'>Relative<br>Humidity</th>
							<th style= 'outline: thin solid black' rowspan='3' width='80'>Wind<br>Chill<br>(&deg;F)</th>
							<th style= 'outline: thin solid black' rowspan='3' width='80'>Heat<br>Index<br>(&deg;F)</th>
							<th style= 'outline: thin solid black' colspan='2'>Pressure</th>
							<th style= 'outline: thin solid black' colspan='3'>Precipitation (in.)</th></tr>
							<tr align='center'>
							<th style= 'outline: thin solid black' rowspan='2' width='45'>Air</th>
							<th style= 'outline: thin solid black' rowspan='2' width='26'>Dwpt</th>
							<th style= 'outline: thin solid black' colspan='2'>6 hour</th>
							<th style= 'outline: thin solid black' rowspan='2' width='40'>altimeter<br>(in)</th>
							<th style= 'outline: thin solid black' rowspan='2' width='40'>sea level<br>(mb)</th>
							<th style= 'outline: thin solid black' rowspan='2' width='24'>1 hr</th>
							<th style= 'outline: thin solid black' rowspan='2' width='24'>3 hr</th>
							<th style= 'outline: thin solid black' rowspan='2' width='30'>6 hr</th></tr>";

			include('connect/local-connect.php');
			

			echo "</table>";*/
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.aidap.naimes.faa.gov/aidap/XmlNotamServlet?uid=aeroapps&password=Diode1234!&location_id=KCHD');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$result = curl_exec($ch);
			echo $result;

		?>
    </div>

    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
	
  </body>

</html>