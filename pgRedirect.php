<?php
include_once("include/db.php");
include_once("logincheck.php");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
session_start();
$checkSum = "";
$paramList = array();
$CUST_ID = $user_data['id'];
if(isset($_POST['paynow'])){
	$dat=$_POST['date'];
	$booking = mysqli_query($conn,"SELECT * from booking where date='$dat' and time_id='$_POST[check]'");
	if($booking->num_rows>0){
		echo "This time is Already Booked";
	}else{
		//echo $CUST_ID;
		$times= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times where id='$_POST[check]'"));

		mysqli_query($conn,"INSERT into booking (uid,time_id,rate,off,date) values('$CUST_ID','$_POST[check]','$times[rate]','$times[off]','$dat')");
		echo "INSERT into booking (uid,time_id,rate,off,date) values('$CUST_ID','$_POST[check]','$times[rate]','$times[off]','$dat')";

		header("Location:payment.php");



		$rate=($times['rate']-($times['rate']*($times['off']/100)))/10;
		$ORDER_ID = mysqli_insert_id($conn);
		$INDUSTRY_TYPE_ID = "Retail";
		$CHANNEL_ID = "WEB";
		$TXN_AMOUNT = $rate;
		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = PAYTM_MERCHANT_MID;
		$paramList["ORDER_ID"] = $ORDER_ID;
		$paramList["CUST_ID"] = $CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
		$paramList["MSISDN"] = $user_data['phone'];
		$paramList["CALLBACK_URL"] = "https://pesfields.com/pgResponse.php";
		/*
		 //Mobile number of customer
		$paramList["EMAIL"] = $EMAIL; //Email ID of customer
		$paramList["VERIFIED_BY"] = "EMAIL"; //
		$paramList["IS_USER_VERIFIED"] = "YES"; //
		*/
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	}



?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
<?php
}else{
	echo "Somwthing went wrong";
}
?>
