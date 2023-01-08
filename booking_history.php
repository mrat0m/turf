

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

    <?php include_once("include/nav.php");?>
    <?php
      if(isset($_POST['cancel'])){
        $booking_ver = mysqli_query($conn,"SELECT * from booking where id='$_POST[cancel_id]' and uid='$user_data[id]'");
        if($booking_ver->num_rows>0){
          mysqli_query($conn,"DELETE from booking where id='$_POST[cancel_id]' and uid='$user_data[id]'");
        }
      }
     ?>

    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div><br>
    <div class="container fit-lg bg-white">

      <div class="heading">
        Your Booking History
      </div>
      <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">PESCODE</th>
          <th scope="col">Paid</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $bookings=mysqli_query($conn,"SELECT * from booking where uid='$user_data[id]' and status='used' or status='expired'");
          while($row=mysqli_fetch_assoc($bookings)){
            $time=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times where id='$row[time_id]'"));
            $timein24  = date("g:i a", strtotime($time['time'].":00"));
            $t=$time['time']+1;
            $timein24plus_1  = date("g:i a", strtotime($t.":00"));
            ?>
           <tr>
             <th scope="row">1</th>
             <td><?php
             if($row['date']==$date){

               echo "Today ".$row['date'];
             }else{
               echo dayname($row['date'])." ".$row['date'];
             }

             ?></td>
             <td><?php echo $timein24; ?> PM to <?php echo $timein24plus_1; ?></td>
             <td>PES<?php echo $row['id']; ?></td>
             <td>₹<?php echo $row['paid']; ?> <!--<button type="button" class="btn btn-danger" name="button" onclick="cancel(<?php //echo $row['id']; ?>)">Cancel</button> --></td>
           </tr>
            <?php
          }
         ?>
      </tbody>
      </table>
    </div>
  </div>
    <br>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You sure to Cancel??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="txt-sm">
          Cancellation won't refund payment
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <form class="" action="" method="post">
          <input type="number" name="cancel_id" id="cancel_id" value="" hidden>
          <button type="submit"   class="btn btn-danger" name="cancel">Cancel</button>
        </form>
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
