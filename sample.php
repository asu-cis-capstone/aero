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
	
	("UPDATE test_answers SET answer = ".$answerRow[''].", aText = ".$answerRow[''].", bText = ".$answerRow[''].", cText = ".$answerRow[''].", qID = ".$answerRow[''].", exp = ".$answerRow[''].", expImgID1 = ".$answerRow[''].", expImgID2 = ".$answerRow[''].", expImgID3 = ".$answerRow[''].", expImgID4 = ".$answerRow[''].", expImgID5 = ".$answerRow[''].", editor = ".$editor.", timestamp = ".$timestamp." WHERE qID = '$qID'")
	
?>