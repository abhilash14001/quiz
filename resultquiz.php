<?php
include "dbConnection.php";	
if (@$_GET['q'] == 'hideresult' && @$_GET['eid']) {
$eid = @$_GET['eid'];
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$eid'") or die('Error197');

$sp = "SELECT * FROM history WHERE eid='$eid' AND username='$_SESSION[username]'";
$qq = mysqli_query($con, $sp);
while ($row = mysqli_fetch_assoc($qq)) {
$s           = $row['score'];
$scorestatus = $row['score_updated'];
}
if ($scorestatus == "false") {
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);

if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s', NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_assoc($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error15777');

while ($row = mysqli_fetch_assoc($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error4654157');

while ($row = mysqli_fetch_assoc($q)) {
$s      = $row['score'];
$w      = $row['wrong'];
$r      = $row['correct'];
$status = $row['status'];
}

$sql = "SELECT * FROM score_average WHERE eid='$eid' AND username='$username'";
$qr = mysqli_query($con, $sql) or die('Error153437');

while ($row = mysqli_fetch_assoc($qr)) {
$score      = $row['score'];

$avg = $row['average'];
}
if ($status == "finished") {

echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><h4><b>Wait for two minutes after the quiz and refresh the page, and then play the next quiz, result will be announced and earned money will be updated in your wallet</b></h4><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
echo '<tr style="color:darkblue">
<td style="vertical-align:middle">Total Questions</td>
<td style="vertical-align:middle">' . $total . '</td></tr>
<tr style="color:darkgreen">
<td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
<tr style="color:red">
<td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
<tr style="color:orange">
<td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
<tr style="color:darkblue">
<td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>';
if(!empty($score))
{
    echo'


<td style="vertical-align:middle">' . $score . '</td></tr>';
}
else
{
    
echo '<td style="vertical-align:middle">0</td></tr>';    
}

$q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error1575454');
while ($row = mysqli_fetch_assoc($q)) {
$s = $row['score'];
if(!empty($avg))
{
echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $avg . '</td></tr>';
}

else
{
    echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">0</td></tr>';
}
    
}
}
 
if(isset($_SESSION['6e447159425d2d']))
{
unset($_SESSION['6e447159425d2d']);
unset($_SESSION['time']);
}
} 


$sldifjosdm    = "select * from user_registered_quiz where status = 'finished' and userid = '$_SESSION[userid]'";
$mmmdfdffddffdfdfkdfdf = mysqli_query($con, $sldifjosdm);
while ($row = mysqli_fetch_assoc($mmmdfdffddffdfdfkdfdf)) {
$starttime = $row['start_time'];
$exacttime = strtotime($current_timee);
$current_time6 =  date('d-m-yy h:i:sa', strtotime('+1 minutes', strtotime($starttime)));	
$onemin = strtotime($current_time6); 

if (@$_GET['q'] == 'result' && @$_GET['eid'] ) {
if($exacttime < $onemin){
	echo "<h1 align = 'center'><b><font color = 'Red'>Result will be announced after one minute of the quiz</font></b></h1 ";
	
}	
if($exacttime > $onemin )
{
$eid = @$_GET['eid'];
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$eid'") or die('Error197');
$sp = "SELECT * FROM history WHERE eid='$eid' AND username='$_SESSION[username]'";
$qq = mysqli_query($con, $sp);
while ($row = mysqli_fetch_assoc($qq)) {
$s           = $row['score'];
$scorestatus = $row['score_updated'];
}
if ($scorestatus == "false") {
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);

if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s', NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_assoc($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error15777');

while ($row = mysqli_fetch_assoc($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error4654157');

while ($row = mysqli_fetch_assoc($q)) {
$s      = $row['score'];
$w      = $row['wrong'];
$r      = $row['correct'];
$status = $row['status'];
}

$sql = "SELECT * FROM score_average WHERE eid='$eid' AND username='$username'";
$qr = mysqli_query($con, $sql) or die('Error153437');

while ($row = mysqli_fetch_assoc($qr)) {
$score      = $row['score'];

$avg = $row['average'];
}
if ($status == "finished" && $exacttime > $onemin ) {

echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><h4><b>Wait for two minutes after the quiz and refresh the page, and then play the next quiz, result will be announced and earned money will be updated in your wallet</b></h4><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
echo '<tr style="color:darkblue">
<td style="vertical-align:middle">Total Questions</td>
<td style="vertical-align:middle">' . $total . '</td></tr>
<tr style="color:darkgreen">
<td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
<tr style="color:red">
<td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
<tr style="color:orange">
<td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
<tr style="color:darkblue">
<td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>';
if(!empty($score))
{
    echo'


<td style="vertical-align:middle">' . $score . '</td></tr>';
}
else
{
echo '<td style="vertical-align:middle">0</td></tr>';    
    
}
$q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error1575454');
while ($row = mysqli_fetch_assoc($q)) {
$s = $row['score'];
if(!empty($avg))
{
echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $avg . '</td></tr>';
}
else
{
 echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">0</td></tr>';   
    
}
}
echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
while ($row = mysqli_fetch_assoc($q)) {
$question = $row['qns'];
$qid      = $row['qid'];
$q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
if (mysqli_num_rows($q2) > 0) {
$row1         = mysqli_fetch_assoc($q2);
$ansid        = $row1['ans'];
$correctansid = $row1['correctans'];
$time_taken = $row1['time_taken'];
$score_answer = $row1['score'];
$q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_assoc($q3);
$row3       = mysqli_fetch_assoc($q4);
$ans        = $row2['option'];
$correctans = $row3['option'];
} else {
$q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
$row1         = mysqli_fetch_assoc($q3);
$correctansid = $row1['ansid'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_assoc($q4);
$correctans = $row2['option'];
$ans        = "Unanswered";
}
if ($correctans == $ans && $ans != "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Time taken :'.$time_taken.'<br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Score:'.$score_answer.'<br />';
} elseif ($ans == "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} else {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Time taken :'.$time_taken.'<br />';
echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Score:'.$score_answer.'<br />';

}
echo "<br /></li>";
}
echo '</ol>';
echo "</div>";
 
if(isset($_SESSION['6e447159425d2d']))
{
unset($_SESSION['6e447159425d2d']);
unset($_SESSION['time']);
}
} 
}
}
}
if (@$_GET['q'] == 'samplequizresult' && @$_GET['eid']) {
$eid = @$_GET['eid'];
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$eid'") or die('Error197');
$sp = "SELECT * FROM history WHERE eid='$eid' AND username='$_SESSION[username]'";
$qq = mysqli_query($con, $sp);
while ($row = mysqli_fetch_assoc($qq)) {
$s           = $row['score'];
$scorestatus = $row['score_updated'];
}
if ($scorestatus == "false") {
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);

if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s', NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_assoc($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error1574677764686');

while ($row = mysqli_fetch_assoc($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error15725');

while ($row = mysqli_fetch_assoc($q)) {
$s      = $row['score'];
$w      = $row['wrong'];
$r      = $row['correct'];
$status = $row['status'];
}

if ($status == "finished") {

echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
echo '<tr style="color:darkblue">
<td style="vertical-align:middle">Total Questions</td>
<td style="vertical-align:middle">' . $total . '</td></tr>
<tr style="color:darkgreen">
<td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
<tr style="color:red">
<td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
<tr style="color:orange">
<td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
<tr style="color:darkblue">
<td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>';
$sq2l = "SELECT * FROM score_average WHERE eid='$_GET[eid]' AND username='$username'";
$qrw = mysqli_query($con, $sq2l) or die('Error153437');

while ($row = mysqli_fetch_assoc($qrw)) {
$score      = $row['score'];
$avg = $row['average'];
}
if(!empty($score)){
echo '
<td style="vertical-align:middle">' . $score . '</td></tr>';
}
else
{
    echo '
<td style="vertical-align:middle">0</td></tr>';
    
}

if(!empty($avg)){
echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $avg . '</td></tr>';
}
else
{
    echo '<tr style="color:#990000"><td style="vertical-align:middle">Overall Score(Average Score)&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td style="vertical-align:middle">0</td></tr>';
    
}


echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
while ($row = mysqli_fetch_assoc($q)) {
$question = $row['qns'];
$qid      = $row['qid'];
$q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
if (mysqli_num_rows($q2) > 0) {
$row1         = mysqli_fetch_assoc($q2);
$ansid        = $row1['ans'];
$correctansid = $row1['correctans'];
$time_taken = $row1['time_taken'];
$score_answer = $row1['score'];
$q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_assoc($q3);
$row3       = mysqli_fetch_assoc($q4);
$ans        = $row2['option'];
$correctans = $row3['option'];
} else {
$q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
$row1         = mysqli_fetch_assoc($q3);
$correctansid = $row1['ansid'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_assoc($q4);
$correctans = $row2['option'];
$ans        = "Unanswered";
}
if ($correctans == $ans && $ans != "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Time taken :'.$time_taken.'<br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Score:'.$score_answer.'<br />';
} elseif ($ans == "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} else {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Time taken :'.$time_taken.'<br />';
echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Score:'.$score_answer.'<br />';

}
echo "<br /></li>";
}
echo '</ol>';
echo "</div>";
 
 
if(isset($_SESSION['6e447159425d3d']))
{

 unset($_SESSION['6e447159425d3d']); 
$fet = mysqli_query($con, "select * from quiz where status = 'samplequiz'");
	while($row = mysqli_fetch_assoc($fet)){
	
	$eid = @$_GET['eid'];
	$time = $row['time'];
	 mysqli_multi_query($con, "delete from user_answer where eid = '$eid'; delete from history where eid = '$eid'; delete from rank where username = '$_SESSION[username]'; delete from score_average where eid = '$eid'; update questions set time = '$time' where eid = '$eid';  update questions set time = '$time' where eid = '$eid'");    
	 
	$file = "$_SESSION[username]"."sample_time_taken";
	 unlink("$file.json");
	 unset($_SESSION['qid']);
	}
  }
} 
}
/* Expired quiz result */

if (@$_GET['q'] == 'expresult' && @$_GET['eid']) {
$eid = @$_GET['eid'];
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$eid'") or die('Error197');
$sp = "SELECT * FROM history WHERE eid='$eid' AND username='$_SESSION[username]'";
$qq = mysqli_query($con, $sp);
while ($row = mysqli_fetch_assoc($qq)) {
$s           = $row['score'];
$scorestatus = $row['score_updated'];
}
if ($scorestatus == "false") {
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($q);

if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s', NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_assoc($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error157455777');

while ($row = mysqli_fetch_assoc($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error15743c');

while ($row = mysqli_fetch_assoc($q)) {
$s      = $row['score'];
$w      = $row['wrong'];
$r      = $row['correct'];
$status = $row['status'];
}
$qr = mysqli_query($con, "SELECT * FROM score_average WHERE eid='$eid' AND username='$username' ") or die('Error153437');

while ($row = mysqli_fetch_assoc($qr)) {
$score      = $row['score'];

$avg = $row['average'];
}
if ($status == "finished") {

$q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error157447ssd');
while ($row = mysqli_fetch_assoc($q)) {
$s = $row['score'];
}
echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Answers for the Question ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
while ($row = mysqli_fetch_assoc($q)) {
$question = $row['qns'];
$qid      = $row['qid'];
$q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
if (mysqli_num_rows($q2) > 0) {
$row1         = mysqli_fetch_assoc($q2);
$ansid        = $row1['ans'];
$correctansid = $row1['correctans'];
$time_taken = $row1['time_taken'];
$score_answer = $row1['score'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row3       = mysqli_fetch_assoc($q4);
$correctans = $row3['option'];
} else {
$q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
$row1         = mysqli_fetch_assoc($q3);
$correctansid = $row1['ansid'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2       = mysqli_fetch_assoc($q4);

$ans        = "Unanswered";
}
if ($correctansid) {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font>
';
}
echo "<br /></li>";
}
echo '</ol>';
echo "</div>";

} 
}


?>