<?php error_reporting($level = null);
$postdata = $_POST;
$msg = '';
include '../dbConnection.php';
session_start();
$userid = $_SESSION['userid'];
$fee = $_SESSION['fee'];
if(isset($_SESSION['query'])){
$query = $_SESSION['query'];
    mysqli_multi_query($con, $query);
}


if (isset($postdata ['key'])) {
	$key				=   $postdata['key'];
	
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$udf5				=   $postdata['udf5'];
	$mihpayid			=	$postdata['mihpayid'];
	$status				= 	$postdata['status'];
	$resphash				= 	$postdata['hash'];
		//Calculate response hash to verify	
	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
	$keyArray 	  		= 	explode("|",$keyString);
	$reverseKeyArray 	= 	array_reverse($keyArray);
	$reverseKeyString	=	implode("|",$reverseKeyArray);
	$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));
	
	
	if ($status == 'success'  && $resphash == $CalcHashString) {
		echo $msg = "Transaction Successful";
		 $msg = "Transaction Successful";

	$_SESSION['txn'] = $sql = "update user_registered_quiz set paid = 'success' where userid = '$userid' and eid = '$_SESSION[PEID]' and paid = 'pending'; update user set wallet = wallet + '$amount' where id = '$userid'; update user set wallet = wallet - '$fee' where username = '$_SESSION[username]'";
	
		 unset($_SESSION['PEID']);
		 echo '<meta http-equiv="refresh" content="0.1; URL=../account.php?q=4">';  
		 //Do success order processing here...
	}
	else {
		//tampered or failed
		if($amount >= $fee)
		{
		    unset($_SESSION['query']);
	    $_SESSION['txn'] = "update user_registered_quiz set paid = 'success' where userid = '$userid' and eid = '$_SESSION[PEID]'; update user set wallet = wallet + '$amount' where id = '$userid'; update user set wallet = wallet - '$fee' where username = '$_SESSION[username]'";
	
	
		 unset($_SESSION['PEID']);
		 unset($_SESSION['fee']);
		
		 echo '<script>alert("Amount of Rs. '.$amount.' has been added and Rs. '.$fee.' has been deducted from your wallet for registration of the quiz");</script>';  
		}
		else{
		echo '<script>alert("OOPS insufficient balance amount you have entered for registering the quiz");</script>';  	
			}
		echo '<meta http-equiv="refresh" content="0.1; URL=../account.php?q=4">';  
		 
		
	} 
}
else exit(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Gateway</title>
</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
<div class="main">
	<div>
    	<img src="images/payumoney.png" />
    </div>
    <div>
    	<h3>PHP7 BOLT Kit Response</h3>
    </div>
	
    <div class="dv">
    <span class="text"><label>Merchant Key:</label></span>
    <span><?php echo $key; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Merchant Salt:</label></span>
    <span><?php echo $salt; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span><?php echo $txnid; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Amount:</label></span>
    <span><?php echo $amount; ?></span>    
    </div>
    
    <div class="dv">
    <span class="text"><label>Product Info:</label></span>
    <span><?php echo $productInfo; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>First Name:</label></span>
    <span><?php echo $firstname; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Email ID:</label></span>
    <span><?php echo $email; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Mihpayid:</label></span>
    <span><?php echo $mihpayid; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Hash:</label></span>
    <span><?php echo $resphash; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction Status:</label></span>
    <span><?php echo $status; ?></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Message:</label></span>
    <span><?php echo $msg; ?></span>
    </div>
</div>
</body>
</html>
	