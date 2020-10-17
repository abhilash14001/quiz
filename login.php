<?php error_reporting($level=null);
session_start();
if (isset($_SESSION["username"])) {
    header('location:account.php?q=1');
    
}
include_once 'dbConnection.php';
$ref      = @$_GET['q'];
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$username = addslashes($username);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
$result = mysqli_query($con, "SELECT name, id, username FROM user WHERE username = '$username' and password = '$password'") or die('Error');
$count = mysqli_num_rows($result);
if ($count == 1) {
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
		$id = $row['id'];
    }
    $_SESSION["name"]     = $name;
    $_SESSION["username"] = $username;
	$_SESSION["userid"] = $id;
	    header("location:account.php?q=1");
} else
    header("location:$ref?w=Wrong Username or Password");
?>