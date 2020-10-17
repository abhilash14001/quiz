<?php
include 'dbConnection.php';
echo '<div id = "time_update"></div>';
if (@$_GET['q'] == 1) {

echo '<div>
<table class="table table-striped title1"  style="vertical-align:middle;
  margin-top: 40px;
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden; ">
<tr>
<td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Name</b></td>
<!--<td style="vertical-align:middle"><b>Total question</b></td>-->
<td style="vertical-align:middle"><b>Entry Fee</b></td>
<td style="vertical-align:middle"><b>Users</b></td>
<!--<td style="vertical-align:middle"><b>Time limit</b></td>-->
<td style="vertical-align:middle"><b>Prize Pool</b></td>
<td style="vertical-align:middle"><b>Action</b></td></tr>';


$d=1;
$sql = "select * from quiz where status = 'samplequiz' order by id desc";
$fetch = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($fetch)){
$stitle = $row['title'];
$stotal     = $row['total'];
$scorrect   = $row['correct'];
$fee =      $row['entry_fee'];
$swrong     = $row['wrong'];
$stime      = $row['time'];
$sdesc      = $row['description'];
$sprize     = $row['prize'];
$registered = $row['users_registered'];
$seid = $row['eid'];

echo '<tr class="well1"><td style="vertical-align:middle">' . $d++. '</td>
<td style="vertical-align:middle">' . $stitle . '</td>
<!--<td style="vertical-align:middle">' . $stotal . '</td>-->';

echo '<td style="vertical-align:middle"><b>NILL</b></td>';	
echo '<td style="vertical-align:middle">' . $registered . '/100</td>
<!--<td style="vertical-align:middle">' . $stime . '&nbsp;seconds</td>-->
<td style="vertical-align:middle"><b> NILL</b></td>
<td style="vertical-align:middle"><b>
<a href="account.php?q=samplequiz&step=2&eid=' . $seid . '&n=1&t=' . $stotal . '&start=start" class="btn start" id='.$userid.' style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px">
<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>
Start</b></span></a></td></tr>';
}
$qqstu = "select * from quiz WHERE status = 'enabled' order by start_time asc; select paid, time, total, correct, wrong, description, title, userid, status, prize from user_registered_quiz where paid='success'";
$pp = mysqli_multi_query($cone, $qqstu);
 $c  = $d-1;
do {
if ($resulted = mysqli_store_result($cone)) {

while ($rowe = mysqli_fetch_assoc($resulted)) 
{
 
$id        = $rowe['id'];
$pays      = $rowe['payment'];
$fee =     $rowe['entry_fee'];
$paid      = $rowe['paid'];
$title     = $rowe['title'];
$total     = $rowe['total'];
$correct   = $rowe['correct'];
$wrong     = $rowe['wrong'];
$time      = $rowe['time'];
$eid       = $rowe['eid'];
$registerede = $rowe['users_registered'];
$user_eid  = $rowe['eid'];
$desc      = $rowe['description'];
$prize     = $rowe['prize'];
$stat      = $rowe['status'];
$usudr     = $rowe['userid'];
$startime  = $rowe['start_time'];
$starttime = strtotime($startime);
$keid = $rowe['eid'];
    $current_time1 =  date('d-m-yy h:i:sa', strtotime('+1 minutes', strtotime($startime)));
 $onemin = strtotime($current_time1);
 $exact_time = strtotime($current_timee);
 if($exact_time < $onemin ){
     $c++;
 }

$y = "SELECT score FROM history WHERE eid='$eid' AND username='$username'";

$q1a2 = mysqli_query($con, $y) or die('Error98');
$rowcount = mysqli_num_rows($q1a2);
$pea = "SELECT * from user_registered_quiz WHERE userid='$_SESSION[userid]' and status ='enabled' and paid='success'";
$q13 = mysqli_query($con, $pea) or die('Error98');
$check = mysqli_num_rows($q13);

if ($rowcount == 0) {


if ($check > 0 ) {
		$ye = "SELECT eid FROM user_registered_quiz where status = 'enabled' and userid = '$_SESSION[userid]'";

$q1a3 = mysqli_query($con, $ye) or die('Error98');

while($seiddd = mysqli_fetch_assoc($q1a3))
{
    
     
$eeeid  = $seiddd['eid'];
if($keid == $eeeid)
{
    if($exact_time < $onemin )

    {
     
    $quii = "select users_registered from quiz where eid = '$eeeid'";
  $qled = mysqli_query($con, $quii) or die('Error98');
    $rwo = mysqli_fetch_assoc($qled);
   $reg = $rwo['users_registered'];
echo '<tr class="well1"><td style="vertical-align:middle">' . $c . '</td>
<td style="vertical-align:middle">' . $title . '</td>
<!--<td style="vertical-align:middle">' . $total . '</td>-->
<td style="vertical-align:middle"><b><font style ="color:green">paid</font></b></td>
<td style="vertical-align:middle">'.$reg.'/100</td>
<!--<td style="vertical-align:middle">' . $time . '&nbsp;seconds</td>-->
<td style="center">' . $prize . '</td>
<td style="vertical-align:middle">
<b><b><a href = "account.php?q=4" class = "btn btn-success">
Registered</a></b></td>
     </tr>';
}
}
}
}

if ($starttime >= $current_time) {
$oo     = "select * from user_registered_quiz where eid= '$eid' && userid = '$userid'";
$ooere  = mysqli_query($con, $oo);
$exists = (mysqli_num_rows($ooere));
if (!$exists) {
echo '<tr class="well1"><td style="vertical-align:middle">' . $c . '</td>
<td style="vertical-align:middle">' . $title . '</td>
<!--<td style="vertical-align:middle">' . $total . '</td>-->';
if($fee == 0)
{
echo '<td style="vertical-align:middle; color:green; font-style:bold" ><b>Free</b></td>';

}
else{
echo '<td style="vertical-align:middle"><b>' . $fee . '</b></td>';	

}
echo '<td style="vertical-align:middle">' . $registerede.'/100</td>
<!--<td style="vertical-align:middle">' . $time . '&nbsp;seconds</td>-->
<td style="vertical-align:middle"><b> ' . $prize . ' </b></td>
<td style="vertical-align:middle"><b>';
if(!($registerede >100))
{
	echo '
<span id="demo' . $id . '"></span>
';}
echo '
<form method="GET" action="payu/index.php">';
echo '	
<input type="hidden" name = "eid" value= ' . $eid . '>
<input type="hidden" name = "wallet" value= "' . $wallet . '">
<input type="hidden" name = "title" value= "' . $title . '">
<input type="hidden" name = "correct" value= ' . $correct . '>
<input type="hidden" name = "wrong" value= ' . $wrong . '>
<input type="hidden" name = "total" value= ' . $total . '>
<input type="hidden" name = "time" value= ' . $time . '>
<input type="hidden" name = "start_time" value= "' . $startime . '">
<input type="hidden" name = "prize" value= ' . $prize . '>
<input type="hidden" name = "desc" value= ' . $desc . '>
<input type="hidden" name = "status" value= ' . $stat . '>
<input type="hidden" name = "fees" value= ' . $fee. '>';
$amountdf = "select * from user where username = '$_SESSION[username]'";
$deduct = mysqli_query($con, $amountdf);
$row= mysqli_fetch_assoc($deduct);

$wallet = $row['wallet'];
$tickets = $row['tickets'];
$tikstatus = $row['tickets_status'];
if(!($registerede > 100))
{

echo '<button type="submit"  name="register_now" class = "btn btn-primary btn btn-sm">';
echo 'Register<br>Now </button>';
if($tickets > 0 && $tikstatus == 'claimed')
{ echo '<b>OR</b>
	
<button class = "btn btn-primary" name = "fee" type = "submit">Play with<br> tickets<br> '.$tickets.' tickets left</button>';}
echo '</form></td>
    </tr>';
}

else{
echo '<button type="button"  name="register_now" class = "btn btn-danger btn btn-md">
Registrations Closed</button>
</td></tr>';	
}	
}
}
} 
else {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$eid' ") or die('Errorfg197');
while ($row = mysqli_fetch_array($q)) {
$timec  = $row['timestamp'];
$status = $row['status'];
}

$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error19df7');
while ($row = mysqli_fetch_array($q)) {
$ttimec  = $row['time'];
$qstatus = $row['status'];
}
$remaining = (($ttimec * 60 ) - ((time() - $timec)));

if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") {
echo '<tr style="color:darkgreen" class="well1">
<td style="vertical-align:middle">' . $c++ . '</td>
<!--<td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solved by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>-->
<!--<td style="vertical-align:middle">' . $total . '</td>-->
<td style="vertical-align:middle"><b>' . $_SESSION['fee'] = $fee . '</b></td>
<td style="vertical-align:middle">' . $registerede.'/100</td>
<!--<td style="vertical-align:middle">' . $time . '&nbsp;seconds</td>-->
<td style="vertical-align:middle"><b> ' . $prize . ' </b></td>
<td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" style="margin:0px;background:darkorange;color:white">&nbsp;<span class="title1"><b>Continue</b></span></a></b></td></tr>
';
} 
}
}
mysqli_free_result($resulted);
}
} while (mysqli_next_result($cone));

$c = 0;
echo '</table></div><div class="well" style="padding-top:1px;padding:05px;word-wrap:break-word"><h3 align="center" style="font-family:calibri">:: General Instructions ::</h3><br /><ul type="circle"><font style="font-size:14px;font-family:calibri">';
$file = fopen("instructions.txt", "r");

while (!feof($file)) {
echo '<li>';
$string = fgets($file);
$num    = strlen($string);
$c      = str_split($string);
for ($i = 0; $i < $num; $i++) {
$last = $c[$i];
if ($c[$i] == ' ' && $last == ' ') {
echo '&nbsp;';
} else {
echo $c[$i];
}
}
echo "</li><br />";
} 

fclose($file);
echo '</font></ul></div>';

}
?>