<?php error_reporting($level=null);
session_start();
include "dbConnection.php";

if (isset($_SESSION['username'])) {
    mysqli_query($con, "update user set last_login = NOW() + INTERVAL 750 MINUTE where username = '$_SESSION[username]'");
    session_destroy();
}
$ref = @$_GET['q'];
header("location:index.php");
?>