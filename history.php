<?php
	if (@$_GET['q'] == 2) {
$q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND status='finished' ORDER BY date DESC ") or die('Error197');
echo '<div class="title">
<table class="table table-striped title1" style="
  margin-top: 40px;
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;" >
  <tr><td style="vertical-align:middle"><b>S.N.</b></td>
      <td style="vertical-align:middle"><b>Quiz</b></td>
      <td style="vertical-align:middle"><b>Questions</b></td>
      <!--<td style="vertical-align:middle"><b>Right</b></td>
      <td style="vertical-align:middle"><b>Wrong<b></td>
      <td style="vertical-align:middle"><b>Unattempted<b></td>-->
      <td style="vertical-align:middle"><b>Score</b></td><td style="vertical-align:middle"><b>Action<b></td></tr>';
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
echo '<tr class="well1"><td style="vertical-align:middle">' . $c . '</td>
          <td style="vertical-align:middle">' . $title . '</td>
          <td style="vertical-align:middle">' . $total . '</td>
          <!--<td style="vertical-align:middle">' . $r . '</td>
          <td style="vertical-align:middle">' . $w . '</td>
          <td style="vertical-align:middle">' . ($total - $r - $w) . '</td>-->
          <td style="vertical-align:middle">' . $s . '</td>
          <td style="vertical-align:middle"><b><a href="account.php?q=result&eid=' . $eid . '" class="btn" style="margin:0px;background:darkred;color:white">&nbsp;<span class="title1"><b>View Result</b></>
              </tr>';
}
echo '</table></div>';
}
?>