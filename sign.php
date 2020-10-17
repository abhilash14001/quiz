<?php
session_start();
include 'dbConnection.php';
include 'functions.php';
$name     = $_POST['name'];
$name     = ucwords(strtolower($name));
$gender   = $_POST['gender'];
$username = $_POST['username'];
$phno     = $_POST['phno'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email   = $_POST['email'];
$name     = stripslashes($name);
$name     = addslashes($name);
$name     = ucwords(strtolower($name));
$gender   = stripslashes($gender);
$gender   = addslashes($gender);
$username = stripslashes($username);
$username = addslashes($username);
$phno     = stripslashes($phno);
$phno     = addslashes($phno);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
$cpassword = stripslashes($cpassword);
$cpassword = addslashes($cpassword);
$cpassword = md5($cpassword);


$_SESSION["username"] = $username;
$_SESSION["name"]     = $name;

if($password!= $cpassword)
{
    
    
    echo '<meta http-equiv="refresh" content="0.1; URL=index.php">';
    session_destroy();
    exit('<script>alert("Password Does not Match");</script>');
    
}
$q3 = mysqli_query($con, "INSERT INTO user VALUES (NULL,'$name','$email', '$gender', '$username', '$phno', '$password', 0, 0, 2, 'unclaimed', NOW() + INTERVAL 750 MINUTE)");
if ($q3 && $password == $cpassword) {
    

echo '<script>alert("Registration Successful, Login to continue	");</script>';
session_destroy();
    echo '<meta http-equiv="refresh" content="0.1; URL=index.php">';
} else {
	$query = "select username, name from user";
$min = mysqli_query($con, $query);
if(mysqli_num_rows($min)>0)
{
echo '<meta http-equiv="refresh" content="0.1; URL=index.php?q7=Username already exists. Please choose another">';
}
}

?>