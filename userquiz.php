<?php
include "dbConnection.php";	
ob_start();
$username = $_SESSION['username'];

if (@$_GET['q'] != 'samplequiz' && @$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d']))) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('history');

if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('history2');
while ($row = mysqli_fetch_array($q)) {
$timel  = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$_GET[eid]' AND userid='$_SESSION[userid]'") or die('userreg');
while ($row = mysqli_fetch_array($q)) {
$ttimel  = $row['time'];
$qstatus = $row['status'];

}
$remaining = (($ttimel * 60) - ((time() - $timel)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$_SESSION['6e447159425d2d'] = "6e447159425d2d";

unset($_SESSION['6e447159425d3d']);
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[t]);

} else {
$q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]'") or die('history3');
$q = "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'";
while ($row = mysqli_fetch_array($q)) {
$s           = $row['score'];
$scorestatus = $row['score_updated'];
}
if ($scorestatus == "false") {
$q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('history4');
$qq = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
$rowcount = mysqli_num_rows($qq);
if ($rowcount == 0) {
$q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s', NOW())") or die('Error165');
} else {
while ($row = mysqli_fetch_array($q)) {
$sun = $row['score'];
}

$sun = $s + $sun;
$q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
}
}

}

} else {
$time = time();
$q = mysqli_query($con, "INSERT INTO history VALUES(NULL,'$username','$_GET[eid]' ,'0', '0', '0','0','0',NOW(),'$time','ongoing','false')") or die('Error137');
$_SESSION['6e447159425d2d'] = "6e447159425d2d";
header('location:account.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[t]);
}
}
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && (!(isset($_POST['ans'])))) 
{
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('history5');

if (mysqli_num_rows($q) > 0) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('history6');
while ($row = mysqli_fetch_array($q)) {
$time   = $row['timestamp'];
$status = $row['status'];
}
$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$_GET[eid]' AND userid='$_SESSION[userid]'") or die('userreg8');
while ($row = mysqli_fetch_array($q)) {
$ttime   = $row['time'];
$qstatus = $row['status'];
}
$remaining = (($ttime * 60) - ((time() - $time)));
if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('history7');
while ($row = mysqli_fetch_array($q)) {
$time = $row['timestamp'];
}
$sn = @$_GET['n'];


 
$_SESSION['eid'] = $eid   = @$_GET['eid'];
$file = "$username.json";


 
$sn    = @$_GET['n'];
$total = @$_GET['t'];
$remaining  = (($en) - ((time() - $time)));
 $ff = "SELECT * FROM user_registered_questions WHERE eid='$_GET[eid]' AND username='$_SESSION[username]' and sn = '$sn'";
$qu = mysqli_query($con, $ff) or die('Error197');
while ($row = mysqli_fetch_array($qu)) 
{
$en = $row['time'];
$eid = $row['eid'];
}
echo '<input type="hidden" id="eid" value = ' . $eid . '>';

echo '<script>
var seconds = '.$en.';

var sn = '.$sn.';
var total = '.$total.';

    
  function nextPage()
  {
  window.location.replace("account.php?q=quiz&step=2&eid='.$eid.'&n='.($sn + 1).'&t='.$total.'"); 
  }
  function lastPage(){
   
   window.location.replace("account.php?q=hideresult&eid=' . $_GET[eid].'");  
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
				 if(sn != total)
				{  
				 nextPage();
								 
			}
				else if(sn == total)
				{
			lastPage(); 
		}
     		  
    
    }
	 else {    
        seconds--;
    }
	 }
var countdownTimer = setInterval(\'secondPassed()\', 1000);
</script>'; 
$eid   = @$_GET['eid'];
$sn    = @$_GET['n'];
$total = @$_GET['t'];

echo '<font size="3" style="margin-left:100px;font-family:\'typo\' font-size:20px; font-weight:bold;color:darkred">Time Left : </font>
<span class="timer btn btn-default" style="margin-left:20px;">
<font style="font-family:\'typo\';font-size:20px;font-weight:bold;color:darkblue" id="countdown"></font></span>';



}

$qa    = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
echo '<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px;border: 1px solid blue;">';
while ($row = mysqli_fetch_assoc($qa)) {
$qns = stripslashes($row['qns']);
$qid = $row['qid'];
$pec = $row['time'];
$pic = $row['photo'];
echo '<b>
<div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px;word-wrap:break-all;">
' . $sn . ' : ' .  $_SESSION['qns']  = $qns . '';
if(!empty($pic))
{
	echo '<img src = "quiz_photo/'.$pic.'" style = "margin-left:40px>';
	
}
echo '</div>';

}
echo '<input type="hidden" id="qid" value='.$qid.'>
<input type="hidden" id="pec" value="'.$pec.'">
<input type="hidden" id="sn" value = "'.$n.'">
<input type="hidden" id="total" value = "'.$total.'">';	


  echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">'
;

if(@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']))
{


}

			 $qw = mysqli_query($con, "SELECT * FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]'") or die("Error222");
            if (mysqli_num_rows($qw) > 0) {
                $row = mysqli_fetch_array($qw);
                $ans = $row['ans'];
                $qwq = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
                $row = mysqli_fetch_array($qwq);
                $ans = $row['option'];
            } else {
                $ans = "";
            }
            if (strlen($ans) > 0) {
			$sn    = @$_GET['n'];
			$total = @$_GET['t'];
			$eid   = @$_GET['eid'];
			

	
	 

                echo "<font style=\"color:green;font-size:12px;font-weight:bold\">Selected answer: </font><font style=\"color:#565252;font-size:12px;\">" . $ans . "</font>&nbsp;&nbsp";  
	  if($sn != $total)
	{ 
			  
	 	unset($_SESSION['start_time']) ;


 echo '<script> nextPage();</script>'; 
}
elseif($sn == $total)
{
    unset($_SESSION['start_time']) ;

 echo '<script> lastPage();</script>'; 

$ppdfdfdf= mysqli_query($con, "select eid, username from score_average where username = '$_SESSION[username]' and eid = '$_GET[eid]'");
if(!(mysqli_num_rows($ppdfdfdf))>0)
{

rankTest($con, $file);

}

} 
 							
            }
				

				 echo '<div class="funkyradio">';
				
				 
		    $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
			
            while ($row = mysqli_fetch_array($q)) {
                $option   = stripslashes($row['option']);
                $optionid = $row['optionid'];


	
				  echo '<div class="funkyradio-success">
				  
				<input type="radio" name="ans" id="' . $optionid . '"  value="' . $optionid . '"> 				
				<label for="' . $optionid . '" style="width:100%">
				<div style="color:black;font-size:12px;word-wrap:break-word">
				&nbsp;&nbsp;' . $option . ' </div>
			 </label></div>
			 ';
			 			
				
            } echo '</div>';
            
            if ($_GET[t] > $_GET[n] && $_GET[n] != 1) {
                echo '<br />
				<button type="submit" id="stop" class="btn btn-primary" style="height:30px"  ><font style="font-size:12px;font-weight:bold"> Next</font></button>';
				
            } 


else if ($_GET[t] == $_GET[n]) {
echo '<br />
<button type="submit" id="stop" class="btn btn-success" style="height:30px"><font style="font-size:12px;font-weight:bold"> Submit</font></button>
<br><br>';
}
else if ($_GET[t] > $_GET[n] && $_GET[n] == 1) {
echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" id="stop" class="btn btn-primary" style="height:30px"  ><font style="font-size:12px;font-weight:bold"> Next</font></button>';
}
echo '</form>';
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
echo '<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '"  style="margin:5px;padding:5px;background-color:>';
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

}
start();
 $eid = @$_GET['eid'];
 echo '<input type = "hidden" id = "sqeid" value = '.$eid.'>';
 $ssn = @$_GET['n'];
 echo '<input type = "hidden" id = "ssn" value = '.$ssn.'>';
 ?>
<script>
 <?php 

 if(@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d'])):
?>
$(document).ready(function(){ 
var eid = $('#sqeid').val();	
var sns = $('#ssn').val();
setInterval(() => {
	$.ajax({
dataType :"html",
data:{eid:eid, sns:sns},
type:"GET",
url:"time_update.php", 
});
}, 1000);
});
<?php endif;?>
</script>
<?php
} 
elseif(@$_GET['q']== 'quiz' && @$_GET['step'] == 2 && $_SESSION['6e447159425d2d'] != "6e447159425d2d") 
{
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

}
ob_end_flush();
