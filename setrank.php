<?php
  
if (@$_GET['q'] == 'rankoptions') 
{
$eid = @$_GET['eid'];
if(isset($_POST['submit'])){
extract($_POST);



/* echo $firstrankr1;
echo $firstrankr2; */
$rank = array();
$rank = array($_POST);
$dd = json_encode($rank);
file_put_contents("ranking_system/$eid"."quizrank.json", $dd);
/* print_r($dd);
$rank = 1;
if($rank == $forthrankr1 || $rank <= $firstrankr1)
{ 
echo "YES";

}
else echo "NO";
}
}

function sendAmount($con, $seid)
{
$userid = $_SESSION['userid'];
$qq = "SELECT average, score, eid, username, @curRank := @curRank + 1 AS rank FROM score_average p, (SELECT @curRank := 0) r where eid = '$seid' ORDER BY average desc";
$pp = mysqli_query($con, $qq);
while($rr = mysqli_fetch_assoc($pp))
{
$rank = $rr['rank'];
$user = $rr['username'];
$eid = $rr['eid'];
$score = $rr['score'];
$pdf = "select username, eid from user_rank where username = '$_SESSION[username]' and eid = '$eid'";
$ldf = mysqli_query($con, $pdf); 
if(!mysqli_num_rows($ldf)>0)
{
$pdp = "insert into user_rank values(Null, '$rank', '$user', '$score', 'Unpaid', '$eid')";
$opp = mysqli_query($con, $pdp); 

}
}
$pddp = "select * from user_rank where username = '$_SESSION[username]' and eid = '$seid'";
$odpp = mysqli_query($con, $pddp); 

while($row = mysqli_fetch_assoc($odpp))
{
$rank = $row['rank'];
$user = $row['username'];
$score = $row['score'];

$rankeee = "select * from score_average where username = '$_SESSION[username]' and eid = '$seid' and status = 'processing'";
$rnks = mysqli_query($con, $rankeee); 
$file = file_get_contents("5e8604bd95ba1.json");
$dd = json_decode($file, true);

extract($dd);
echo $firstrankr2;

if($rank == $firstrankr1 || $rank <= $firstrankr2)
{ 
$deduct = "update user set earned = earned + '$firstrankprize' where id = '$_SESSION[userid]'; update user_registered_quiz set money_earned = '$firstrankprize', earned = 'YES' where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";
 mysqli_multi_query($con, $deduct);
 

}
elseif($rank == $secondrankr1 || $rank <= $secondrankr2)
{
	$deduct1 = "update user set earned = earned + '$secondrankprize' where id = '$_SESSION[userid]'; update user_registered_quiz set money_earned = '$secondrankprize', earned = 'YES' where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	mysqli_multi_query($con, $deduct1);
	
		
}
elseif($rank == $thirdrankr1 || $rank <= $thirdrankr2)
{
	$deduct2 = "update user set earned = earned + '$thirdrankprize' where id = '$_SESSION[userid]';  update user_registered_quiz set money_earned = money_earned + '$thirdrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	 mysqli_multi_query($con, $deduct2);
	 

}
elseif($rank == $forthrankr1 || $rank <= $forthrankr2)
{
	$deduct3 = "update user set earned = earned + '$forthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$forthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	mysqli_multi_query($con, $deduct3);

	
	
}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct4 = "update user set earned = earned + '$fifthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$fifthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	 mysqli_multi_query($con, $deduct4);

	
	
}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct5 = "update user set earned = earned + '$sixthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$sixthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct5 = "update user set earned = earned + '$seventhrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$seventhrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct5 = "update user set earned = earned + '$eigthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$eigthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct5 = "update user set earned = earned + '$ninthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$ninthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $forthrankr1 || $rank <= $thirdrankr2)
{
	$deduct5 = "update user set earned = earned + '$tenthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$tenthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
}

} */
header("Location:dash.php?q=0");
}
}

?>