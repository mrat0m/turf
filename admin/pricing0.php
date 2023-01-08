
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

    <?php include_once("include/nav.php"); ?>

    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div><br>
    <div class="container fit-lg bg-white">

      <div class="heading">
        Today's Booking
      </div>
      <div class=" table-responsive">
      <table class="table table-bordered">

      <form class=""  method="post">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Monday</th>
          <th scope="col">Tuesday</th>
          <th scope="col">Wednesday</th>
          <th scope="col">Thursday</th>
          <th scope="col">Friday</th>
          <th scope="col">Saturday</th>
          <th scope="col">Sunday</th>
        </tr>
      </thead>
      <tbody>
          <?php
            for ($t=1; $t <25 ; $t++) {
              ?>
              <tr>
                <td><?php echo $t; ?></td>
              <?php
              $times=mysqli_query($conn,"SELECT * FROM times where time='$t'");
                while($row=mysqli_fetch_assoc($times)){
                  ?>
                  <td><?php
                  $time_in_12_hour_format  = date("g:i a", strtotime($row['time'].":00"));
                  echo $time_in_12_hour_format;
                  ?><br>
                  ₹<input type="number" class="fomr-control"  value="<?php echo $row['rate'];?>"><br>
                  off %<input type="number" class="fomr-control"  value="<?php echo $row['off'];?>"><br>
                  <button type="button" class="btn-edt" name="button">EDT</button>
                </td>
                  <?php
                }
              ?>
            </tr>
              <?php
            }
           ?>

      </tbody>
      </table>
      </form>
      </div>
    </div>
  </div>
    <br>



    <div class="container-fluid wide">
      <div class="pecoad black">
        designed by <a href="https://www.pecoad.com">PECOAD.COM</a>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
