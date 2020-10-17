<?php error_reporting($level = null);

function start(){
$_SESSION['start_time'] = time();
}	
	
function sampleStart(){
$_SESSION['start_time_sample'] = time();
}
	
function rankTest($con, $file){
$eid = $_GET['eid'];
$username = $_SESSION['username'];
$oc= mysqli_query($con, "select sum(score) from user_answer where ans=correctans && username = '$username' && eid ='$eid'");
$poi = mysqli_fetch_assoc($oc);
$ts = $poi['sum(score)'];
$ts  = round($ts);
$oo = "select avg(score) from user_answer where ans = correctans && username = '$username' && eid= '$eid'";
$ooq =  mysqli_query($con, $oo);
$oop=mysqli_fetch_assoc($ooq);
$avg = $oop['avg(score)'];
$userid = $_SESSION['userid'];

$INS = "insert into score_average values(NULL, '$eid', NOW() + INTERVAL 750 MINUTE,  '$username', '$ts', '$avg', 'processing'); update user_registered_quiz set status= 'finished' where userid = '$userid' && eid = '$eid'; update history set score = '$avg' where eid = '$eid' and username = '$_SESSION[username]'";
$mm  = mysqli_multi_query($con, $INS);

if(file_exists($file))
{
$username = $_SESSION['username'];
$current = file_get_contents("$username.json");
$data = json_decode($current, true);
}
if(isset($_SESSION['eid']))
{
$response2 = array( 
'eid' =>
array(

"eid" =>
"$_SESSION[eid]", 
"username" => "$username"
)
);		
$data[] = $response2;
$gandu = json_encode($data);
file_put_contents("$username.json", "$gandu");

}

}


function sampleRankTest($con){
$eid = $_GET['eid'];
$username = $_SESSION['username'];
$oc= mysqli_query($con, "select sum(score) from user_answer where ans=correctans && username = '$username' && eid ='$eid'");
$poi = mysqli_fetch_assoc($oc);
$ts = $poi['sum(score)'];
$ts  = round($ts);
$oo = "select avg(score) from user_answer where ans = correctans && username = '$username' and eid = '$eid'";
$ooq =  mysqli_query($con, $oo);
$oop=mysqli_fetch_assoc($ooq);
$avg = $oop['avg(score)'];
$userid = $_SESSION['userid'];

$INS = "insert into score_average values(NULL, '$eid', NOW() + INTERVAL 750 MINUTE,  '$username', '$ts', '$avg', 'processing'); update history set score = '$avg' where eid = '$eid' and username = '$_SESSION[username]'";
$mm  = mysqli_multi_query($con, $INS);
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

$pdp = "insert into user_rank values(Null, '$rank', '$user', '$score', NOW() + INTERVAL 750 MINUTE, 'Unpaid', '$eid')";
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
$file = file_get_contents("ranking_system/$seid"."quizrank.json");

$dd = json_decode($file, true);


foreach($dd as $dds){
extract($dds);



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
elseif($rank == $fifthrankr1 || $rank <= $fifthrankr2)
{
	$deduct4 = "update user set earned = earned + '$fifthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$fifthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	 mysqli_multi_query($con, $deduct4);

	
	
}
elseif($rank == $sixthrankr1 || $rank <= $sixthrankr2)
{
	$deduct5 = "update user set earned = earned + '$sixthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$sixthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $seventhrankr1 || $rank <= $seventhrankr2)
{
	$deduct5 = "update user set earned = earned + '$seventhrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$seventhrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $eigthrankr1 || $rank <= $eigthrankr2)
{
	$deduct5 = "update user set earned = earned + '$eigthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$eigthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $ninthrankr1 || $rank <= $ninthrankr2)
{
	$deduct5 = "update user set earned = earned + '$ninthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$ninthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
elseif($rank == $tenthrankr1 || $rank <= $tenthrankr2)
{
	$deduct5 = "update user set earned = earned + '$tenthrankprize' where username = '$username';  update user_registered_quiz set money_earned = money_earned + '$tenthrankprize', earned = 'YES'  where userid = '$userid' and eid='$eid'; update score_average set status = 'Done' where username = '$_SESSION[username]'";	
	  mysqli_multi_query($con, $deduct5);
	  

}
}
}
unlink("$_SESSION[username].json");
$file = $_SESSION['username'] . 'time_taken';
unlink("$file.json"); 
//unlink("$seid"."quizrank.json"); 
}

function addTickets($con, $userid)
{
	$queryeerer = mysqli_query($con, "select tickets, tickets_status from user where id = '$userid'");
	
	$fetch = mysqli_fetch_assoc($queryeerer);
	$tickets = $fetch['tickets'];	
	$ticketstatus = $fetch['tickets_status'];
	if($tickets == 2 && $ticketstatus == 'unclaimed')
	{
	
	mysqli_query($con, "update user set tickets_status = 'claimed' where id = '$userid'");
	echo '<script>alert("Successfully claimed 2 tickets");</script>';
	echo '<script> window.location = "account.php?q=5"</script>';
	
	
}	
}
function updateWalletTicket($con, $userid)
{
$ss = "select * from quiz inner join user_registered_quiz on user_registered_quiz.eid = quiz.eid inner join user on user_registered_quiz.userid = user.id where userid = '$userid'";
$fetch= mysqli_query($con, $ss);
while($query = mysqli_fetch_assoc($fetch)){
extract($query);
if(($tobereg == 2 || $tobereg == 5) && $tickets < 2 && $tickets_status == 'claimed' && $tickets_used == 'YES')
{
   
$qq = "update user set tickets = tickets + 1 where id = '$userid'; update user_registered_quiz set paid = 'tickets_refund' where userid = '$userid' and status = 'enabled' and paid = 'success'";
$dd = mysqli_multi_query($con, $qq);	
}
if($tobereg == 2  && $paid == 'success')
	{
		$dd .= mysqli_multi_query($con, "update user set wallet = wallet + '$entry_fee' where id= '$userid'; update user_registered_quiz set paid = 'entry_fee_refunded' where userid = '$userid' and status = 'enabled' and paid = 'success'");	
	}
	elseif($tobereg == 5 && $paid == 'success')
	{
		$dd .= mysqli_multi_query($con, "update user set wallet = wallet + '$entry_fee' where id= '$userid'; update user_registered_quiz set paid = 'entry_fee_refunded' where userid = '$userid' and status = 'enabled' and paid = 'success'");		
	}
}
	
	return $dd;
}


?>