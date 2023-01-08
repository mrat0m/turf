<?php

  include_once("db.php");
  include_once("../logincheck.php");
  if(isset($_POST['pescode'])){
    $bookings=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from booking where id='$_POST[pescode]'"));
    $user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where id='$bookings[uid]'"));
    $otp=mysqli_query($conn,"SELECT * from otp where phone='$user[phone]' and otpcode = '$_POST[otp]'");
    if($otp->num_rows>0){
      ?>

       <div class="modal-body">
         Payment details
         <div class="row">
           <div class="col-md">
             <div class="mb-2">
               <p>Phone: <?php echo $user['phone'];?></p><br>
               <p>Amount paid: <?php echo $bookings['paid'];?></p>
               <p>Amount remaining: <?php echo $bookings['rate']-($bookings['rate']*$bookings['off']/100)-$bookings['paid'];?></p>
               <p>Accept payment and Confirm</p>
             </div>
           </div>
         </div>
         <div class="" id="message">

         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-success" onclick="verify_conf('<?php echo $_POST['pescode'];?>','<?php echo $_POST['otp'];?>')" >Confirm Payment</button>
       </div>

      <?php
    }else{
      echo "something went wrong "."SELECT * from otp where phone='$user[phone]' and otp = '$_POST[otp]'";
    }
  }


 ?>
