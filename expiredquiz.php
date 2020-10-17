<?php
include "dbConnection.php";	
if (@$_GET['q'] == 8) 
{
$userid = $_SESSION['userid'];
$m    = "select * from quiz where status ='enabled'";
$mmmkdfdfdfddfdfdf = mysqli_query($con, $m);
$i    = 0;
echo '
<div class="panel" style="margin-left:5%;margin-right:5%">
<table class="table table-striped title1"  style="vertical-align:middle">
<tr>
<td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Name</b></td>
<td style="vertical-align:middle"><b>Question</b></td>
<td style="vertical-align:middle"><b>Time limit</b></td>
<td style="vertical-align:middle"><b>Action</b></td>
</tr>';
while ($row = mysqli_fetch_assoc($mmmkdfdfdfddfdfdf)) {

$title      = $row['title'];
$total      = $row['total'];
$desc       = $row['description'];
$correct    = $row['correct'];
$wrong      = $row['wrong'];
$paid = $row['paid'];
$time       = $row['time'];
$prize      = $row['prize'];
$eid        = $row['eid'];
$status     = $row['status'];
$start_time = $row['start_time'];
$current_time1 =  date('d-m-yy h:i:sa', strtotime('+2 minutes', strtotime($start_time)));
$twomin = strtotime($current_time1);
$exact_time = strtotime($current_timee);
$selectquiz = mysqli_query($con, "select * from history where eid ='$eid'");
if(mysqli_num_rows($selectquiz)>0)
{

if($exact_time >= $twomin)
{
    $i++;
	echo '
<tr class="well">
<td style="vertical-align:middle">' . $i . '</td>
<td style="vertical-align:middle">' . $title . '</td>
<td style="vertical-align:middle">' . $total . '</td>
<td style="vertical-align:middle">' . $time . '&nbsp;seconds</td>
<td style="vertical-align:middle"><b>
<a href ="account.php?q=expresult&eid='.$eid.'" class = "btn btn-danger">
Quiz Expired</b></a></td>
</tr>';
	
}
}
}
}
echo '</table></div>';
?>