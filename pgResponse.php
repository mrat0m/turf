<?php
include_once("include/db.php");
include_once("logincheck.php");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

$order_id=$_POST["ORDERID"];
$paid=$_POST['TXNAMOUNT'];
$txnid=$_POST['TXNID'];
$CUST_ID=$_POST['CUST_ID'];
if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	//	echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$is_already_booked= mysqli_query($conn,"SELECT * from booking where id='$order_id'");
		if($is_already_booked->num_rows>0){
			$is_already_booked_data=mysqli_fetch_assoc($is_already_booked);
			if($is_already_booked_data['uid']==$user_data['id']){
						mysqli_query($conn,"UPDATE booking set status ='booked',paid='$paid' where id='$order_id'");

				    mysqli_query($conn,"UPDATE sms set smscount =smscount-2 , otpsend=otpsend+2 where id='1' " );
						$msg=" Your booking is confirmed . Use your PES".$order_id."at PESFIELDS Vattakattupady for Verification on ".$is_already_booked_data['date'];
				    $to=$user['phone'];
				    $auth_key='274503ALcRgQbdG55e2e020aP1';


				        $curl = curl_init();

				        curl_setopt_array($curl, array(
				          CURLOPT_URL => "http://api.msg91.com/api/v2/sendsms?scheduledatetime=&country=91&sender=&route=&mobiles=&authkey=&encrypt=&message=&flash=&unicode=&afterminutes=&response=&campaign=",
				          CURLOPT_RETURNTRANSFER => true,
				          CURLOPT_ENCODING => "",
				          CURLOPT_MAXREDIRS => 10,
				          CURLOPT_TIMEOUT => 30,
				          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				          CURLOPT_CUSTOMREQUEST => "POST",
				          CURLOPT_POSTFIELDS => "{ \"sender\": \"PESFLD\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"".$msg."\", \"to\": [ \"".$to."\", \"\" ] } ] }",
				          CURLOPT_SSL_VERIFYHOST => 0,
				          CURLOPT_SSL_VERIFYPEER => 0,
				          CURLOPT_HTTPHEADER => array(
				            "authkey: 274503ALcRgQbdG55e2e020aP1",
				            "content-type: application/json"
				          ),
				        ));

				        $response = curl_exec($curl);
				        $err = curl_error($curl);

				        curl_close($curl);


								$msg="A booking has been occured on".$is_already_booked_data['date']." Check booking at pesfields.com/admin";
						    $to='9544267777';
				        $curl = curl_init();

				        curl_setopt_array($curl, array(
				          CURLOPT_URL => "http://api.msg91.com/api/v2/sendsms?scheduledatetime=&country=91&sender=&route=&mobiles=&authkey=&encrypt=&message=&flash=&unicode=&afterminutes=&response=&campaign=",
				          CURLOPT_RETURNTRANSFER => true,
				          CURLOPT_ENCODING => "",
				          CURLOPT_MAXREDIRS => 10,
				          CURLOPT_TIMEOUT => 30,
				          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				          CURLOPT_CUSTOMREQUEST => "POST",
				          CURLOPT_POSTFIELDS => "{ \"sender\": \"PESFLD\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"".$msg."\", \"to\": [ \"".$to."\", \"\" ] } ] }",
				          CURLOPT_SSL_VERIFYHOST => 0,
				          CURLOPT_SSL_VERIFYPEER => 0,
				          CURLOPT_HTTPHEADER => array(
				            "authkey: 274503ALcRgQbdG55e2e020aP1",
				            "content-type: application/json"
				          ),
				        ));

				        $response = curl_exec($curl);
				        $err = curl_error($curl);

				        curl_close($curl);
						?>
						<!DOCTYPE html>
						<html lang="en" dir="ltr">
						  <head>
						    <meta charset="utf-8">
						    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
						    <title></title>
						    <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">

						    <link rel="stylesheet" href="css/bootstrap.css">
						    <link rel="stylesheet" href="css/style.css">
						  </head>
						  <body>
						    <div class="loader" id="loader">
						      <img src="img/loader.svg" alt=""></img>
						    </div>
								<?php include_once('include/nav.php');?>

						    <div class="container d-flex justify-content-center fit">
						      <div class="box"><br><h3 class="text-center">Payment Successfull</h3>

						        <br>
						        <label for=""> Your PESCODE:</label>
						        <div class="pesid">
						          PES<?php echo $order_id;?>
						        </div>
						        <div class="terms-txt">
						          PESCODE is used at venue for reservation verification.
						        </div>

						        <br>
						        <a href="dashboard.php"  class="paynow">Continue</a>

						      </div>
						    </div>
						    <br>






						        <div class="container-fluid wide">
						          <div class="pecoad black">
						            designed by <a href="wwww.pecoad.com">PECOAD.COM</a>
						          </div>
						        </div>

						    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
						    <script src="js/script.js" charset="utf-8"></script>
						    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
						    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
						  </body>
						</html>

						<?php
			}else{
				echo "someebody buyed your slot whild found".$is_already_booked_data['uid']."e you purchase no cust i".$CUST_ID;
			}
		}else{
			echo "someebody buyed your slot while you purchase";
			echo "IF money goes, call this number +91-9544267777";
			//$paytmParams = array();

			/* body parameters */
				/*$paytmParams["body"] = array(

			    "mid" => PAYTM_MERCHANT_MID,

			    "txnType" => "REFUND",

			    "orderId" => $order_id,
			    "txnId" => $txnid,
			    "refId" => rand(),
			    "refundAmount" => $paid,
			);

			$checksum = getChecksumFromString(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_KEY_HERE");

			$paytmParams["head"] = array(

			    "clientId"	=> "C11",
			    "signature"	=> $checksum
			);

			$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

			$url = "https://securegw-stage.paytm.in/refund/apply";

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			$response = curl_exec($ch);*/
		}


	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		mysqli_query($conn,"DELETE from booking where id='$order_id'");
		header('location:dashboard.php');
	}

	/*if (isset($_POST) && count($_POST)>0 )
	{
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}*/


}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
