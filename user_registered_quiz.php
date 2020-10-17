<head>
    <style>
        #quiz{
            box-shadow: 05px 05px 05px;
            margin:15px;
            margin-left:20px;
            margin-right:20px;
            padding:0px;
        }
         #quiz1{
              font-size:11px;
              margin-left:05px;    
            }
        @media(max-width:789px){
            #quiz1{$
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
<script>
  function secondPass() {
  setInterval(() =>{
 
    window.location = "account.php?q=4";
	   }, 50000);
  }
  
 </script>
</head>

<?php
include 'dbConnection.php';
if (@$_GET['q'] == 4) {
  


	$userid = $_SESSION['userid'];

echo'<div class="container"> 
      <div class="row" style="">';
$m    = "select * from user_registered_quiz inner join quiz on user_registered_quiz.eid = quiz.eid where userid = '$userid' AND quiz.status ='enabled' and user_registered_quiz.paid = 'success' order by quiz.start_time asc";
$mmmdk = mysqli_query($con, $m);
$i    = 1;
while ($rows = mysqli_fetch_assoc($mmmdk)) {

$title      = $rows['title'];
$total      = $rows['total'];
$desc       = $rows['description'];
$correct    = $rows['correct'];
$wrong      = $rows['wrong'];
$photo = $rows['photo'];
$paid = $rows['paid'];
$time       = $rows['time'];
$prize      = $rows['prize'];
$eid        = $rows['eid'];
$tobereg = $rows['tobereg'];
$reg = $rows['users_registered'];
$status     = $rows['status'];
$fee =$rows['entry_fee'];
$start_time = $rows['start_time'];
$tobereg =$rows['tobereg'];
$current_time1 =  date('d-m-yy h:i:sa', strtotime('+50 seconds', strtotime($start_time)));
 $fortysec = strtotime($current_time1);
$start_time = strtotime($start_time);
 $exact_time = strtotime($current_timee);
 if($exact_time >= $start_time and $exact_time < $fortysec )

{
    if($tobereg > 5 || ($tobereg == 2 &&  $reg == 2) || ($tobereg == 5 && $reg ==5) || ($tobereg > 3 && $tobereg != 5) || ($tobereg < 5 && !($tobereg <= 2)))
    {
    

echo'

<div class="col-sm-5 col-md-4 col-xs-11 well1" id="quiz">
      <div class="col-sm-3 col-xs-3" style="margin-top:10px;" id = "load">';
            if(!empty($photo)){  
            echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
	}else{
	  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
	}
	echo '
      </div>&nbsp;&nbsp;&nbsp;
      <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
      <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font> <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span>

      <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
      <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
      Players<br>
      ' . $reg . '/'.$tobereg.'
      </div>
      <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
      Entry<br>
      &#x20b9;' .$fee. '
      </div>      
      <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
      Starts in <br/>
       ----
      </div>
      </div>
<div style="margin-bottom:10px"><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn start" id='.$userid.' style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;padding-left:10px;padding-right:10px">
<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span><b>
<script>secondPass();

</script>Start</b></span></a>
      </div></div></div>';

    }
	else{
echo'<div class="col-sm-5 col-md-4 col-xs-11 well1" id="quiz">
      <div class="col-sm-3 col-xs-3" style="margin-top:10px;">';
            if(!empty($photo)){  
            echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
	}else{
	  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
	}
	echo '
      </div>&nbsp;&nbsp;&nbsp;
      <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
      <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font> <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span>

      <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
      <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
      Players<br>
      ' . $reg . '/'.$tobereg.'
      </div>
      <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
      Entry<br>
      &#x20b9;' .$fee. '
      </div>      
      <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
      Starts in <br/>
       ----
      </div>
      </div>
<div style="margin-bottom:07px;margin-top:07px;"><a  href = "#" style="color:#FFFFFF;background:red;font-size:12px;padding:7px;padding-left:10px;padding-right:10px">&nbsp;<span><b>Quiz disabled</b></span></a>
      </div></div></div>';
		
		}
        
    } 
elseif($exact_time < $start_time) {
$m    = "select * from quiz where eid = '$eid' && status = 'enabled'";
$mmmk23 = mysqli_query($con, $m);
$pp   = mysqli_fetch_assoc($mmmk23);
$id   = $pp['id'];

echo'<div class="col-sm-5 col-md-4 col-xs-11 well1" id="quiz">
      <div class="col-sm-3 col-xs-3" style="margin-top:10px;">';
	if(!empty($photo)){  
            echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
	}else{
	  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
	}
    echo '  </div>&nbsp;&nbsp;&nbsp;
      <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
      <font style="font-size:15px"><b>&nbsp;&nbsp;' .$title. '</b></font> <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;' .$prize. '</span>

      <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
      <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
      Players<br>
      ' . $reg . '/'.$tobereg.'
      </div>
      <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
      Entry<br>
      &#x20b9;' .$fee. '
      </div>      
      <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
      Starts in <br/>
       <p id="demos' . $id . '"></p>
      </div>
      </div>
<div style="margin-bottom:10px">
<a href="#" class = "prizedis" id = '.$id.' data-toggle="modal" data-target="#prize" style="color:lightyellow;line-height:25px">Winning breakup</a><button type="button" class="btn btn-danger">All the best</button></b>
</div></div></div>';
}
}	
}
echo '</div></div>
	<div class="modal fade" id="prize">
	  <div class="modal-dialog">
		<div class="modal-content title1">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span style="color:darkblue;"><h3 class="modal-title" align="center">Winning Breakup</h3>
			<p style="font-size:13px"><b>Note:- </b> It takes sometime to update the rank details. </p></span>
		  </div>
		  <div class="modal-body ajax" >
		  <div style = "margin-left:180px" id = "loader">
<img width="200px" height="200px" src = "https://www.kheloquiz.com/quiz_photo/giphy.gif">	
</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div></div>	';
?>