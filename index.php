<?php
session_start();
include 'functions.php';


if(isset($_SESSION['username']) && (!isset($_SESSION['key']))){
header('location:account.php?q=1');
}
elseif(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
   header('location:dash.php?q=0');
}
else{}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="image/kq.png" type="img/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Kheloquiz  </title>
   
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="js/script.js" type="text/javascript"></script>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/> 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <script src="js/ajax.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<style>
    header {
  position: relative;
  background-color: black;
  height: auto;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color:gray;
  opacity: 0.6;
  z-index: 1;
}

@media (pointer: coarse) and (hover: none) {
  header {
    background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
  }
  header video {
    display: none;
  }
}
</style>
</head>
<body onbeforeunload="return onlinefunction()">

<div class="header">
<div class="row">
<div class="col-lg-6 col-xs-4">
<span class="logo">Kheloquiz</span>
<a href="#" data-toggle="modal" data-target="#login" style="color:lightyellow"><!--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>-->.</a></div>
<div class="col-lg-6 col-xs-8" align="right">
<a href="#" class="btn btn-primary logb" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b> Login </b> </span></a></div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to your Account</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-3 control-label" for="username"></label>  
  <div class="col-md-6">
  <input id="username" name="username" placeholder="Username" class="form-control input-md" type="username">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
    </fieldset>
</form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</header>

    <header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="mp4/bg.mp4" type="video/mp4">
  </video>
  <div class="container h-100" style="min-height:80vh;">
 
<div class="row">

    <div class="col-md-4" style="border-color:#eee;margin-left:10px;margin-right:10px;margin-top:20px;margin-bottom:20px;border-radius:20px;"> 

  <div id="myCarousel" class="carousel slide"  data-ride="caro1usel">
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" >

      <div class="item active">
        <img src="img/slider1.jpg" alt="Los Angeles" style="width:100%;border-radius:7px;">
        <div class="carousel-caption" style="margin-bottom:30px">
          <font style="color:white;font-size:30px;font-family:papyrus;text-align:center">
              Earn upto 500/- real cash in a single quiz. Withdraw money anytime in your bank or upi.
          </font>
        </div>
        <div class="carousel-indicators" style="margin-top:5px">
      <a type="button" style="padding:7px;border-radius:7px" data-target="#myCarousel" data-slide-to="1" class="active btn-primary">Next</a>
    </div>
      </div>

      <div class="item">
        <img src="img/slider2.jpg" alt="Chicago" style="width:100%;border-radius:7px;">
        <div class="carousel-caption" style="margin-bottom:50px">
          <font style="color:white;font-size:30px;font-family:papyrus;text-align:center">
              Play lots of quizzes and win assured real cash. Register Now and get 2 free tickets
          </font>
        </div>
         <div class="carousel-indicators" style="margin-top:5px">
      <a type="button" style="padding:7px;border-radius:7px" data-target="#myCarousel" data-slide-to="2" class="btn-primary">Next</a>
    </div>
      </div>
    
      <div class="item" style="border-color:#eee;background-color: #f8fad2;padding:20px;border-radius:7px;font: 15px "Century Gothic", "Times Roman", "sans-serif;">
     <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <font style="font-size:30px;padding:7px;text-align:middle;">Sign Up</font>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"><?php
if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
}
?></div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" required placeholder="Enter your name" class="form-control input-md" type="text" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12"> 
    <select id="gender" name="gender" required placeholder="Select your gender" class="form-control input-md" >
   <option value="" <?php
if (!isset($_GET['gender']))
    echo "selected";
?>>Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label title1" for="username"></label>
  <div class="col-md-12">
    <input id="username" name="username" required placeholder="Choose a username" class="form-control input-md" type="username" style="<?php
if (isset($_GET['q7']))
    echo "border-color:red";
?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>  
  <div class="col-md-12">
  <input id="phno" name="phno" required placeholder="Enter your mobile number" class="form-control input-md" type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>  
  <div class="col-md-12">
  <input id="phno" name="email" required placeholder="Enter your Email" class="form-control input-md" type="email">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" required placeholder="Enter your password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" required placeholder="Confirm Password" class="form-control input-md" type="password">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" style="text-align: center"> 
    <input  type="submit" value=" Register Now " class="btn btn-primary" style="text-align:center" />
  </div>
</div>

</fieldset>
</form>
      </div>

    </div>

  </div>
</div>

  <!--<form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <h3 align="center">Sign Up</h3>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"><?php
if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
}
?></div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" required placeholder="Enter your name" class="form-control input-md" type="text" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12"> 
    <select id="gender" name="gender" required placeholder="Select your gender" class="form-control input-md" >
   <option value="" <?php
if (!isset($_GET['gender']))
    echo "selected";
?>>Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label title1" for="username"></label>
  <div class="col-md-12">
    <input id="username" name="username" required placeholder="Choose a username" class="form-control input-md" type="username" style="<?php
if (isset($_GET['q7']))
    echo "border-color:red";
?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>  
  <div class="col-md-12">
  <input id="phno" name="phno" required placeholder="Enter your mobile number" class="form-control input-md" type="number">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="phno"></label>  
  <div class="col-md-12">
  <input id="phno" name="email" required placeholder="Enter your Email" class="form-control input-md" type="email">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" required placeholder="Enter your password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" required placeholder="Confirm Password" class="form-control input-md" type="password">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12" style="text-align: center"> 
    <input  type="submit" value=" Register Now " class="btn btn-primary" style="text-align:center" />
  </div>
</div>

</fieldset>
</form>-->
</div>
</div></div>

<div class="col-md-7"></div>

</div>
  </div>
</header>

<div class="row footer">
<div class="col-md-2 box">
<a href="extras.php" style="color:lightyellow;" onmouseover="this.style('color:yellow')">About Us</a></div>
<div class="col-md-2 box">
<a href="extras.php" s style="color:lightyellow;" onmouseover="this.style('color:yellow')" >Feedback</a></div>
<div class="col-md-4 box">
            <span class="social-icons"><font style="color:white">Join us on</font> &nbsp;
        <a href="https://www.facebook.com/kheloquiz-111333840432061/" title="facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="mailto:kheloquiz3@gmail.com" title="mail us">
          <i class="fab fa fa-envelope"></i>
        </a>
        <a href="https://www.instagram.com/kheloquiz/" title="instagram">
          <i class="fab fa-instagram"></i>
        </a>
  </span>
</div>
<div class="col-md-4 box">
<span href="#" data-target="#login" style="color:lightyellow">All rights reserved @ Kheloquiz<br><br></span>
</div>
   <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:darkblue;font-size:12px;font-weight: bold">Login to admin</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>

      </div>
    </div>
  </div>
</div>
</body>
</html>
