<?php
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
//Request hash
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
if(strcasecmp($contentType, 'application/json') == 0){
$data = json_decode(file_get_contents('php://input'));
$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
$json=array();
$json['success'] = $hash;
echo json_encode($json);

}
exit(0);
}
$amt  =  "20";
date_default_timezone_set('Asia/Kolkata');
$current_timee = date("d-m-yy h:i:sa");
$current_time = strtotime($current_timee);
function getCallbackUrl()
{
	$mm =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   $expe =explode('account.php?', $mm);
	$nammm= $expe[0];
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $nammm .'response.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- BOLT Sandbox 
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" ></script>-->
<!-- BOLT Production/Live -->
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524"></script>
<script type="text/javascript" src="timer/LIB/jquery-2.0.3.js"></script>
<script type="text/javascript" src="timer/jquery.countdownTimer.js"></script>
<link rel="stylesheet" type="text/css" href="timer/CSS/jquery.countdownTimer.css" />
<script>
$(document).ready(function(){
$(function(){
	$("#given_date").countdowntimer({
       starttime : <?php echo date('d-m-yy H:i:sa'); ?>,
       dateAndTime : "2024/01/01 00:00:00"‚ //end date		
	   size : "xs",
	});
});
});
</script>
<style type="text/css">
.main {
margin-left:230px;

font-family:Verdana, Geneva, sans-serif, serif;
}
.text {
float:left;
width:180px;
}
.dv {
height:40px;
margin-bottom:5px;
}
.custom
{
	display:inline-block;
	margin-left	:300px;
	margin-top:20px;
}
</style>
<title>Quiz || Quizzer </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
if (@$_GET['w']) {
echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
	
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Quizzer</span></div>
<div class="col-md-4 col-md-offset-2">
<?php
include_once 'dbConnection.php';
session_start();
$userid = $_SESSION['userid'];

if (!(isset($_SESSION['username']))) {
header("location:index.php");
} else {
$name     = $_SESSION['name'];
$username = $_SESSION['username'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $username . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}
$iii = "select * from user where id = '$userid'";
$res=$con->query($iii);
$row=$res->fetch_assoc();
$wallet = $row['wallet'];
$earned = $row['earned'];
?>

</div>
</div></div>

<div class="bg">

<nav class="navbar navbar-default title1">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#" style= "margin-left:750px"><b></b></a>
</div>
<div class="custom"><b><h5><i class = "fa fa-google-wallet"></i> Wallet Balance : <?php echo $wallet; ?>
	<br><br><i class = "fa fa-money"></i>Earned Money &nbsp;: <?php echo $earned; ?>
	</h5></b></div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
<ul class="nav navbar-nav">
<li <?php
if (@$_GET['q'] == 1)
echo 'class="active"';
?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
<li <?php
if (@$_GET['q'] == 2)
echo 'class="active"';
?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;My History</a></li>
<li <?php
if (@$_GET['q'] == 3)
echo 'class="active"';
?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Leaderboard</a></li>
<li <?php
if (@$_GET['q'] == 4)
echo 'class="active"';
?>><a href="account.php?q=4"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;Your Registered Quiz</a></li></ul>



</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php error_reporting($level= null);

if (@$_GET['q'] == 1) {

$result = mysqli_query($con, "SELECT * FROM quiz WHERE status = 'enabled' ORDER BY date DESC") or die('Error');
echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Description</b></td><td style="vertical-align:middle"><b>Correct Answer</b></td><td style="vertical-align:middle"><b>Wrong Answer</b></td><td style="vertical-align:middle"><b>Total Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td><td style="vertical-align:middle"><b>Prize</b></td></tr>';

$c = 1;
while ($row = mysqli_fetch_array($result)) 
{
$id = $row['id'];
$pays = $row['payment'];
$title   = $row['title'];
$total   = $row['total'];
$correct = $row['correct'];
$wrong   = $row['wrong'];
$time    = $row['time'];
$eid     = $row['eid'];
$desc   =$row['description'];
$prize = $row['prize'];
$stat = $row['status'];
$startime = $row['start_time'];
$starttime = strtotime($startime);
$q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND username='$username'") or die('Error98');
$rowcount = mysqli_num_rows($q12);
$oeire = "select * from user_registered_quiz where eid = '$eid'";	
$po  = mysqli_query($con, $oeire);
while($row = mysqli_fetch_assoc($po))
{
$pay = $row['payment'];
$userids = $row['userid'];
}
if ($rowcount == 0) {

if($starttime >= $current_time && $pays!= 'success')
{

echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $desc. '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b>Quiz Starts at '.$startime.' </b><br><form method="POST" action="amount.php"><button type="submit" name="register_now" class = "btn btn-primary btn btn-sm"><input type="hidden" name = "eid" value= '.$eid.'><input type="hidden" name = "title" value= "'.$title.'"><input type="hidden" name = "correct" value= '.$correct.'><input type="hidden" name = "wrong" value= '.$wrong.'><input type="hidden" name = "total" value= '.$total.'><input type="hidden" name = "time" value= '.$time.'><input type="hidden" name = "date" value= '.$date.'><input type="hidden" name = "start_time" value= "'.$startime.'"><input type="hidden" name = "prize" value= '.$prize.'><input type="hidden" name = "desc" value= '.$desc.'><input type="hidden" name = "status" value= '.$stat.'><input type="hidden" name = "payment" value= '.$payment.'>Register Now</button></form><span id="given_date"></span></td><td style="vertical-align:middle"><b> '.$prize.' </b></td></tr>';
}

elseif($pay == 'success' && $userids == $_SESSION['userid'])
{
echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $desc. '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b><b><a href = "account.php?q=4" class = "btn btn-success">You have already registered</a></b></td><td style="center">' . $prize . '</td></tr>';
}

elseif($pay!='success' && $userid == $_SESSION['userid']) {
echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $desc. '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b><b>Registration Expired</b></td><td style="center">' . $prize . '</td></tr>';	
	
}
} else {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$eid' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$timec  = $row['timestamp'];
$status = $row['status'];
}

$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttimec  = $row['time'];
$qstatus = $row['status'];
}
$remaining = (($ttimec * 60) - ((time() - $timec)));
if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") {
echo '<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $desc. '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" style="margin:0px;background:darkorange;color:white">&nbsp;<span class="title1"><b>Continue</b></span></a></b></td></tr>';


} else {
echo '<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $desc. '</td><td style="vertical-align:middle">+' . $correct . '</td><td style="vertical-align:middle">-' . $wrong . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></span></a></b></td><td style="vertical-align:middle"><b> '.$prize.' </b></td></tr>';
}
}
}
$c = 0;
echo '</table></div><div class="panel" style="padding-top:1px;padding-left:15%;padding-right:15%;word-wrap:break-word"><h3 align="center" style="font-family:calibri">:: General Instructions ::</h3><br /><ul type="circle"><font style="font-size:14px;font-family:calibri">';
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
<?php /* error_reporting($level=null); */
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && $_GET['endquiz'] == 'end') {
unset($_SESSION['6e447159425d2d']);
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "UPDATE user_registered_quiz SET status='finished' WHERE userid='$_SESSION[userid]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$scorestatus = $row['score_updated'];
}
if($scorestatus=="false"){
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
header('location:account.php?q=result&eid=' . $_GET[eid]);
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d']))) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');

if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$timel  = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttimel  = $row['time'];
$qstatus = $row['status'];
}
$remaining = (($ttimel * 60) - ((time() - $timel)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$_SESSION['6e447159425d2d'] = "6e447159425d2d";
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[t]);

} else {
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$scorestatus = $row['score_updated'];
}
if($scorestatus=="false"){
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
header('location:account.php?q=result&eid=' . $_GET[eid]);
}

} else {
$time = time();
$q = mysqli_query($con, "INSERT INTO history VALUES(NULL,'$username','$_GET[eid]' ,'0','0','0','0',NOW(),'$time','ongoing','false')") or die('Error137');
$_SESSION['6e447159425d2d'] = "6e447159425d2d";
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[t]);
}
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d") {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');

if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}
$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time = $row['timestamp'];
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttime = $row['time'];
$eid = $row['eid'];
}
$remaining = (($ttime * 60) - ((time() - $time)));
$rdemaining = (($ttime * 60) - ((time() - $time)));

echo '<input type="hidden" id="eid" value = '.$eid.'>';
echo '<script>
var seconds = ' . $remaining . ' ;
function end(){
data = prompt("Are you sure to end this Quiz? Remember, once finished, you wont be able to continue anymore and final results will be displayed. If you want to continue then enter \\"yes\\" in the textbox below and press enter");
if(data=="yes"){
window.location ="account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[total] . '&endquiz=end";
}
}
function enable(){
document.getElementById("sbutton").removeAttribute("disabled");

}
function frmreset(){
document.getElementById("sbutton").setAttribute("disabled","true");
document.getElementById("qform").reset();
}
function secondPassed() {
var minutes = Math.round((seconds - 30)/60);
var remainingSeconds = seconds % 60;
if (remainingSeconds < 10) {
remainingSeconds = "0" + remainingSeconds; 
}
document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
if (seconds <= 0) {
clearInterval(countdownTimer);
document.getElementById(\'countdown\').innerHTML = "Buzz Buzz...";
window.location ="account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[total] . '&endquiz=end";
} else {    
seconds--;
}
}

var countdownTimer = setInterval(\'secondPassed()\', 1000);
</script>';
echo '<script>
var second = 0 ;
var eid = document.getElementById("eid").value;
function secondPased() {
var minutes = Math.round((second - 30)/60);
var remainingSeconds = second % 60;
if (remainingSeconds < 10) {
remainingSeconds = "0" + remainingSeconds; 
}
document.getElementById(\'countup\').innerHTML = minutes + ":" +    remainingSeconds;
second++;
$.ajax({
	url:"time_taken.php",
	data:{second:second, eid:eid},
	dataType:"html",
	type:"POST",
	
});

}

var countdownTimer = setInterval(\'secondPased()\', 1000);
</script>';

echo '<font size="3" style="margin-left:100px;font-family:\'typo\' font-size:20px; font-weight:bold;color:darkred">Time Left : </font>
<span class="timer btn btn-default" style="margin-left:20px;">
<font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font></span>
<input type="hidden" id="countup">
<span class="timer btn btn-primary" style="margin-left:50px" onclick="end()">
<span class=" glyphicon glyphicon-off"></span>&nbsp;&nbsp;
<font style="font-size:12px;font-weight:bold">Finish Quiz '.$sec.'
</font></span>';
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$q     = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
echo '<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px">';
while ($row = mysqli_fetch_array($q)) {
$qns = stripslashes($row['qns']);
$qid = $row['qid'];
echo '<b><pre style="background-color:white"><div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px">' . $sn . ' : ' . $qns . '</div></pre></b>';
}
echo '<form id="qform" action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
<br />';
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]'") or die("Error222");
if (mysqli_num_rows($q) > 0) {
$row = mysqli_fetch_array($q);
$ans = $row['ans'];
$q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
$row = mysqli_fetch_array($q);
$ans = $row['option'];
} else {
$ans = "";
}
if (strlen($ans) > 0) {
echo "<font style=\"color:green;font-size:12px;font-weight:bold\">Selected answer: </font><font style=\"color:#565252;font-size:12px;\">" . $ans . "</font>&nbsp;&nbsp;<a href=update.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&qid=$qid&delanswer=delanswer><span class=\"glyphicon glyphicon-remove\" style=\"font-size:12px;color:darkred\"></span></a><br /><br />";
}
echo '<div class="funkyradio">';
$q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
while ($row = mysqli_fetch_array($q)) {
$option   = stripslashes($row['option']);
$optionid = $row['optionid'];
echo '<div class="funkyradio-success"><input type="radio" id="' . $optionid . '" name="ans" value="' . $optionid . '" onclick="enable()"> <label for="' . $optionid . '" style="width:50%"><div style="color:black;font-size:12px;word-wrap:break-word">&nbsp;&nbsp;' . $option . '</div></label></div>';
}
echo '</div>';
if ($_GET[t] > $_GET[n] && $_GET[n] != 1) {
echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
} else if ($_GET[t] == $_GET[n]) {
echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"  style="font-size:12px"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';
} else if ($_GET[t] > $_GET[n] && $_GET[n] == 1) {
echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:12px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold"> Lock<font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
} else {
}
echo '</div>';
echo '<div class="panel" style="text-align:center">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die("Error222");
$i = 1;
while ($row = mysqli_fetch_array($q)) {
$ques[$row['qid']] = $i;
$i++;
}
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die("Error222a");
$i = 1;
while ($row = mysqli_fetch_array($q)) {
if (isset($ques[$row['qid']])) {
$quesans[$ques[$row['qid']]] = true;
}
}
for ($i = 1; $i <= $total; $i++) {
echo '<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '"  style="margin:5px;padding:5px;background-color:';
if ($quesans[$i]) {
echo "darkgreen";
} else {
echo "darkred";
}
echo ';color:white;font-size:16px;font-family:calibri;border-radius:4px">&nbsp;' . $i . '&nbsp;</a>';
}
} else {
unset($_SESSION['6e447159425d2d']);
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$scorestatus = $row['score_updated'];
}
if($scorestatus=="false"){
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
header('location:account.php?q=result&eid=' . $_GET[eid]);
}
} else {
unset($_SESSION['6e447159425d2d']);
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$scorestatus = $row['score_updated'];
}
if($scorestatus=="false"){
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
header('location:account.php?q=result&eid=' . $_GET[eid]);
}
}
if (@$_GET['q'] == 'result' && @$_GET['eid']) {
$eid = @$_GET['eid'];
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error157');
while ($row = mysqli_fetch_array($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error157');

while ($row = mysqli_fetch_array($q)) {
$s      = $row['score'];
$w      = $row['wrong'];
$r      = $row['correct'];
$status = $row['status'];
}
if ($status == "finished") {
echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
echo '<tr style="color:darkblue"><td style="vertical-align:middle">Total Questions</td><td style="vertical-align:middle">' . $total . '</td></tr>
<tr style="color:darkgreen"><td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
<tr style="color:red"><td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
<tr style="color:orange"><td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
<tr style="color:darkblue"><td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
$q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error157');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
}
echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$question = $row['qns'];
$qid      = $row['qid'];
$q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
if (mysqli_num_rows($q2) > 0) {
$row1         = mysqli_fetch_array($q2);
$ansid        = $row1['ans'];
$correctansid = $row1['correctans'];
$q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_array($q3);
$row3       = mysqli_fetch_array($q4);
$ans        = $row2['option'];
$correctans = $row3['option'];
} else {
$q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
$row1         = mysqli_fetch_array($q3);
$correctansid = $row1['ansid'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_array($q4);
$correctans = $row2['option'];
$ans        = "Unanswered";
}
if ($correctans == $ans && $ans != "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} 
else if ($ans == "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} 
else {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';

}
echo "<br /></li>";
}
echo '</ol>';
echo "</div>";
} else {
die("Thats a 404 Error bro. You are trying to access a wrong page");
}
}
if (@$_GET['q'] == 2) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND status='finished' ORDER BY date DESC ") or die('Error197');
echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Quiz</b></td><td style="vertical-align:middle"><b>Total Questions</b></td><td style="vertical-align:middle"><b>Right</b></td><td style="vertical-align:middle"><b>Wrong<b></td><td style="vertical-align:middle"><b>Unattempted<b></td><td style="vertical-align:middle"><b>Score</b></td><td style="vertical-align:middle"><b>Action<b></td></tr>';
$c = 0;
while ($row = mysqli_fetch_array($q)) {
$eid = $row['eid'];
$s   = $row['score'];
$w   = $row['wrong'];
$r   = $row['correct'];
$q23 = mysqli_query($con, "SELECT * FROM quiz WHERE  eid='$eid' ") or die('Error208');
while ($row = mysqli_fetch_array($q23)) {
$title = $row['title'];
$total = $row['total'];
}
$c++;
echo '<tr><td style="vertical-align:middle">' . $c . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $r . '</td><td style="vertical-align:middle">' . $w . '</td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></td></tr>';
}
echo '</table></div>';
}
if (@$_GET['q'] == 3) {
if(isset($_GET['show'])){
$show = $_GET['show'];
$showfrom = (($show-1)*10) + 1;
$showtill = $showfrom + 9;
}
else{
$show = 1;
$showfrom = 1;
$showtill = 10;
}
$q = mysqli_query($con, "SELECT * FROM rank") or die('Error223');
echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Score</b></td></tr>';
$c = $showfrom-1;
$total = mysqli_num_rows($q);
if($total >= $showfrom){
$q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
while ($row = mysqli_fetch_array($q)) {
$e = $row['username'];
$s = $row['score'];
$q12 = mysqli_query($con, "SELECT * FROM user WHERE username='$e' ") or die('Error231');
while ($row = mysqli_fetch_array($q12)) {
$name     = $row['name'];
$branch   = $row['branch'];
$username = $row['username'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
}
}
else{
}
echo '</table></div>';
echo '<div class="panel title"><table class="table table-striped title1" ><tr>';
$total = round($total/10) + 1;
if(isset($_GET['show'])){
$show = $_GET['show'];
}
else{
$show = 1;
}
if($show == 1 && $total==1){
}
else if($show == 1 && $total!=1){
$i = 1;
while($i<=$total){
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
$i++;
}
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
}
else if($show != 1 && $show==$total){
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

$i = 1;
while($i<=$total){
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
$i++;
}
}
else{
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
$i = 1;
while($i<=$total){
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
$i++;
}
echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="account.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
}
echo '</tr></table></div>';
}


if (@$_GET['q'] == 4)
{
$m = "select * from user_registered_quiz where userid = '$userid' && payment= 'success' && eid='$eid'";
$mmmk = mysqli_query($con, $m);
$i =  0;
while($row = mysqli_fetch_assoc($mmmk))
{
	$i++;
$title = $row['title'];
$total = $row['total'];
$desc = $row['description'];
$correct =$row['correct'];
$wrong = $row['wrong'];
$time = $row['time'];
$prize=$row['prize'];
$eid = $row['eid'];
echo '
<div class="panel">
<table class="table table-striped title1"  style="vertical-align:middle">
<tr>
<td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Name</b></td>
<td style="vertical-align:middle"><b>Total question</b></td>
<td style="vertical-align:middle"><b>Description</b></td>
<td style="vertical-align:middle"><b>Correct Answer</b></td><td style="vertical-align:middle"><b>Wrong Answer</b></td><td style="vertical-align:middle"><b>Total Marks</b></td>
<td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td><td style="vertical-align:middle"><b>Prize</b></td></tr>
<tr>
<td style="vertical-align:middle">' . $i . '</td>
<td style="vertical-align:middle">' . $title . '</td>
<td style="vertical-align:middle">' . $total . '</td>
<td style="vertical-align:middle">' . $desc. '</td>
<td style="vertical-align:middle">+' . $correct . '</td>
<td style="vertical-align:middle">-' . $wrong . '</td>
<td style="vertical-align:middle">' . $correct * $total . '</td>
<td style="vertical-align:middle">' . $time . '&nbsp;min</td>
<td style="vertical-align:middle"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>Start</b></span></a></b></td>
<td style="vertical-align:middle">' . $prize. '</td></tr>
</table></div>';
}
}
?>
</div></div></div></div>


<div class="row footer">
<div class="col-md-2 box"></div>
<div class="col-md-6 box">
<span href="#" data-target="#login" style="color:lightyellow">Organized by Quizzer, Institute's Name, Place<br><br></span></div>
<div class="col-md-2 box">
<a href="feedback.php" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" target="new">Feedback</a></div>
<div class="col-md-2 box">
<a href="about.php" s style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" target="new">About Quizzer</a></div>
</div>

<script type="text/javascript">
$('#payment_form').bind('keyup blur', function(){
$.ajax({
url: 'account.php?q=4',
type: 'post',
data: JSON.stringify({ 
key: $('#key').val(),
salt: $('#salt').val(),
txnid: $('#txnid').val(),
amount: $('#amount').val(),
pinfo: $('#pinfo').val(),
fname: $('#fname').val(),
email: $('#email').val(),
mobile: $('#mobile').val(),
udf5: $('#udf5').val()
}),
contentType: "application/json",
dataType: 'json',
success: function(json) {
if (json['error']) {
$('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
}
else if (json['success']) {	
$('#hash').val(json['success']);
}
}
}); 
});
var sec = 00; // set the seconds
var min = 00; // set the minutes

function countDown() {
  sec++;
  if (sec == 59) {
    sec = 00;
    min = min + 1;
  } else {
    min = min;
  }
  if (sec <= 9) {
    sec = "0" + sec;
  }
  time = (min <= 9 ? "0" + min : min) + " min and " + sec + " sec ";
  if (document.getElementById('time')) {
    var theTime = document.getElementById('time');
    theTime.innerHTML = time;
  }
  SD = window.setTimeout("countDown();", 1000);
  if (min == '05' && sec == '00') {
    window.clearTimeout(SD);
    alert("Too slow.");
  }
}

</script>
<script type="text/javascript">
function launchBOLT()
{
bolt.launch({
key: $('#key').val(),
txnid: $('#txnid').val(), 
hash: $('#hash').val(),
amount: $('#amount').val(),
firstname: $('#fname').val(),
email: $('#email').val(),
phone: $('#mobile').val(),
productinfo: $('#pinfo').val(),
udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
mode: 'dropout'	
},{ responseHandler: function(BOLT){
console.log( BOLT.response.txnStatus );		
if(BOLT.response.txnStatus != 'CANCEL')
{
//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
'</form>';
var form = jQuery(fr);
jQuery('body').append(form);								
form.submit();
}
},
catchException: function(BOLT){
alert( BOLT.message );
}
});
}
function amount(){
	window.location.replace("amount.php");
	
}
</script>
</body>
</html>