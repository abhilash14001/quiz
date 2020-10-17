<?php 
include 'dbConnection.php';
if (@$_GET['q'] == 6) {
echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Username</b></td>
<td style="vertical-align:middle"><b>Quiz Title</b></td>

<td style="vertical-align:middle"><b>Score</b></td>
<td style="vertical-align:middle"><b>Rank<b></td></tr>';

$sqlddddd = "SELECT * FROM user_rank";
$resulteefdfdfdf = mysqli_query($con, $sqlddddd) or die("GOTILLA");
$i=1;

while($rowddfdf = mysqli_fetch_assoc($resulteefdfdfdf)) {
	
	$eid = $rowddfdf['eid'];
$qq = "select title, start_time from quiz where eid = '$eid'";
$fooo = mysqli_query($con, $qq);
while($fllksjdf = mysqli_fetch_assoc($fooo)){
extract($fllksjdf);
$current_time2 =  date('d-m-yy h:i:sa', strtotime('+2 minutes', strtotime($start_time)));
$current_time4 =  date('d-m-yy h:i:sa', strtotime('+4 minutes', strtotime($start_time)));
$start_timee = strtotime($start_time);
$exact_time = strtotime($current_timee);
$twomin = strtotime($current_time2);
$fourmin = strtotime($current_time4);
if($exact_time >= $twomin && $exact_time <= $fourmin){
  
echo '<tr><td style="vertical-align:middle">' . $i++ . '</td>
<td style="vertical-align:middle">'.$rowddfdf[username].'</td>
<td style="vertical-align:middle">'.$title.'</td>
<td style="vertical-align:middle">'.$rowddfdf[score].'</td>
<td style="vertical-align:middle">'.$rowddfdf[rank].'</td>';

echo '</tr>';
}
}
}
}
echo '</table></div>';

?>