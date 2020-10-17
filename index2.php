<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="image/kq.png" type="img/icon" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kheloquiz</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/coming-soon.min.css" rel="stylesheet">

</head>

<body>

  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="mp4/bg.mp4" type="video/mp4">
  </video>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <h1 class="mb-3"><img src="image/kq.png" width="20%" height="20%">&nbsp; Kheloquiz</h1>
            <h2 class="mb-3">Coming soon!!</h2>
            <p class="mb-5">We're working hard to finish the development of this site. Our target launch date is
              <strong>April 2020</strong>! Sign up for updates using the form below!</p>

                 <form class="form-horizontal" name="form" action="index.php" method="POST">
  <div>
<div class="form-group">
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required="">
    </div>
    <div class="form-group ">
      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="">
    </div>
    <div class="form-group ">
      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone no.">
    </div>
  <div class="form-group">
    <div class="form-check">
      <label for="fields" >Select your interest fields</label><br>
      <input class="form-check-in1put" type="checkbox" name="fields[]" value="cricket" id="gridCheck" required="">
        Cricket
      
      <input class="form-check1-input" type="checkbox" name="fields[]" value="moives" id="gridCheck">
        Movies
      
    </div>
  </div>
  <div class="form-group ">
      <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="2" placeholder="Start your message "></textarea>
    </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
  
      <li class="list-unstyled-item">
        <a href="https://www.facebook.com/kheloquiz-111333840432061/">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="https://www.instagram.com/kheloquiz/">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/coming-soon.min.js"></script>
  
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'quiz');
 
/* Attempt to connect to MySQL database */
include 'config.php';
 
 if(!$con){
       echo "Not connected..";
}

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$email = $_POST['email'];
$fields = $_POST['fields'];
$msg = $_POST['msg'];
$phone = $_POST['phone'];
$chk="";
foreach($fields as $chk1)  
   {  
      $chk .= $chk1.", ";  
   }
$sql = mysqli_query($con,"INSERT INTO form(name, email, phone, fields, msg) 
  VALUES ('$name', '$email', '$phone', '$chk', '$msg')");
 
 echo '<script type="text/javascript">
alert("Registered Successfully");
</script>';

mysqli_close($con);
 }
 ?>

</body>

</html>
