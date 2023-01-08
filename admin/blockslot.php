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
        Block Slots
      </div>
      <div class="row mt-3">
        <?php
          if(isset($_POST['check-slots'])){
            $time_slots=$_POST['time_slot'];
            foreach ($time_slots as  $value) {
              $is_slot_free=mysqli_query($conn,"SELECT * from booking where time_id='$value' and date='$_POST[date]'");
              echo"err1";
              if($is_slot_free->num_rows>0){
                echo "Something happened try again.";
                header("location:blockslot.php");
              }
            }
            $is_user_exist = mysqli_query($conn,"SELECT * FROM user where phone ='$_POST[phone]'");

            if($is_user_exist->num_rows>0){
                echo"err2";
            }else{
                mysqli_query($conn,"INSERT INTO user(name,phone,status,type)
                  values('$_POST[name]','$_POST[phone]','verified','user')");
            }
            $time_slots=$_POST['time_slot'];
            $get_user_info=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from user where phone='$_POST[phone]'"));
            foreach ($time_slots as  $value) {
              mysqli_query($conn,"INSERT into booking(uid,time_id,rate,paid,off,status,date)
                  values('$get_user_info[id]','$value','00','00','00','booked','$_POST[date]')");
              $time_row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times where id='$value'"));
              $time_in_12_hour_format  = date("g:i a", strtotime($time_row['time'].":00"));
              ?>
              <div class="alert alert-success" role="alert">
                Time slot <strong><?php echo $time_in_12_hour_format; ?></strong>  on <strong><?php echo $_POST['date']; ?> </strong>
                booked to user <strong><?php echo $get_user_info['name']; ?></strong>
              </div>
              <?php

            }
            ?>
              <a href="blockslot.php" class="btn btn-primary">Continue</a>
            <?php


          }else{
            ?>
            <div class="col-xl">
              <form class="" action="" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Date</span>
                  </div>
                  <input type="date" class="form-control" id="date" name="date" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-primary" onclick="get_slots()" name="view-slots">View Slots</button>
                    </div>
                </div>
                <div class="col-xl">
                  <div class="row" id="resultdiv">

                  </div>

                </div>
              </form>
            </div>
            <?php
          }
         ?>

      </div>

    </div>
  </div>
    <br>


      <script>

      function loading_start(){

        $("html, body").animate({ scrollTop: 0 }, "fast");
        loader.style.display="block";

        $('html, body').css({
             overflow: 'hidden',
             height: '100%'
         });
      }
      function loading_stop(){
        loader.style.display="none";
        $('html, body').css({
            overflow: 'auto',
            height: 'auto'
        });
      }

        function get_slots(){
          loading_start();
          var resultdiv = document.getElementById('resultdiv');
          var data="date="+$('#date').val();
          $.ajax({
            url: "include/get_slots.php",
            type: "POST",
            data:  data,
            cache: false,
            success: function(data)
              {

                resultdiv.innerHTML=data;
                //document.getElementById('pescode').value=pescode;
                loading_stop();

              },
              error: function()
              {
              }
            });
        }

        function check_slots(){
          loading_start();
          var time_slot = $("input[name='time_slot']:checked").map(function () {
              return this.value;
          }).get();
          loading_start();
        }

      </script>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
