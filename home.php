
	<head>
		<style>
		
			#quiz{
				box-shadow: 05px 05px 05px;
				margin:15px;
				margin-bottom
				margin-left:20px;
				margin-right:20px;
				padding:0px;
			}
			 #quiz1{
				  font-size:11px;
				  margin-left:05px;    
				}
			@media(max-width:789px){
				#quiz1{
				  font-size:13px;
				  margin-left:20px;    
				}
			}
		 @media(min-width:990px){
				#quiz{
				box-shadow: 05px 05px 05px;
				margin:15px;
				margin-left:70px;
				margin-right:50px;
				padding:0px;
			}
		</style>
	
	</head>
	<?php
	include 'dbConnection.php';
	echo '<div id = "time_update"></div>';
	if (@$_GET['q'] == 1) {

	$qqstu = "select * from quiz WHERE status = 'enabled' order by start_time asc; select paid, time, total, correct, wrong, description, title, userid, status, prize from user_registered_quiz where paid='success' || paid = 'pending'";
	$pp = mysqli_multi_query($cone, $qqstu);
	 $c  = $d-1;
	do {
	if ($resulted = mysqli_store_result($cone)) {

	while ($rowe = mysqli_fetch_assoc($resulted)) 
	{
	 
	$id        = $rowe['id'];

	$pays      = $rowe['payment'];
	$fee =     $rowe['entry_fee'];
	$paid      = $rowe['paid'];
	$title     = $rowe['title'];
	$total     = $rowe['total'];
	$correct   = $rowe['correct'];
	$wrong     = $rowe['wrong'];
	$time      = $rowe['time'];
	$eid       = $rowe['eid'];
	$registerede = $rowe['users_registered'];
	$tobereg = $rowe['tobereg'];
	$user_eid  = $rowe['eid'];
	$desc      = $rowe['description'];
	$prize     = $rowe['prize'];
	$stat      = $rowe['status'];
	$photo = $rowe['photo'];
	$usudr     = $rowe['userid'];
	$startime  = $rowe['start_time'];
	$starttime = strtotime($startime);
	$keid = $rowe['eid'];
		$current_time1 =  date('d-m-yy h:i:sa', strtotime('+1 minutes', strtotime($startime)));
	 $onemin = strtotime($current_time1);
	 $exact_time = strtotime($current_timee);
	 if($exact_time < $onemin ){
		 $c++;
	 }

	$y = "SELECT score FROM history WHERE eid='$eid' AND username='$username'";

	$q1a2 = mysqli_query($con, $y) or die('Error98');
	$rowcount = mysqli_num_rows($q1a2);
	$pea = "SELECT * from user_registered_quiz WHERE userid='$_SESSION[userid]' and status ='enabled' and paid='success' || paid='pending'";

	$q13 = mysqli_query($con, $pea) or die('Error98');
	$check = mysqli_num_rows($q13);

	if ($rowcount == 0) {


	if ($check > 0 ) {
			$ye = "SELECT eid FROM user_registered_quiz where status = 'enabled' and userid = '$_SESSION[userid]' && paid = 'success'";

	$q1a3 = mysqli_query($con, $ye) or die('Error98');

	while($seiddd = mysqli_fetch_assoc($q1a3))
	{
		
		 
	$eeeid  = $seiddd['eid'];
	if($keid == $eeeid)
	{
		if($exact_time < $onemin)

		{
		 
		$quii = "select users_registered from quiz where eid = '$eeeid'";
	  $qled = mysqli_query($con, $quii) or die('Error98');
		$rwo = mysqli_fetch_assoc($qled);
	   $reg = $rwo['users_registered'];
	   
	   if($paid != 'pending'){

		 echo'<div class="col-sm-6 col-md-4 col-xs-11 well3" id="quiz">
		  <div class="col-sm-3 col-xs-3" style="margin-top:10px;">
		  '; if(!empty($photo)){  
				echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
		}else{
		  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
		}
		  echo '
		  </div>&nbsp;&nbsp;&nbsp;
		  <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
		  <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font><span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span><br>
          <a href="#" class = "prizedis" id = '.$id.' data-toggle="modal" data-target="#prize" style="color:lightyellow;line-height:25px">Winning breakup</a>
		  <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
		  <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
		  Players<br>
		  '.$registerede.'/'.$tobereg.'
		 
		  </div>
		  <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
		  Entry<br>
		  <b><font style ="color:green">paid</font></b>
		  </div>      
		  <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
		  Starts in <br/>';
	 
	 if(!($registerede >= $tobereg))
	{
		echo '
	<span id="demo' . $id . '"></span>
	';}
		echo '
		  </div>
		  </div>
		 <div style="margin-bottom:10px"> <b><a href = "account.php?q=4" class = "btn btn-success" style="padding:7px;margin-top:7px;">
			Registered</a></b>
			</div></div></div>';  
		 
	}
	}
	}
	}
	}

	if ($starttime >= $current_time) {
	 $oo     = "select * from user_registered_quiz inner join quiz on user_registered_quiz.eid = quiz.eid where user_registered_quiz.eid= '$eid' && user_registered_quiz.userid = '$userid' && user_registered_quiz.paid != 'pending'";
	$ooere  = mysqli_query($con, $oo);

	$exists = (mysqli_num_rows($ooere));
	if (!$exists) {
		
		 echo '<div class="col-sm-6 col-md-4 col-xs-11 well3" id="quiz">
		  <div class="col-sm-3 col-xs-3" style="margin-top:10px;">
		  '; if(!empty($photo)){  
				echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
		}else{
		  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
		}
		  echo '
		  </div>&nbsp;&nbsp;&nbsp;
		  <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
		  <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font> <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span><br>
          <a href="#" class = "prizedis" id = '.$id.' data-toggle="modal" data-target="#prize" style="color:lightyellow;line-height:25px">Winning breakup</a>
		  <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
		  <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
		  Players<br>
			'.$registerede.'/'.$tobereg.'


		</div>' ;
	if($fee == 0)
	{
	echo' <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
		  Entry<br>
		  <b><font style ="color:green">Free</font></b>
		  </div> ';

	}
	else{
	echo '<div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
		  Entry<br>
		  <b>&#x20b9;' .$fee. '</b>
		  </div> ';	

	}
	echo ' <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >Starts in <br/>';
	if(!($registerede >= $tobereg))
	{
		echo '
	<span id="demo' . $id . '"></span>
	';}
	   echo '</div></div>';
		  
	echo '
	<form method="GET" action="payu/index.php">';
	echo '	
	<input type="hidden" name = "eid" value= ' . $eid . '>
	<input type="hidden" name = "wallet" value= "' . $wallet . '">
	<input type="hidden" name = "title" value= "' . $title . '">
	<input type="hidden" name = "correct" value= ' . $correct . '>
	<input type="hidden" name = "wrong" value= ' . $wrong . '>
	<input type="hidden" name = "total" value= ' . $total . '>
	<input type="hidden" name = "time" value= ' . $time . '>
	<input type="hidden" name = "start_time" value= "' . $startime . '">
	<input type="hidden" name = "prize" value= ' . $prize . '>
	<input type="hidden" name = "desc" value= ' . $desc . '>
	<input type="hidden" name = "status" value= ' . $stat . '>
	<input type="hidden" name = "fees" value= ' . $fee. '>';
	$amountdf = "select * from user where username = '$_SESSION[username]'";
	$deduct = mysqli_query($con, $amountdf);
	$row= mysqli_fetch_assoc($deduct);

	$wallet = $row['wallet'];
	$tickets = $row['tickets'];
	$tikstatus = $row['tickets_status'];

	if(!($registerede >= $tobereg))
	{
		
	echo '<div style="margin-bottom:10px"><button type="submit"  name="register_now" class = "btn btn-primary btn btn-sm" style="padding:7px;margin-top:7px;">';
	echo 'Register Now </button>';
	if($tickets > 0 && $tikstatus == 'claimed' && ($tobereg==2 || $tobereg == 5) && $fee <= 20)
	{ echo '<b>OR</b>
		
	<button class = "btn btn-primary" name = "fee" value = "1" type = "submit" style="margin-top:7px;">
				Use ticket</button><br> '.$tickets.' tickets left';
				}
	}

	else{
	echo '<button type="button"  name="register_now" class = "btn btn-danger btn btn-md" 
	style="padding:7px;margin-top:7px;">
	Registrations Closed</button>';
	}
		echo '</form></div></div></div>';	
	}
	
	}
	} 
	else {
	$q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$eid' ") or die('Errorfg197');
	while ($row = mysqli_fetch_array($q)) {
	$timec  = $row['timestamp'];
	$status = $row['status'];
	}

	$q = mysqli_query($con, "SELECT * FROM user_registered_quiz WHERE eid='$eid' ") or die('Error19df7');
	while ($row = mysqli_fetch_array($q)) {
	$ttimec  = $row['time'];
	$qstatus = $row['status'];

	}
	$remaining = (($ttimec * 60 ) - ((time() - $timec)));

	if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") {

		 echo'<div class="col-sm-6 col-md-4 col-xs-11 well3" id="quiz">
		  <div class="col-sm-3 col-xs-3" style="margin-top:10px;">
		  '; if(!empty($photo)){  
				echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
		}else{
		  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
		}
		  echo '
		  
		  </div>&nbsp;&nbsp;&nbsp;
		  <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
		  <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font> 
		  <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span>

		  <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
		  <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
		  Players<br>
		  '.$registerede.'/'.$tobereg.'
		  
		  </div>
		  <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
		  Entry<br>
		  <b>' . $_SESSION['fee'] = $fee . '</b>
		  </div>      
		  <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
		  Starts in	 <br/>
		   ' .$stime. '
		  </div></div>
		 <div style="margin-bottom:10px"><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" 
		 style="padding:7px;margin-top:7px;background:darkorang;color:white">&nbsp;
		 <span class="title1"><b>Continue</b></span></a></b>
			   </div></div>';

	} 
	}
	}
	echo '</div></div></div>';
	mysqli_free_result($resulted);
	}
	}
	while (mysqli_next_result($cone));
	echo '<div class="well" style="margin:20px;">';
	$c = 0;
	echo '<div style="padding-top:1px;padding:05px;word-wrap:break-word">
	<h3 align="center" style="font-family:calibri;">:: General Instructions ::</h3><br />
	<ul type="circle"><font style="font-size:16px;font-family:calibri">';
	$file = fopen("instructions.txt", "r");

	while (!feof($file)) {
	echo '<li>';
	$string = fgets($file);
	$num    = strlen($string);
	$c      = str_split($string);
	for ($i = 0; $i < $num; $i++) {
	$last = $c[$i];
	if ($c[$i] == ' ' && $last == ' ') {
	echo '&nbsp;';
	} else {
	echo $c[$i];
	}
	}
	echo "</li><br />";
	} 

	fclose($file);
	echo '</font></ul></div></div>';
	}

	?>

	 
