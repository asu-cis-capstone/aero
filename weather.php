<!DOCTYPE html>

<!--
Weather Page
-->

<?php
	// Start a PHP session
	session_name("admin");
	session_start("admin");
	
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
    <title>Weather</title>

  </head>

  <body>
  	<div id="header">
		<p>
			<span class="left"><a href="menu.php"><img src="images/headerlogo.png" alt="Aeroapps Logo" /></a></span>
			<?php
			
			if (isset($_SESSION["admin"]))
			{
				echo '<span class="right">Welcome, ' . $_SESSION["admin"] . '!</span><br />';
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
			echo "<table cellspacing='6' cellpadding='4' border='0' width='700' style='border: solid 1px black;'>";
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
			

			echo "</table>";
			
			$string = <<<XML
			<!DOCTYPE notam-query-result-set [
<!ELEMENT notam-query-result-set (start-time, usns-lastmod-dtg, query-type,
query-parameter, notam-rec1, rec-count, end-time)>
<!ELEMENT start-time (#PCDATA)>
<!ELEMENT usns-lastmod-dtg (#PCDATA)>
<!ELEMENT query-type (#PCDATA)>
<!ELEMENT query-parameter (#PCDATA)>
<!ELEMENT notam-rec (source_id, account_id, notam_id, xoveraccountid2, xovernotamid2, notam_part,
cns_location_id, icao_id, icao_name2, total_parts, notam_cancel_dtg2, notam_effective_dtg2,
notam_expire_dtg2, notam_delete_dtg2, notam_lastmod_dtg, notam_text, notam_report, notam_nrc2,
notam_qcode2, notam_altkey3, series2, 3, originid2, 3, artcc_id2, 3, notam_origin_dtg3, create_dtg2 ,3, notam_a2,
3, notam_b2, 3, notam_c2, 3, notam_d2, 3, notam_e2, 3, notam_f2, 3, notam_g2, 3, notam_q2, 3)>
<!ELEMENT source_id (#PCDATA)>
<!ELEMENT account_id (#PCDATA)>
<!ELEMENT notam_id (#PCDATA)>
<!ELEMENT xoveraccountid (#PCDATA)>
<!ELEMENT xovernotamid (#PCDATA)>
<!ELEMENT notam_part (#PCDATA)>
<!ELEMENT cns_location_id (#PCDATA)>
<!ELEMENT icao_id (#PCDATA)>
<!ELEMENT icao_name (#PCDATA)>
<!ELEMENT total_parts (#PCDATA)>
<!ELEMENT notam_cancel_dtg (#PCDATA)>
<!ELEMENT notam_effective_dtg (#PCDATA)>
<!ELEMENT notam_expire_dtg (#PCDATA)>
<!ELEMENT notam_delete_dtg (#PCDATA)>
<!ELEMENT notam_lastmod_dtg (#PCDATA)>
<!ELEMENT notam_text (#PCDATA)>
<!ELEMENT notam_report (#PCDATA)>
<!ELEMENT notam_nrc (#PCDATA)>
<!ELEMENT notam_qcode (#PCDATA)>
<!ELEMENT notam_altkey (#PCDATA)>
<!ELEMENT series (#PCDATA)>
<!ELEMENT originid (#PCDATA)>
<!ELEMENT artcc_id (#PCDATA)>
<!ELEMENT notam_origin_dtg (#PCDATA)>
<!ELEMENT create_dtg (#PCDATA)>
<!ELEMENT notam_a (#PCDATA)>
<!ELEMENT notam_b (#PCDATA)>
<!ELEMENT notam_c (#PCDATA)>
<!ELEMENT notam_d (#PCDATA)>
<!ELEMENT notam_e (#PCDATA)>
<!ELEMENT notam_f (#PCDATA)>
<!ELEMENT notam_g (#PCDATA)>
<!ELEMENT notam_q (#PCDATA)>
<!ELEMENT rec-count (#PCDATA)>
<!ELEMENT end-time (#PCDATA)>
]>
XML;



		$url = "https://www.aidap.naimes.faa.gov/aidap/XmlNotamServlet HTTP/1.1";

		$post_data = array('xml' => $string);
		$stream_options = array(
    		'http' => array(
      		  'method'  => 'POST',
      		  'header'  => 'Content-type: application/x-www-form-urlencoded' . "\r\n",
     		   'content' =>  http_build_query($post_data)));

		$context  = stream_context_create($stream_options);
		$response = file_get_contents($url, null, $context);

		?>
    </div>

    <div id ="footer">
		<p>
			&copy;2015, Aeroapps Technology
		</p>
	</div>
	
  </body>

</html>