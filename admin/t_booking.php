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
   <div class="content pb-0" id='printMe'>
    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div><br>
    <div class="container fit-lg bg-white">

      <div class="heading">
        Booking Report 
      </div>
      <?php
        if(isset($_POST['date1'])){
          $date0=$_POST['date1'];
        ?>
        <div class="table-responsive">
          <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">User Info</th>
              <th scope="col">Paid</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;
              $users=mysqli_query($conn,"SELECT * from booking where status='booked' and date='$date0'");
              while($row=mysqli_fetch_assoc($users)){
                $times=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times where id='$row[time_id]'"));
                $user_info=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where id='$row[uid]'"));
                ?>
                 <tr>
                   <th scope="row"><?php echo $i; $i++;?></th>
                   <td><?php echo $row['date']; ?></td>
                   <td><?php echo $time_in_12_hour_format  = date("g:i a", strtotime($times['time'].":00")); ?></td>
                   <td><?php echo $user_info['name']; ?><br><?php echo $user_info['phone']; ?> </td>
                  
                   <td><?php echo "yes"; ?></td>
                   <td> <?php echo $row['status']; ?> </td>
                 </tr>
                <?php
              }
             ?>
          </tbody>
          </table>
 


       
        <a href="t_booking.php" class="btn btn-success">Back</a><br><br>
                     <input type="button" onClick="printDiv('printMe')" value="Print"/>
<script>
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }    </script></div>

        <?php
        }else{
          ?>
            <div class="row">
              <form class="form-group" action="" method="post">
                <div class="col-lg mt-2">
                  <label for="date1">Select date</label>
                  <div class="input-group mt-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">FROM</span>
                    </div>
                    <input type="date" class="form-control" id="date1" name="date1" aria-describedby="basic-addon3">
                    <div class="input-group-prepend">





                      <button type="submit" name="date_sub" class="btn btn-info" >View Bookings</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          <?php
        }
       ?>

    </div>

  </div>
    <br>



  

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
