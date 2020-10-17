<head>
<style >
.wallet{
    margin-left:40px;
    margin-right:40px;
    padding:05px;
}
@media(max-width:687px){
  .wallet{
    margin-left:10px;
    margin-right:10px;
    padding:05px;
}  
}
</style>
</head>
<?php error_reporting($level = null);
include 'dbConnection.php';
if (@$_GET['q'] == 5) {

$kothi = mysqli_query($con, "select username from accdetails where username = '$username'");
$kdfo = mysqli_query($con, "select tickets from user where username = '$username'");
$rows = mysqli_fetch_assoc($kdfo);
echo '<div class="container">
<div class="row" >';
echo '<div class=" col-lg-4 col-xs-7" style="margin-left:20px;"><h5>
        <i class = "fa fa-google-wallet"></i> 
            Wallet Balance : &nbsp;'.$wallet.'</h5>
    <h5><i class = "fa fa-money"></i> Earned Money : &nbsp;'.$earned.'
       </h5>
	   <h5><i class = "fa fa-money"></i> Tickets Left : &nbsp;'.$rows['tickets'].'
       </h5>
	   
	   </div>'; 
$ko = mysqli_query($con, "select * from user where username = '$username'");
$titan = mysqli_fetch_assoc($ko);
$earned = $titan['earned'];
$phon= $tital['phno'];

echo '<div class="col-lg-2 col-xs-4">
  <form method = "GET" action = "payu_free_quiz/index.php">
  <button name = "addmoney" class = "fa fa-plus btn btn-success">Add Money</button>
</form>';
    
	$queryeerer = mysqli_query($con, "select tickets, tickets_status from user where id = '$userid'");
	
	$fetch = mysqli_fetch_assoc($queryeerer);
	$tickets = $fetch['tickets'];	
	$ticketstatus = $fetch['tickets_status'];
	if($tickets == 2 && $ticketstatus == 'unclaimed')
	{
echo '<form method = "POST"><button type = "submit" name ="tickets" class = "fa fa-ticket btn btn-primary btn btn-md" style="margin-top:05px;">&nbsp;Claim tickets</button></form></div>';
	}
   if(array_key_exists('tickets', $_POST)) { 
            addTickets($con, $userid); 
        } 
echo '</div></div>';
echo '<div class="row">
<div class="pane1l">';
if(mysqli_num_rows($kothi) != 1)
{
echo '<div class="panel" style="padding:07px;"><a href="#" class="btn btn-primary " data-toggle="modal" data-target="#myModal"> <span class="fa fa-plus" aria-hidden="true"></span>&nbsp;<span class="title1"><b> Add Bank Account</b> </span></a>';
}
echo '
    <button type="button" data-toggle="modal" data-target="#earnedModal" name = "withdraw_money" class="btn btn-success pull-right" >Withdraw Money</button></div></div>
<div class="panel">
<table class="table table-striped title1"  style="vertical-align:middle;margin-top:-15px;">
<tr>
<td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Quiz Name</b></td>
<td style="vertical-align:middle"><b>Earned Money</b></td></div>';


$iip   = "select money_earned, title from user_registered_quiz where userid='$_SESSION[userid]' and status = 'finished'";
$k = mysqli_query($con, $iip);
$i=0;
while ($roooo = mysqli_fetch_assoc($k)) 
{

$earned = $roooo['money_earned'];
$title = $roooo['title'];
$iip3   = "select earned from user where id='$_SESSION[userid]'";
$kd = mysqli_query($con, $iip3);
$rooodo = mysqli_fetch_assoc($kd);

$earnede = $rooodo['earned'];
$i++;
echo '
<tr>

<td style="vertical-align:middle">' . $i . '</td>
<input type= "hidden" name = "title" value = "'.$title.'">
<input type= "hidden" name = "earned" value = "'.$earned.'">
<td style="vertical-align:middle" >' . $title . '</td>
<td style="vertical-align:middle" name="earned">' . $earned . '</td>';
$query = mysqli_query($con, "select money_requested, quiz  from admin_money_notification where username = '$_SESSION[username]'");
echo '</tr>';
}
echo '</table></div>';
}
echo '
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Add Bank Details</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="#" method="POST" enctype = "multipart/form-data">
<fieldset>
<div class="form-group">
  <label class="col-md-3 control-label" for="username"></label>  
  <div class="col-md-6">
  <input name="username" placeholder="Username" value = '.$username.' class="form-control input-md" type="hidden">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="holdername" placeholder="Enter Account Holder Name" class="form-control input-md" type="text">
    
</div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="bankname" placeholder="Enter your Bank Name" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="bankbranch" placeholder="Enter your Bank Branch" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="ifsc" placeholder="Enter your Bank IFSC code" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="accno" placeholder="Enter your Bank Account No" class="form-control input-md" required type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input name="upiid" placeholder="Enter UPI ID" class="form-control input-md" type="text">
    
  </div>
  </div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
  <input type="file" required class ="form-control input-md" name="adhaar">
    
  </div>
</div>
</div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name = "bankdet" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="earnedModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Withdraw Money</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="withdraw_money.php" method="POST">
<fieldset>
<div class="form-group">
<form method = "POST" action = "withdraw_money.php">
  <label class="col-md-3 control-label" for="username">Enter amount to be withdraw</label>  
  <div class="col-md-6">
  <input name="earned" placeholder="Enter Money to be withdraw" value = "'.$earned.'" class="form-control input-md" type="text">
   
   
  
    
  </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name = "withdraw_money" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
      </div>
    </div>
  </div>
</div>';
if(isset($_POST['bankdet']))
{
$dir = "bank_aadhar/";    
$aadhar= $_FILES['adhaar']['name'];
$target = $dir . $aadhar;
move_uploaded_file($_FILES['adhaar']['tmp_name'], $target);
    
	mysqli_query($con, "insert into accdetails values (NULL, '$_SESSION[username]', '$_POST[bankname]', '$_POST[ifsc]','$_POST[accno]', '$_POST[upiid]', '$_POST[holdername]', '$aadhar', '$_POST[bankbranch]')");
	echo '<script>alert("Submitted Successfully");
	window.location = "account.php?q=5";
	</script>';
	
}

?>