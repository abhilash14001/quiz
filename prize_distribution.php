<?php 
include 'dbConnection.php';
if (@$_GET['q'] == 7) {
echo '<h3 align="center"><b>Winning Breakup</b></h3>';
echo '<div class="panel title">

<table class="table table-striped table table-bordered title1" >
<td ><h3><b>Rank</b></h3></td>
<td ><h3><b>Prize</b></h3></td></tr>';
$c = 1;
echo '<tr><td>1</td>
<td>300</td></tr>
<tr><td>2</td>
<td>150</td></tr>
<tr><td>3</td>
<td>100</td></tr>
<tr><td>4 - 10</td>
<td>50</td></tr>
<tr><td>11 - 25</td>
<td>25</td></tr>
<tr><td>26 - 75</td>
<td>10</td>
</tr>';



}
echo '</table></div>';

?>
