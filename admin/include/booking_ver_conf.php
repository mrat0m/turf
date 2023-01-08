<?php

  include_once("db.php");
  include_once("../logincheck.php");
  if(isset($_POST['pescode'])){
    $bookings=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from booking where id='$_POST[pescode]'"));
    $user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where id='$bookings[uid]'"));
    $otp=mysqli_query($conn,"SELECT * from otp where phone='$user[phone]' and otpcode = '$_POST[otp]'");
    if($otp->num_rows>0 && $bookings['status']=="booked"){
      mysqli_query($conn,"UPDATE booking set status='used' where id='$_POST[pescode]' ")
      ?>

       <div class="modal-body">
         Booking details
         <div class="row">
           <div class="col-md">
             <div class="mb-2">
               <p>Booking used and Payment Confirmed succcessfully</p><br>
             </div>
           </div>
         </div>
         <div class="" id="message">

         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-success" onclick="back()" >Okay</button>
       </div>

      <?php
    }else{
      echo "something went wrong "."SELECT * from otp where phone='$user[phone]' and otp = '$_POST[otp]'";
    }
  }


 ?>
