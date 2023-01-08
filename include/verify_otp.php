<?php
  include_once("db.php");
  session_start();

  function generateNumericOTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
  }
  if(isset($_POST['otp'])){
    $otp_check=mysqli_query($conn,"SELECT * FROM otp where otpcode='$_POST[otp]' and phone='$_POST[phone]'");
    //echo "SELECT * FROM otp where otp='$_POST[otp]' and phone='$_POST[phone]'";
    if($otp_check->num_rows > 0){
      mysqli_query($conn,"UPDATE user set status='verified' where phone='$_POST[phone]'");
      $pass=generateNumericOTP(6);
      mysqli_query($conn,"DELETE FROM pass where phone='$_POST[phone]'");
      mysqli_query($conn,"INSERT into pass (phone,pass)values('$_POST[phone]','$pass')");
      $_SESSION['pesphno'] = $_POST['phone'];
      $_SESSION['pespass'] = $pass;
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Signup <strong>Successfull!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }else{
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        OTP <strong>Incorrect!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
  }

 ?>
