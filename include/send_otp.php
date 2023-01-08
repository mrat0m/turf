<?php

  include_once("db.php");
  if(isset($_POST['phone'])){

    mysqli_query($conn,"DELETE from otp where phone='$_POST[phone]'");
    mysqli_query($conn,"INSERT into user(phone,name) values('$_POST[phone]','$_POST[name]')");
    $otp=generateNumericOTP(6);

    $msg=$otp." is the one time password for pesfields.com";
    $to=$_POST['phone'];
    mysqli_query($conn,"INSERT into otp(otpcode,phone,date,time) values('$otp','$_POST[phone]','$date','$time')");
    mysqli_query($conn,"UPDATE sms set smscount =smscount-1 , otpsend=otpsend+1 where id='1' " );
    $auth_key='274503ALcRgQbdG55e2e020aP1';


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.msg91.com/api/v2/sendsms?scheduledatetime=&country=91&sender=&route=&mobiles=&authkey=&encrypt=&message=&flash=&unicode=&afterminutes=&response=&campaign=",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 100,
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

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }

  function generateNumericOTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
  }

 ?>
