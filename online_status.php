<?php error_reporting($level = null);
session_start();
include 'dbConnection.php';
$userip = $_SERVER['REMOTE_ADDR'];
mysqli_query($con, "update user set online_status = 'Offline', last_login = NOW() + INTERVAL 750 MINUTE where username = '$_SESSION[username]'");

?>