<?php

  include_once("db.php");
  include_once("../logincheck.php");
  if(isset($_POST['phone'])){
    mysqli_query($conn,"DELETE from otp where phone='$_POST[phone]'");
    $otp=generateNumericOTP(6);
    mysqli_query($conn,"INSERT into otp(otpcode,phone,date,time) values('$otp','$_POST[phone]','$date','$time')");
    //mysqli_query($conn,"UPDATE user set phone='$_POST[phone]' where phone='$user_data[phone]'");
    mysqli_query($conn,"UPDATE sms set smscount =smscount-1 , otpsend=otpsend+1 where id='1' " );
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
