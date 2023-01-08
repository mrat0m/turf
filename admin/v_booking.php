<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="loader" id="loader">
      <img src="img/loader.svg" alt=""></img>
    </div>
    <?php include_once("include/nav.php"); ?>

    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div><br>
    <div class="container fit-lg bg-white">

      <div class="heading">
        Today's Verified Booking
        <button type="button" class="btn btn-success right" name="button" data-toggle="modal" data-target="#ver_booking">Verify</button>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">User,Phone</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">PESCODE</th>
            <th scope="col">Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php

                    $date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
                    $date = $date1->format('Y-m-d');
          $i=1;
            $users=mysqli_query($conn,"SELECT * from booking where status='used' and date='$date'");
            while($row=mysqli_fetch_assoc($users)){
              $times=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times where id='$row[time_id]'"));
                $time_in_12_hour_format  = date("g:i a", strtotime($times['time'].":00"));
                $user_info=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where id='$row[uid]'"));
              ?>
               <tr>
                 <th scope="row"><?php echo $i; $i++;?></th>
                 <td><?php echo $user_info['name']."\n".$user_info['phone']; ?></td>
                 <td><?php echo $row['date']; ?></td>
                 <td><?php echo $time_in_12_hour_format; ?></td>
                 <td><?php echo $row['id']; ?></td>
                 <td>₹<?php echo $row['paid']; ?></td>
               </tr>
              <?php
            }
           ?>
        </tbody>
        </table>
      </div>

    </div>
  </div>
    <br>

    <div class="modal fade" id="ver_booking" tabindex="-1" role="dialog" aria-labelledby="ver_booking" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verify Booking</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="" id="otp-form">

          <div class="modal-body">
              Enter PESCODE
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">PES</span>
                </div>
                <input type="number" class="form-control" name="pescode" id="pescode" value="" aria-label="Username" aria-describedby="basic-addon1">
              </div>

            <div class="" id="message">

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" onclick="get_ver_otp()" >Send OTP</button>
          </div>
          </div>
        </div>
    </div>
  </div>



    <div class="container-fluid wide">
      <div class="pecoad black">
        designed by <a href="https://www.pecoad.com">PECOAD.COM</a>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
