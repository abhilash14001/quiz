<?php error_reporting(0);
session_start();
if(isset($_SESSION['6e447159425d2d']))
{
$start_time = $_SESSION['start_time']; // start time;
$from_time =  time(); // current time;

echo $differences = $from_time - $start_time;
    $exp = microtime(true);
		$exper = explode(".", $exp);
		
if(!($differences >= 10)){
	
		$newmicrotime = $exper[1]; 
	 $difference = $newmicrotime ;

$scores=  $differences . "." . $difference;
   $maxtime = 10;
		$levelscore =100;
		$scorees = ($maxtime - $scores) * $levelscore; 

$file = "$_SESSION[username]"."time_taken";
$array[] = array("sec" => "$scores",
"score" => "$scorees");
$return = json_encode($array);
file_put_contents("$file.json", "$return");
}
}
 else
 {
	 $sample_start_time = $_SESSION['start_time_sample']; // start time;
$froms_time =  time(); // current time;

$difference = $froms_time - $sample_start_time;
    $exp = microtime(true);
		$exper = explode(".", $exp);
if(!($difference >= 10)){
	
		$newmicrotime = $exper[1]; 
	 $differencedf = $newmicrotime ;

$secs =  $difference . "." . $differencedf;
   $maxtime = 10;
		$levelscore =100;
		$sco = ($maxtime - $secs) * $levelscore; 


$files = "$_SESSION[username]"."sample_time_taken";

$array[] = array("sec" => "$secs",
"score" => "$sco");
$return = json_encode($array);
file_put_contents("$files.json", "$return");
}
}
?>