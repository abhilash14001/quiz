<?php
if (@$_GET['q'] == 6) {

$result = mysqli_query($con, "SELECT * FROM admin_money_notification ORDER BY id DESC") or die('Error');
echo '<div class="panel"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td>
<td style="vertical-align:middle"><b>Username</b></td>
<td style="vertical-align:middle"><b>Money Requested</b></td>
<td style="vertical-align:middle"><b>Phone Number</b></td>
<td style="vertical-align:middle"><b>Bank Details</b></td>
<td style="vertical-align:middle"><b>Aadhar Details</b></td>
<td style="vertical-align:middle"><b>Paid Status</b></td></tr>';
$c = 1;

while ($row = mysqli_fetch_array($result)) {
$money   = $row['money_requested'];
$uname   = $row['username'];
$quiz = $row['quiz'];
$status = $row['status'];
$phno    = $row['phone_num'];

$id = $row['id'];
$muchu = mysqli_query($con, "select * from accdetails where username ='$uname'");
$f = mysqli_fetch_assoc($muchu);
$adhar = $f['adhaar'];
echo '<tr><td style="vertical-align:middle">' . $c++ . '</td>
<td style="vertical-align:middle">' . $uname . '</td>
<td style="vertical-align:middle">' . $money . '</td>
<td style="vertical-align:middle">' . $phno . '</td>
<td style="vertical-align:middle">Bank Name : ' . $f['bankname'] . '<br>Acc No : '.$f['accno'].'<br>IFSC : '.$f['ifsc'].'<br>Branch : '.$f['branch'].'<br>Account Holder Name : '.$f['holdername'].'<br>UPI ID : '.$f['upi'].'</td>
<td style="vertical-align:middle">';
 if(!empty($adhar)) { 
echo '<img width = "100px" height = "100px" src = "bank_aadhar/' . $adhar . '"></td>';
}

if($status == 'Unpaid')
{
echo '<form method = "POST" action="#"><input type = "hidden" name = "id" value='.$id.'><td style="vertical-align:middle">
<button type = "submit" name = "unpaid" class = "btn btn-danger">Unpaid</button></td></form>'; 
}
else
{
echo '<td style="vertical-align:middle"><button type = "button" name = "paid" class = "btn btn-success">Paid</button></td>'; 	
	
}
echo '</tr>';
}
$c = 0;
echo '</table></div>';

}
if(isset($_POST['unpaid']))
{
$resudd = mysqli_query($con, "SELECT * FROM admin_money_notification where status = 'Unpaid'") or die('Error');
$roddw = mysqli_fetch_array($resudd);
$mon = $roddw['money_requested'];
$id = $_POST['id'];
 $en = "update admin_money_notification set status = 'Paid' where id = '$id' and status = 'Unpaid'; update user_rank set status = 'Paid' where username = '$_SESSION[username]' and status = 'Unpaid'; update user set earned = earned - '$mon' where username = '$uname'";
mysqli_multi_query($con, $en);
echo '<meta http-equiv="refresh" content="0.1; URL=dash.php?q=6">';	
}
?>