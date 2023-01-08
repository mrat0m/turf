

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
          Your Photos
        </div>
        <div class="row">
          <?php
            $user_booked_slots =mysqli_query($conn,"SELECT * from booking where uid = '$user_data[id]'");
            while ($row =  mysqli_fetch_assoc($user_booked_slots)) {
              $img = mysqli_query($conn,"SELECT * from image where uid='$user_data[id]' and time_id='$row[time_id]'");
              //echo "SELECT * from image where uid='$user_data[id]' and time_id='$row[time_id]'";
              $i=0;
              while($img_data = mysqli_fetch_assoc($img)){
               if($i==0){
                imagepng(imageCreateFromString(base64_decode($img_data['img'])), "cam_thumb/"."$img_data[id].png", 5);
                  //echo "<img src='cam_img/$img_data[id].png' />";
                  ?>

                  <div class="col-md-6 col-sm-6  mb-3 thumb">
                    <img class="img-thumbnail" src="cam_img/<?php echo $img_data['id']; ?>.png" alt="">
                    <div class="thumb-footer row">
                      <div class="col">

                         <?php echo $img_data['id']."\n".$i."\n".$img_data['time_id']; ?>
                          <button type="button" class="" onclick="pic_download('<?php echo $img_data['id']; ?>')" name="button"  >
                            <svg style="fill :white;" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 8 8">
                              <path d="M3 0v3h-2l3 3 3-3h-2v-3h-2zm-3 7v1h8v-1h-8z" />
                            </svg>
                          </button> &nbsp;10/Pics
                      </div>
                    </div>
                  </div>
                  <?php

                  $i++;
               }else if($i==10){
                 $i=0;
                 continue;
               }else{
                 $i++;
                 continue;
               }

              }

            }
           ?>
        </div>

      </div>
    </div>
    <br>



    <div class="container-fluid wide">
      <div class="pecoad black">
        designed by <a href="wwww.pecoad.com">PECOAD.COM</a>
      </div>
    </div>

    <script>
      function pic_download(t){
        window.open("test-down.php?file_id="+t, "_blank");
      }
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
