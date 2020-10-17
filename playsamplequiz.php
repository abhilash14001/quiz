<?php
include "dbConnection.php";	
if (@$_GET['q'] == 9) {
echo '<div class="container">
      <div class="row" style="">';
$d=1;
$sql = "select * from quiz where status = 'samplequiz' order by id desc";
$fetch = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($fetch)){
$stitle = $row['title'];
$stotal     = $row['total'];
$scorrect   = $row['correct'];
$fee =      $row['entry_fee'];
$swrong     = $row['wrong'];
$stime      = $row['time'];
$sdesc      = $row['description'];
$sprize     = $row['prize'];
$tobereg =$row['tobereg'];
$registered = $row['users_registered'];
$seid = $row['eid'];
$photo = $row['photo'];


    echo' <div class="col-sm-5 col-md-4 col-xs-11 well3" id="quiz">
      <div class="col-sm-3 col-xs-3" style="margin-top:10px;">
     '; if(!empty($photo)){  
            echo '<img src="quiz_photo/'.$photo.'" width = 100px; height = 100px; alt="movie_pic">	';
	}else{
	  echo '<img src="quiz_photo/quizdefault.jpeg" width = 100px; height = 100px; alt="movie_pic">	';
	}
      echo '</div>&nbsp;&nbsp;&nbsp;
      <div class="col-sm-9 col-xs-9" style="margin-top:3px;text-align:right;">
      <font style="font-size:15px"><b>&nbsp;&nbsp;' .$stitle. '</b></font> <span style="background-color:#e6f2ce;width:120px;padding:4px;margin-left:2px;border-radius:5px;">Prize : &#x20b9;----</span>

      <div class="row" id="quiz1" style="margin-left:20px;margin-top:7px">
      <div class="col-sm-4 col-lg-4 col-xs-4" align="center">
      Players<br>
      --------
      </div>
      <div class="col-sm-3  col-lg-3 col-xs-3" align="center" style="margin-right:0px;">
      Entry<br>
      &#x20b9;' .$fee. '
      </div>      
      <div class="col-sm-5 col-lg-5 col-xs-5" align="center" >
      Starts in <br/>
       --------
      </div>
      </div>
      
          <div style="margin-bottom:10px">  <a href="account.php?q=samplequiz&step=2&eid=' . $seid . '&n=1&t=' . $stotal . '&start=start" class="btn start" id='.$userid.' class="btn start" align="center"
 style="margin-top:7px;color:#FFFFFF;background:darkgreen;font-size:12px;padding:7px;"><span class="glyphicon glyphicon-new-window " aria-hidden="true"></span>&nbsp;<span><b>
Start</b></span></a>
</div></div></div>


';
}
}