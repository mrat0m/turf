<?php

  include_once("db.php");
  include_once("../logincheck.php");
  if(isset($_POST['pescode'])){
    $bookings=mysqli_query($conn,"SELECT * from booking where id='$_POST[pescode]' and status='booked'");
    if($bookings->num_rows>0){
      $bookings=mysqli_fetch_assoc($bookings);
    }else{
      echo "PESCODE already used";
      ?>
      <div class="modal-body">
        PESCODE already used
        <div class="" id="message">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="back()" >Back</button>
      </div>
      <?php
    }
    $user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where id='$bookings[uid]'"));
    mysqli_query($conn,"DELETE from otp where phone='$user[phone]'");
    $otp=generateNumericOTP(6);
    mysqli_query($conn,"INSERT into otp(otpcode,phone,date,time) values('$otp','$user[phone]','$date','$time')");
    //mysqli_query($conn,"UPDATE user set phone='$_POST[phone]' where phone='$user_data[phone]'");
    mysqli_query($conn,"UPDATE sms set smscount =smscount-1 , otpsend=otpsend+1 where id='1' " );
    $msg=$otp." is the one time password for pesfields.com";
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



 <div class="modal-body">
   Enter OTP
   <div class="input-group mb-3">
   <input type="text" class="form-control" name="otp" id="otp" value="">
     <div class="input-group-prepend">
       <button type="button" class="btn btn-dark" name="button">Re-Send</button>
     </div>

   </div>
   <div class="" id="message">

   </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-secondary" onclick="back()" >Back</button>
   <button type="button" class="btn btn-success" onclick="verifyotp('<?php echo $_POST['pescode'];?>')" >Verify OTP</button>
 </div>
