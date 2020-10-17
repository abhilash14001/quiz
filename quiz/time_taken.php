<?php
include 'dbConnection.php';
session_start();
$userid = $_SESSION['userid'];
$sec = $_POST['second'];
$eid  = $_POST['eid'];
$coo = "update user_registered_quiz set time_taken = '$sec' where eid= '$eid'";
mysqli_query($con, $coo);
echo $coo;
 ?>