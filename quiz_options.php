<?php 
	
include "dbConnection.php";
	if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
<div class="col-md-3"></div><div class="col-md-6">
<form enctype = "multipart/form-data" class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';

for ($i = 1; $i <= @$_GET['n']; $i++) {

echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
<label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
<div class="col-md-12">
<textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
<br>
<input type = "file"  name="photo">
</div>
</div>
<div class="form-group">
<label class="col-md-12 control-label" for="' . $i . '1"></label>  
<div class="col-md-12">
<input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
<br>
</div>
</div>
<div class="form-group">
<label class="col-md-12 control-label" for="' . $i . '2"></label>  
<div class="col-md-12">
<input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label class="col-md-12 control-label" for="' . $i . '3"></label>  
<div class="col-md-12">
<input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
<br>

</div>
</div>
<div class="form-group">
<label class="col-md-12 control-label" for="' . $i . '4"></label>  
<div class="col-md-12">
<input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
<br>

</div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
<option value="a">Select answer for question ' . $i . '</option>
<option value="a">option a</option>
<option value="b">option b</option>
<option value="c">option c</option>
<option value="d">option d</option> </select><br /><br />';
}

echo '<div class="form-group">
<label class="col-md-12 control-label" for=""></label>
<div class="col-md-12"> 
<input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
</div>
</div>

</fieldset>
</form></div>';



}
?>