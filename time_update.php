<?php
include 'dbConnection.php';
session_start();
if(isset($_GET['eid']) && isset($_GET['sns']) && isset($_SESSION['6e447159425d2d']))
{
$eid = $_GET['eid'];	
$sn = $_GET['sns'];
$q = "select time from user_registered_questions where eid = '$eid' and sn = '$sn' and username = '$_SESSION[username]'";
$pp = mysqli_query($con, $q);
$uyu = mysqli_fetch_assoc($pp);
$time = $uyu['time'];
if($time != 0)
{
 $sql  = "update user_registered_questions set time = time - 1 where eid = '$eid' and sn = '$sn' and username = '$_SESSION[username]'";
 mysqli_query($con, $sql);
}
}

if(isset($_GET['eid']) && isset($_GET['sn']) && isset($_SESSION['6e447159425d3d']))
{
$eid = $_GET['eid'];	
$sn = $_GET['sn'];
$q = "select time from questions where eid = '$eid' and sn = '$sn'";
$pp = mysqli_query($con, $q);
$uyu = mysqli_fetch_assoc($pp);
$time = $uyu['time'];
if($time != 0)
{
$sql  = "update questions set time = time-1 where eid = '$eid' and sn = '$sn'";
 mysqli_query($con, $sql);
}
}
?>