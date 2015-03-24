<?php

$qImg1 = "Hello";
$qImg2 = "Hello";
$qImg3;
$qImg4;
$qImg5 = "Hello";

for ($x = 1; $x <= 5; $x++) 
	{
    	if (isset(${'qImg' . $x})) {
    		echo "This worked. Carry on.<br >";
    	}
    	else
    	{
    		echo "No value set for item ". $x .".<br >";
    	}
	} 	
	
?>