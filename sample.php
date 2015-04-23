<?php

include('connect/local-connect.php');

$futureTime = time()+60;

$selectQuery = mysql_query("SELECT * FROM users WHERE uType = 'test'");
$selectRow = mysql_fetch_assoc($selectQuery);

if (empty($selectRow['uType']))
{
	
}

$query = mysql_query("INSERT INTO users VALUES ('test','testname','testpass','')");
mysql_fetch_assoc($query);



?>