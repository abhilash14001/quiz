<?php error_reporting($level=null);
include 'dbConnection.php';
session_start();
$username = $_SESSION['username'];
$targetDir = "quiz_photo/";
if (isset($_SESSION['key'])) {
if (@$_GET['fdid'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
$id = @$_GET['fdid'];
$result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dash.php?q=3");
}
}
if (isset($_SESSION['key'])) {
if (@$_GET['deidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
$eid = @$_GET['deidquiz'];
$r1 = mysqli_query($con, "UPDATE quiz SET status='disabled' WHERE eid='$eid' ") or die('Error');
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND status='ongoing' AND score_updated='false'");
while($row = mysqli_fetch_array($q)){
$user = $row['username'];
$s = $row['score'];
$r1 = mysqli_query($con, "UPDATE history SET status='finished',score_updated='true' WHERE eid='$eid' AND username='$user' ") or die('Error');
$q1 = mysqli_query($con, "SELECT * FROM rank WHERE username='$user'") or die('Error161');
$rowcount = mysqli_num_rows($q1);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$user','$s',NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q1)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q3 = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
header("location:dash.php?q=0");
}
}
if (isset($_SESSION['key'])) {
if (@$_GET['eeidquiz'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
$eid = @$_GET['eeidquiz'];
$r1 = mysqli_query($con, "UPDATE quiz SET status='enabled' WHERE eid='$eid' ") or die('Error');
header("location:dash.php?q=0");
}
}
if (isset($_SESSION['key'])) {
if (@$_GET['dusername'] && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
$dusername = @$_GET['dusername'];
$r1 = mysqli_query($con, "DELETE FROM rank WHERE username='$dusername' ") or die('Error');
$r2 = mysqli_query($con, "DELETE FROM history WHERE username='$dusername' ") or die('Error');
$result = mysqli_query($con, "DELETE FROM user WHERE username='$dusername' ") or die('Error');
header("location:dash.php?q=1");
}
}
if (isset($_SESSION['key'])) {
if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') 
{
$eid = @$_GET['eid'];
$result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while ($row = mysqli_fetch_array($result)) {
$qid = $row['qid'];
$r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}

$r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con, "DELETE FROM user_regisetered_quiz WHERE eid='$eid' ");
$r4 = mysqli_query($con, "DELETE FROM user_regisetered_questions WHERE eid='$eid' ");
header("location:dash.php?q=5");
}
/* edit quiz */
if (@$_GET['q'] == 'editquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') 
{
$eid = @$_GET['eid'];

header("location:dash.php?q=7");
}

}
if (isset($_SESSION['key'])) {
if (@$_GET['q'] == 'addquiz' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') 
{
$name    = $_POST['name'];
$name    = ucwords(strtolower($name));
$total   = $_POST['total'];
$correct = $_POST['right'];
$wrong   = $_POST['wrong'];
$tobereg = $_POST['tobereg'];
$_SESSION['time']= $time    = $_POST['time'];
$start_time = $_POST['start_time'];
$desc = $_POST['desc'];
$prize = $_POST['prize'];
$status  = "enabled";
$entry = $_POST['entry'];
$_SESSION['qid'] = $id      = uniqid();
$filee = basename($_FILES["quizphoto"]["name"]);
$targetFilePath = $targetDir . $filee;
move_uploaded_file($_FILES['quizphoto']['tmp_name'], $targetFilePath);
if($prize == 0 && $entry == 0){




mysqli_query($con, "INSERT INTO quiz VALUES(NULL,'$id','$name','$correct','$wrong','$total','$time', NOW(), '$start_time', '$entry', 0, '$tobereg', '$prize', '$desc', 'samplequiz', 'Pending', '$filee')");
}
else{
mysqli_query($con, "INSERT INTO quiz VALUES(NULL,'$id','$name','$correct','$wrong','$total','$time', NOW(), '$start_time', '$entry', 0, '$tobereg', '$prize', '$desc', '$status', 'Pending', '$filee')");
}
header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
}

if (isset($_SESSION['key'])) {
if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') 
{
$sid = $_SESSION['qid'];
$n   = @$_GET['n'];
$eid = @$_GET['eid'];
$ch  = @$_GET['ch'];
for ($i = 1; $i <= $n; $i++) {
$qid  = uniqid();



$fileName = basename($_FILES["photo"]["name"]);

$targetFilePath = $targetDir . $fileName;
move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath);
$qns  = addslashes($_POST['qns' . $i]);
$time   = $_SESSION['time'];
$FE = "INSERT INTO questions VALUES  (NULL,'$eid','$qid','$qns', 0, 0, '$time', '$ch','$i', '$fileName')";
$q3   = mysqli_query($con, $FE) or die();
$a    = addslashes($_POST[$i . '1']);
$b    = addslashes($_POST[$i . '2']);
$c    = addslashes($_POST[$i . '3']);
$d    = addslashes($_POST[$i . '4']);

$oaid = uniqid();
$obid =  uniqid('a');
$ocid =  uniqid('b');
$odid =  uniqid('c');

$qa = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$a','$oaid')") or die('Error61');
$qb = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$b','$obid')") or die('Error62');
$qb = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$c','$ocid')") or die('Error63'.mysqli_error($con));
$qd = mysqli_query($con, "INSERT INTO options VALUES  (NULL,'$qid','$d','$odid')") or die('Error64');
$e = $_POST['ans' . $i];
switch ($e) {
case 'a':
$ansid = $oaid;
break;

case 'b':
$ansid = $obid;
break;

case 'c':
$ansid = $ocid;
break;

case 'd':
$ansid = $odid;
break;

default:
$ansid = $oaid;
}

$qans = mysqli_query($con, "INSERT INTO answer VALUES  (NULL,'$qid','$ansid')");
}

header("location:dash.php?q=4&step=3&eid=$sid&n=$n");
}
}
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_POST['ans']) && (!isset($_GET['delanswer']))) 
{
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$ans   = $_POST['ans'];
$qid   = @$_GET['qid'];

$qb = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
if (mysqli_num_rows($qb) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}

$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
while ($row = mysqli_fetch_array($q)) {
$prevans = $row['ans'];
}
$q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
while ($row = mysqli_fetch_array($q)) {
$ansid = $row['ansid'];
}
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error1977');
if (mysqli_num_rows($q) != 0) {
$q = mysqli_query($con, "UPDATE user_answer SET ans='$ans' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error197');
} 
else {
	$file = "$_SESSION[username]"."time_taken";
	$file = file_get_contents("$file.json");
$ooppp = json_decode("$file", true);

foreach($ooppp as $sec)
{
	$secs = $sec['sec'];
	$scorec = $sec['score'];
 
}
$xyz = "INSERT INTO user_answer VALUES(NULL,'$qid','$ans','$ansid','$_GET[eid]', '$secs', '$scorec', '$_SESSION[username]')";
$q = mysqli_query($con, $xyz);
$sql  = "select * from user_answer where username = '$_SESSION[username]' and eid = '$_GET[eid]' and qid =  '$_GET[qid]'";
$oo =mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($oo);
$ans = $row['ans'];
$correctans = $row['correctans'];
if($ans != $correctans)
{
	mysqli_query($con, "update user_answer set score = 0 where username = '$_SESSION[username]' and eid = '$_GET[eid]' and qid = '$_GET[qid]'");
}
}
$test = "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'";
echo $test;	
$qq = mysqli_query($con, $test);
while ($row = mysqli_fetch_array($qq)) {
$option = $row['option'];
}

	if ($ans == $ansid) {
	$qw = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid'");
	while ($row = mysqli_fetch_array($qw)) {
	$correct = $row['correct'];
	$wrong   = $row['wrong'];
	}

	$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error115');
	while ($row = mysqli_fetch_array($q)) {
	$s = $row['score'];
	$r = $row['correct'];
	$w = $row['wrong'];
	}

	if (isset($prevans) && $prevans != $ansid) {
	$r++;
	$w--;
	$s = $s + $correct + $wrong;
	$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error13');
	
	} else {
	$r++;
	$s = $s + $correct;
	$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error14');
	
	}
	} else {
	$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
	while ($row = mysqli_fetch_array($q)) {
	$wrong   = $row['wrong'];
	$correct = $row['correct'];
	} 

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
if (isset($prevans) && $prevans == $ansid) {
$r--;
$w++;
$s = $s - $correct - $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

} else {
$w++;
$s = $s - $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error12');

} 
}
header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');

} 
else {
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
else {
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
/* } */
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!isset($_POST['ans'])) && (isset($_GET['delanswer'])) && $_GET['delanswer'] == "delanswer") {
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$qid   = @$_GET['qid'];
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}

$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}

$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
while ($row = mysqli_fetch_array($q)) {
$ansid = $row['ansid'];
}
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
$row = mysqli_fetch_array($q);
$ans = $row['ans'];
$q = mysqli_query($con, "DELETE FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die("Error2222");

if ($ans == $ansid) {
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
while ($row = mysqli_fetch_array($q)) {
$wrong   = $row['wrong'];
$correct = $row['correct'];
}

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
$r--;
$s = $s - $correct;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

} 
else {
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
while ($row = mysqli_fetch_array($q)) {
$wrong   = $row['wrong'];
$correct = $row['correct'];
}

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
$w--;
$s = $s + $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

}
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $total);

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
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!isset($_POST['ans'])) && (isset($_GET['delanswer'])) && $_GET['delanswer'] == "delanswer") {
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$qid   = @$_GET['qid'];
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}

$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}

$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled" || $qstatus == "samplequiz") {
$q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
while ($row = mysqli_fetch_array($q)) {
$ansid = $row['ansid'];
}
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
$row = mysqli_fetch_array($q);
$ans = $row['ans'];
$q = mysqli_query($con, "DELETE FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die("Error2222");

if ($ans == $ansid) {
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
while ($row = mysqli_fetch_array($q)) {
$wrong   = $row['wrong'];
$correct = $row['correct'];
}

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
$r--;
$s = $s - $correct;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

} else {
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error129');
while ($row = mysqli_fetch_array($q)) {
$wrong   = $row['wrong'];
$correct = $row['correct'];
}

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
$w--;
$s = $s + $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

}
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $total);

} else {
unset($_SESSION['6e447159425d2d']);
$q = mysqli_query($con, "UPDATE history SET status='finishing' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');

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
$q = mysqli_query($con, "UPDATE history SET status='finishing' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
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
}
if (@$_GET['q'] == 'samplequiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d3d']) && $_SESSION['6e447159425d3d'] == "6e447159425d3d" && isset($_POST['ans'])) 
{
	
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$ans   = $_POST['ans'];
$qid   = @$_GET['qid'];
$qb = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
if (mysqli_num_rows($qb) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$_GET[eid]' and status = 'samplequiz'") or die('Error1976');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}

$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $qstatus == "samplequiz") {
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' AND qid='$qid' ") or die('Error115');
while ($row = mysqli_fetch_array($q)) {
$prevans = $row['ans'];
}
$q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
while ($row = mysqli_fetch_array($q)) {
$ansid = $row['ansid'];
}
$q = mysqli_query($con, "SELECT * FROM user_answer WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error1977');
if (mysqli_num_rows($q) != 0) {
$q = mysqli_query($con, "UPDATE user_answer SET ans='$ans' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' AND qid='$qid' ") or die('Error19567');
} else {
	$file = "$_SESSION[username]"."sample_time_taken";
		$file = file_get_contents("$file.json");
$ooppp = json_decode("$file", true);

foreach($ooppp as $sec)
{
	$secs = $sec['sec'];
	$scorec = $sec['score'];
 
}
$xyz = "INSERT INTO user_answer VALUES(NULL,'$qid','$ans','$ansid','$_GET[eid]', '$secs', '$scorec', '$_SESSION[username]')";
$q = mysqli_query($con, $xyz);
$sql  = "select * from user_answer where username = '$_SESSION[username]' and eid = '$_GET[eid]' and qid =  '$_GET[qid]'";
$oo =mysqli_query($con, $sql); 
$row = mysqli_fetch_assoc($oo);
$ans = $row['ans'];
$correctans = $row['correctans'];

if($ans != $correctans)
{
	mysqli_query($con, "update user_answer set score = 0 where username = '$_SESSION[username]' and eid = '$_GET[eid]' and qid = '$_GET[qid]'");
}
}
$test = "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'";
echo $test;	
$qq = mysqli_query($con, $test);
while ($row = mysqli_fetch_array($qq)) {
$option = $row['option'];
}

	if ($ans == $ansid) {
	$qw = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' and status = 'samplequiz'");
	while ($row = mysqli_fetch_array($qw)) {
	$correct = $row['correct'];
	$wrong   = $row['wrong'];
	}

	$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error115');
	while ($row = mysqli_fetch_array($q)) {
	$s = $row['score'];
	$r = $row['correct'];
	$w = $row['wrong'];
	}

	if (isset($prevans) && $prevans != $ansid) {
	$r++;
	$w--;
	$s = $s + $correct + $wrong;
	$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r,`wrong`=$w, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error13');
	
	} else {
	$r++;
	$s = $s + $correct;
	$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error14');
	
	}
	} else {
	$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' and status = 'samplequiz' ") or die('Error129');
	while ($row = mysqli_fetch_array($q)) {
	$wrong   = $row['wrong'];
	$correct = $row['correct'];
	} 

$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error139');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
}
if (isset($prevans) && $prevans == $ansid) {
$r--;
$w++;
$s = $s - $correct - $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,`correct`=$r, date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error11');

} else {
$w++;
$s = $s - $wrong;
$q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w,date= NOW()  WHERE  username = '$username' AND eid = '$eid'") or die('Error12');

} 
}
header("location:account.php?q=samplequiz&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');

} else {
unset($_SESSION['6e447159425d3d']);
$q = mysqli_query($con, "UPDATE history SET status='finishing' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
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
unset($_SESSION['6e447159425d3d']);
$q = mysqli_query($con, "UPDATE history SET status='finishing' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');


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

?>
