<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<center>
      <div class="loader" id="loader">
        <img src="img/loader.svg" alt=""></img>
      </div>

        <?php include_once("include/nav.php");?>
<center>
    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div>
      <div class="container box-up  d-flex justify-content-center">
            <div class="box-lg">
              <div class="heading">
                MY DETAILS
              </div>
              <form class="account" action="index.html" method="post">
                <label for="">Name : <?php echo $user_data['name'];?> </label><br>
                <label for="">Phone : <?php echo $user_data['phone'];?> </label><br>
                <label for="">Email :<?php echo $user_data['email'];?> </label><br>
                <label for="">House Name :<?php echo $user_data['hna'];?> </label><br>
                <label for="">Street :<?php echo $user_data['street'];?> </label><br>
                <label for="">Pincode :<?php echo $user_data['pin'];?> </label><br>
                <?php 
                echo "<span class='badge badge-edit'><a href='edit_customer.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                ?>
              </form>
            </div>
      </div>
    </div>
    <br>
</center>

    <div class="modal fade" id="cancel_acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cancel Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Enter OTP
          <input type="text" class="form-control" name="" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ch_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="" id="otp-form">

        <div class="modal-body">
            Enter Phone
          <input type="number" class="form-control" name="phone" id="phone" value="">

          <div class="" id="message">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="get_otp()" >Send OTP</button>
        </div>
        </div>
      </div>
  </div>
</div>


    <script>
      function red(d){
        if(d.checked=true){
          var nodes=d.parentNode.parentNode.childNodes;
            for(var i=0; i<nodes.length; i++) {
                if (nodes[i].nodeName.toLowerCase() == 'div') {
                     nodes[i].style.background = "white";
                     nodes[i].style.color="black";
                 }
            }
            d.parentNode.style.background="#007bff";
            d.parentNode.style.color="white";
        }
      }
    </script>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </center>
  </body>
</html>
