<?php error_reporting($level=null);
session_start();


date_default_timezone_set('Asia/Kolkata');
$current_timee = date("d-m-yy h:i:sa");
$current_time  = strtotime($current_timee);
include 'dbConnection.php';
include 'functions.php';
if(isset($_SESSION['txn']))
{
$txn = $_SESSION['txn'];
mysqli_multi_query($con, $txn);
unset($_SESSION['txn']);
header("Location:account.php?q=4");
}

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
	.main {
margin-left:230px;

font-family:Verdana, Geneva, sans-serif, serif;
}
.text {
float:left;
width:180px;
}
.dv {
height:40px;
margin-bottom:5px;
}
.well{
   background-color:#c9cf65; 
}
.custom
{
display:inline-block;
margin-left	:300px;
margin-top:20px;
}
.well3 {
  min-height: 160px;
  padding: 10px;
  margin-bottom: 20px;
  background-color: #bad1d0 ;
  border: 1px solid #e3e3e3;
  border-radius: 5px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
}

</style>
<title>Quiz || Kheloquiz </title>
<link  rel="stylesheet" href="css/bootstrap.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php
error_reporting($level = null);
if (@$_GET['w']) {
echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
 
<script type="text/javascript">
<?php if (@$_GET['q'] == 4 || @$_GET['q'] == 1  ) : ?>

function createCountDown(elementId, date) {
var countDownDate = new Date(date).getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
var elem = document.getElementById(elementId);
if(typeof elem != 'undefined' && elem != null) 
{
document.getElementById(elementId).innerHTML = days + "d" + hours + "h" + minutes + "m" + seconds + "s";
if (distance < 0) {
clearInterval(x);
document.getElementById(elementId).innerHTML = "Quiz Has Been Started";

window.location.replace("account.php?q=4");
}
}
}, 1000); 
}
<?php
$qq     = "select id, start_time from quiz WHERE status = 'enabled'";
$result = mysqli_query($con, $qq);
foreach ($result as $pot):
$id     = $pot['id'];
$jtime  = $pot['start_time'];
$jdtime = strtotime($jtime);
$jdm    = date("yy-m-d H:i:s", strtotime($jtime));
?>
createCountDown('demo<?php echo $id; ?>', "<?php echo $jdm;?>");
<?php
endforeach;
?>
<?php
$qq     = "select id, start_time from quiz WHERE status = 'enabled'";
$result = mysqli_query($con, $qq);
foreach ($result as $pot):
$id     = $pot['id'];
$jtime  = $pot['start_time'];
$jdtime = strtotime($jtime);
$jdm    = date("yy-m-d H:i:s", strtotime($jtime));
?>
createCountDown('demos<?php echo $id; ?>', "<?php echo $jdm;?>");
<?php
endforeach; endif;
?> 

</script>
 
</head>
<body>
<div id ="show"></div>	
<div class="header">
<div class="row">
<div class="col-lg-6 col-xs-4">
<span class="logo">kheloquiz</span></div>
<div class="col-lg-6 col-xs-8" align="right">
<?php error_reporting($level = null);

$userid = $_SESSION['userid'];


if (!(isset($_SESSION['username']))) {
    header("location:index.php");


} else {
$name     = $_SESSION['name'];
$username = $_SESSION['username'];

echo '<span class="pull-right top title1" style="padding-right:06px;" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $username . '<br><div align="right" style="padding-right:06px;"><a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></div>
</span>';
}
$iii    = "select * from user where id = '$userid'";
$res    = $con->query($iii);
$row    = $res->fetch_assoc();
$wallet = $row['wallet'];
$earned = $row['earned'];


?>

</div>
</div></div>

<div class="bg">

<nav class="navbar navbar-default title1">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#" style= "margin-left:10px"><b></b></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav">
<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 1)
echo 'class="active"';
?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 2)
echo 'class="active"';
?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;My History</a></li>
<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 9)
	
echo 'class="active"';
?>><a href="account.php?q=9"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;Sample Quiz</a></li>
<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 4)
echo 'class="active"';
?>><a href="account.php?q=4"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;Your Registered Quiz</a></li>


<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 5)
echo 'class="active"';
?>><a href="account.php?q=5"><span class="fa fa-google-wallet" aria-hidden="true"></span>&nbsp;Wallet</a></li>
<li <?php error_reporting($level = null);
if (@$_GET['q'] == 6)
echo 'class="active"';
?>><a href="account.php?q=6"><span class="fa fa-google-wallet" aria-hidden="true"></span>&nbsp;Rank</a></li>
<!--<li <?php error_reporting($level = null);
if (@$_GET['q'] == 7)
echo 'class="active"';
?>><a href="account.php?q=7"><span class="fa fa-google-wallet" aria-hidden="true"></span>&nbsp;Prize Distribution</a></li>-->
<li <?php
error_reporting($level = null);
if (@$_GET['q'] == 8)
echo 'class="active"';
?>><a href="account.php?q=8"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Quiz Expired Till Date</a></li>
</ul>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">

<?php error_reporting($level = null);
include 'home.php';
include 'history.php';
include "playsamplequiz.php"; 
include "samplequiz.php"; 
include "userquiz.php";	
include "resultquiz.php";
include 'leaderboard.php';
include 'user_registered_quiz.php';
include 'wallet.php';
include 'rank.php';
include "expiredquiz.php"; 
include 'prize_distribution.php';
include 'earned_money.php';
?>
</div></div></div></div>



<div class="row footer">
<div class="col-md-2 box">
<a href="extras.php" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" >About</a></div>
<div class="col-md-2 box">
<a href="extras.php" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" >Feedback</a></div>
<div class="col-md-2 box">
<a href="maito:kheloquiz3@gmail.com" style="color:lightyellow;text-decoration:underline" onmouseover="this.style('color:yellow')" >Mail us &nbsp;&nbsp;<i class="glyphicon glyphicon-envelope"></i></a></div>
<div class="col-md-6 box pull right">
<span href="#" data-target="#login" style="color:lightyellow">All rights reserved @ Kheloquiz<br><br></span></div>
</div>
</div>


<script>
		
			$('.prizedis').click(function(){
			    	$("#loader").show();
                    
				var id = $(this).attr("id");
				
				$.ajax({
					
					url:'prizeajax.php',
					method: 'POST',
					dataType:"html",
					data:{id:id},
			
                    
				
					success:function(data)
					{
					$("#loader").hide();
						$('.ajax').html(data);
							
                     
									
					},
					error:function(data)
					{
					    	$("#loader").hide();	
						$('.ajax').html("<font color='red' align = 'center'><h4>Error Loading, Please Check Your Internet Connection</h4></font>");
					},
					
					});
				
				});
		
		 
		 
			

</script>
<script>
 <?php 
if(@$_GET['q'] == 'quiz' || @$_GET['q'] == 'samplequiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) || isset($_SESSION['6e447159425d3d'])):
?>
$(document).ready(function(){ 
var set = setInterval(() => {
$.ajax({
url:"time_taken.php", 
});
}, 1000);
$('#stop').click(function(){
	clearInterval(set);
	
});

});
<?php endif;?>
  /* $('#stop').click(function(e){
   if(!$("input[name='ans']:checked").val()){
       alert('NO Options is CHECKED');
       e.preventDefault();
       
   }
   }); */
</script>

<script src="js/ajax.js" type="text/javascript"></script> 

<script src="js/jquery.js" type="text/javascript"></script>

</body>
</html>