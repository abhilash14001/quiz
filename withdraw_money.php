<?php
session_start();
include 'dbConnection.php';
if(isset($_POST['withdraw_money'])){
$earned = $_POST['earned'];
$sql = "select * from user where id = '$_SESSION[userid]'";	
$fetch = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($fetch);
$phone = $row['phno'];
$username = $row['username'];
$earn = $row['earned'];
$sqli   = "select email from admin";
$admin = mysqli_query($con, $sqli);
$fetchi = mysqli_fetch_assoc($admin);
$mailid = $fetchi['email'];
if($earn < $earned)
{
echo '<script>alert("You cant enter more than your earned money");</script>';		
echo '<meta http-equiv="refresh" content="0.1; URL=account.php?q=5">';
}
else{
$query = mysqli_query($con, "select money_requested from admin_money_notification where username = '$_SESSION[username]' and status = 'Unpaid'");
if(mysqli_num_rows($query)>0)
{
echo '<script>alert("You have already requested the money, wait until admin process the requested money");</script>';	
echo '<meta http-equiv="refresh" content="0.1; URL=account.php?q=5">';
}
else
{
$sql2 = "insert into admin_money_notification values(NULL, '$earned', '$username', '$phone', NOW(), 'Unpaid')";
mysqli_query($con, $sql2);
echo '<script>alert("Withraw amount of Rs. '.$earned.' has been requested to admin, soon you will get the money");</script>';

echo '<meta http-equiv="refresh" content="0.1; URL=account.php?q=5">';
}
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_from = "admin";
  $email_to = "$mailid";
    $email_subject = "$_SESSION[username] has requested $earned money check your dashboard";
    
   $email_message = "The above message is automated message don't neglect the message";
  $email_from = "$_SESSION[username]";
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 

}	
	
}
?>
	