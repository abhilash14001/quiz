<?php

if(isset($_POST['id'])){
	include "dbConnection.php";
$fetch = mysqli_query($con, "select eid, id from quiz where id = '$_POST[id]'");
while($row = mysqli_fetch_assoc($fetch)){
	extract($row);
	$file = file_get_contents("ranking_system/$eid"."quizrank.json");
	$get  = json_decode($file, true);
	
foreach($get as $getting){	
extract($getting);
echo '<table class="table table-striped table-bordered" style="font-size: 14px;" >
<td ><b>Rank</b></td>
<td ><b>Prize</b></td>

</tr>
<tr><td>'.$firstrankr1.'
';
if(!empty($firstrankr2)){
	echo
'-' . $firstrankr2; 
} echo '
</td>
<td>'.$firstrankprize.'</td>

</tr>
'; if(!empty($secondrankr1)){ 
echo'<tr><td>'.$secondrankr1.'
';
if(!empty($secondrankr2)){
	echo
'-' . $secondrankr2; 
	 }

echo '


</td>
<td>'.$secondrankprize.'</td>
</tr>
';
}
if(!empty($thirdrankr1)){ 
echo'<tr><td>'.$thirdrankr1.'
';
if(!empty($thirdrankr2)){
	echo
'-' . $thirdrankr2;
}
echo '

</td>
<td>'.$thirdrankprize.'</td>
</tr>
';
}

if(!empty($forthrankr1))
{ echo '
<tr><td>'.$forthrankr1.'
';
if(!empty($forthrankr2))
{
	echo
'-' . $forthrankr2; 
}
echo '


</td>
<td>'.$forthrankprize.'</td>
</tr>
';
}
if(!empty($fifthrankr1)){ echo '<tr><td>'.$fifthrankr1.'
';
if(!empty($fifthrankr2)){
	echo
'-' . $fifthrankr2; 
}

echo '


</td>
<td>'.$fifthrankprize.'</td>
</tr>
';
}

if(!empty($sixthrankr1))
{
echo	'
<tr><td>'.$sixthrankr1.'
';
if(!empty($sixthrankr2)){
	echo
'-' . $sixthrankr2; 
}

echo '


</td>
<td>'.$sixthrankprize.'</td>
</tr>
';
}

if(!empty($seventhrankr1)){
echo	'
<tr><td>'.$seventhrankr1.'
';
if(!empty($seventhrankr2)){
	echo
'-' . $seventhrankr2; 
}
echo '


</td>
<td>'.$seventhrankprize.'</td>
</tr>
';
}
if(!empty($eigthrankr1)){
echo	'
<tr><td>'.$eigthrankr1.'
';
if(!empty($eigthrankr2)){
	echo
'-' . $eigthrankr2; 
}
echo '


</td>
<td>'.$eigthrankrprize.'</td>
</tr>
';
}
if(!empty($ninthrankr1))
{
	echo'
<tr><td>'.$ninthrankr1.'
';
if(!empty($ninthrankr2)){
	echo
'-' . $ninthrankr2; 
}

echo '


</td>
<td>'.$ninthrankprize.'</td>
</tr>
';
}
if(!empty($tenthrankr1))
{ 
	echo '
<tr><td>'.$tenthrankr1.'
';
if(!empty($tenthrankr2)){
	echo
'-' . $tenthrankr2; 
}
echo '


</td>
<td>'.$tenthrankprize.'</td>
</tr>';
}
}
}
}

