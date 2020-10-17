<?php 
include "dbConnection.php";
if (@$_GET['q'] == 4 && (@$_GET['step']) == 3) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Ranking Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6">
<form class=  "form-inline" name="form" action="setrank.php?q=rankoptions&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';



echo '
<div class="form-group">
<label>Enter First Rank Details</label>  
<div class="col">

<input name="firstrankr1"  placeholder="1st Rank range" class="form-control input-md" type="text">
<input name="firstrankr2"  placeholder="2st Rank range" class="form-control input-md" type="text">
<input name="firstrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label>Enter Second Rank Details</label>  
<div class="col">

<input name="secondrankr1"  placeholder="2nd Rank range 1" class="form-control input-md" type="text">
<input name="secondrankr2"  placeholder="2nd Rank range 2" class="form-control input-md" type="text">

<input name="secondrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label>Enter Third Rank Details</label>  
<div class="col">

<input name="thirdrankr1"  placeholder="3rd Rank range 1" class="form-control input-md" type="text">
<input name="thirdrankr2"  placeholder="3rd Rank range 2" class="form-control input-md" type="text">
<input name="thirdrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div><div class="form-group">
<label>Enter Forth Rank Details</label>  
<div class="col">

<input name="forthrankr1"  placeholder="4th Rank range 1" class="form-control input-md" type="text">
<input name="forthrankr2"  placeholder="4th Rank range 2" class="form-control input-md" type="text">

<input name="forthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div><div class="form-group">
<label>Enter Fifth Rank Details</label>  
<div class="col">

<input name="fifthrankr1"  placeholder="5th Rank range 1" class="form-control input-md" type="text">
<input name="fifthrankr2"  placeholder="5th Rank range 2" class="form-control input-md" type="text">
<input name="fifthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div><div class="form-group">
<label>Enter Sixth Rank Details</label>  
<div class="col">

<input name="sixthrankr1"  placeholder="6th Rank range 1" class="form-control input-md" type="text">
<input name="sixthrankr2"  placeholder="6th Rank range 2" class="form-control input-md" type="text">
<input name="sixthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div><div class="form-group">
<label>Enter Seventh Rank Details</label>  
<div class="col">

<input name="seventhrankr1"  placeholder="7th Rank range 1" class="form-control input-md" type="text">
<input name="seventhrankr2"  placeholder="7th Rank range 2" class="form-control input-md" type="text">
<input name="seventhrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div><div class="form-group">
<label>Enter Eigth Rank Details</label>  
<div class="col">

<input name="eigthrankr1"  placeholder="8th Rank range 1" class="form-control input-md" type="text">
<input name="eigthrankr2"  placeholder="8th Rank range 2" class="form-control input-md" type="text">
<input name="eigthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label>Enter Ninth Rank Details</label>  
<div class="col">

<input name="ninthrankr1"  placeholder="9th Rank range 1" class="form-control input-md" type="text">
<input name="ninthrankr2"  placeholder="9th Rank range 2" class="form-control input-md" type="text">
<input name="ninthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label>Enter Tenth Rank Details</label>  
<div class="col">

<input name="tenthrankr1"  placeholder="10th Rank range 1" class="form-control input-md" type="text">
<input name="tenthrankr2"  placeholder="10th Rank range 2" class="form-control input-md" type="text">
<input name="tenthrankprize"  placeholder="Enter prize" class="form-control input-md" type="text">
<br>

</div>
</div>';

echo '<div class="form-group">
<div class="col"> 
<br>
<input type="submit" name = "submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
</div>
</div>

</fieldset>
</form></div>';



}
?>
