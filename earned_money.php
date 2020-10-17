<?php error_reporting($level = null);
include 'dbConnection.php';
$userid = $_SESSION['userid'];
$eid = $_GET['eid'];
$re = file_get_contents("$username.json");
$result = json_decode($re, true);

foreach($result as $res)
{

$seid = $res['eid']['eid'];
$m    = "select * from user_registered_quiz where status = 'finished' and userid = '$userid' and money_earned = '0.00' and earned = 'NO' and eid = '$seid'";
}
$mmmkdfdf = mysqli_query($con, $m);
while ($row = mysqli_fetch_assoc($mmmkdfdf)) {

$status     = $row['status'];
$start_time = $row['start_time'];
 $current_time2 =  date('d-m-yy h:i:sa', strtotime('+2 minutes', strtotime($start_time)));
$mkk    = "select * from score_average where status = 'processing' and username = '$_SESSION[username]'";
$oo = mysqli_query($con, $mkk);
$geid = $eid;
if(mysqli_num_rows($oo) >0)
{
$start_time = strtotime($start_time);
 $exact_time = strtotime($current_timee);

 $twomin = strtotime($current_time2);
 if($exact_time >= $start_time && $exact_time > $twomin && $status == 'finished' ) {

sendAmount($con, $seid);

}


}
}
$mfd = "select start_time from user_registered_quiz where status = 'enabled' and paid = 'success' and userid = '$userid'";
$mmmkdfdfdf = mysqli_query($con, $mfd);
while($rows = mysqli_fetch_assoc($mmmkdfdfdf))
{
extract($rows);
$current_time2 =  date('d-m-yy h:i:sa', strtotime('+2 minutes', strtotime($start_time)));
$twomin = strtotime($current_time2);
$exact_time = strtotime($current_timee);
$start_timee = strtotime($start_time);

if($exact_time >= $start_timee && $exact_time > $twomin)
{
updateWalletTicket($con, $userid);

}
}
?>