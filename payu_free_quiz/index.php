<?php
session_start();
include '../dbConnection.php';

if(isset($_GET['addmoney']))
{
$userid = $_SESSION['userid'];
$sql = "select * from user where id = '$userid'";
$pp = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($pp);
$name  = $row['name'];
$email  = $row['email'];
$phone  = $row['phno'];
}
?>
<?php
$abhi = "pQxFDsex";
$rathi = "1IuEQC9Qk9";
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	
	$ee = $_SERVER['REQUEST_URI'];
	$eee = explode("?", "$ee");
	$eee = explode("index.php?", "$ee");
	
	return $protocol . $_SERVER['HTTP_HOST'] . $eee[0] . 'response.php';
}
 

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" ></script>-->
<!-- BOLT Production/Live--> 
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524"></script>
<link  rel="stylesheet" href="css/font.css">
<link  rel="stylesheet" href="css/bootstrap.css">
<link  rel="stylesheet" href="css/bootstrap.theme.css">
</head>
<style type="text/css">
	.main {
	    max-width:475px;
		margin:15px;
		padding:15px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	@media(min-width:987px)
	{
	   .main {
	       margin-top:20px;
		margin:auto;
		max-width:475px;
		padding:25px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
	.well {
		background-color:#e2f0d3;
	}
</style>
<body>
<div class="main well">
	<div>
    	<img src="images/payumoney.png" />
    </div>
    <div>

    	<h3>Add money in your Wallet</h3>
    </div>
	<form action="#" id="payment_form" class="form-group">
<input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
 <input type="hidden" id="surl" name="surl"  value="<?php echo getCallbackUrl(); ?>" /> 
<input type="hidden" id="key" name="key" placeholder="Merchant Key" value="<?php echo $abhi;?>" />
<input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="<?php echo $rathi;?>" />
<div class="dv ">
<span class="text"><label>Transaction ID:</label></span>
<span><input type="text" id="txnid" name="txnid" disabled placeholder="Transaction ID" class="form-control input-md" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
</div>

<div class="dv">
<span class="text"><label>Amount:</label></span>
<span><input type="text" id="amount" name="amount" placeholder="Amount" class="form-control input-md" class="form-control input-md" required /></span>    
</div>

<div class="dv">
<span class="text"><label>Payment Purpose:</label></span>
<span><input type="text" id="pinfo" class="form-control input-md" value = "Quiz" name="pinfo" placeholder="Payment Purpose" value="" /></span>
</div>

<div class="dv">
<span class="text"><label>First Name:</label></span>
<span><input type="text" id="fname" class="form-control input-md" value = <?php echo "$name"; ?> name="fname" placeholder="First Name" value="" /></span>
</div>

<div class="dv">
<span class="text"><label>Email ID:</label></span>
<span><input type="text" id="email" class="form-control input-md" value = <?php echo "$email"; ?> name="email" placeholder="Email ID" value="" /></span>
</div>

<div class="dv">
<span class="text"><label>Mobile/Cell Number:</label></span>
<span><input type="text" id="mobile" class="form-control input-md" value = <?php echo "$phone"; ?> name="mobile" placeholder="Mobile/Cell Number" value="" /></span>


<span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
<span><input type="hidden" name="eid" id="eid" placeholder="eid" value="<?php echo $eid; ?>" /></span>
</div>
<div align="right" style="margin:10px;">
    <a style="margin-right:35px;" href="https://www.kheloquiz.com/account.php?q=5">Go back</a>
<input name="txn" type="submit" class="btn btn-primary" value="Proceed to add money" onclick="launchBOLT(); return false;" /></div>
</form>

</div>
  </div>
<script type="text/javascript"><!--
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: 'index.php',
          type: 'post',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	salt: $('#salt').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	eid : $('#eid').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+BOLT.response.salt+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"eid\" value=\"'+BOLT.response.eid+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>	

</body>
</html>
	
