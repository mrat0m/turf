<?php
  include_once("include/db.php");
  if(isset($_POST['paynow'])){
    echo $_POST['date']."\n";
    echo $_POST['check']."\n";
  }
 ?>
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
      <img src="img/logo.jpg" alt=""></img>
    </div>
        <?php include_once("include/nav.php");?>

    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div>
      <div class="container box-up  d-flex justify-content-center">
            <div class="box-lg">
              <div class="heading">
                PICK YOUR AREA!
              </div>
              <form class="" action="pgRedirect.php" method="post">
                <div class="days">
                  <div class="heading-sm">
                    Date
                  </div>
                  <div class="day" for="date1">
                    <label for="date1">Today</label><br>
                    <label for="date1"><?php echo $date;?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo $date;?>')" name="date" id="date1" value="<?php echo $date;?>" required>
                  </div>
                  <div class="day">
                    <label for="date2">Tomorrow</label><br>
                    <label for="date2"><?php echo dateplus($date,1);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,1);  ?>')" name="date" id="date2" value="<?php echo dateplus($date,1);  ?>">
                  </div>
                  <div class="day">
                    <label for="date3"><?php echo dayname(dateplus($date,2)); ?></label><br>
                    <label for="date3"><?php echo dateplus($date,2);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,2);  ?>')" name="date" id="date3" value="<?php echo dateplus($date,2);  ?>">
                  </div>
                  <div class="day">
                    <label for="date4"><?php echo dayname(dateplus($date,3)); ?></label><br>
                    <label for="date4"><?php echo dateplus($date,3);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,3);  ?>')" name="date" id="date4" value="<?php echo dateplus($date,3);  ?>">
                  </div>
                  <div class="day">
                    <label for="date5"><?php echo dayname(dateplus($date,4)); ?></label><br>
                    <label for="date5"><?php echo dateplus($date,4);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,4);  ?>')" name="date" id="date5" value="<?php echo dateplus($date,4);  ?>">
                  </div>
                  <div class="day">
                    <label for="date6"><?php echo dayname(dateplus($date,5)); ?></label><br>
                    <label for="date6"><?php echo dateplus($date,5);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,5);  ?>')" name="date" id="date6" value="<?php echo dateplus($date,5);  ?>">
                  </div>
                  <div class="day">
                    <label for="date7"><?php echo dayname(dateplus($date,6)); ?></label><br>
                    <label for="date7"><?php echo dateplus($date,6);  ?></label>
                    <input type="radio" class=""  onchange="dat(this,'<?php echo dateplus($date,6);  ?>')" name="date" id="date7" value="<?php echo dateplus($date,6);  ?>">
                  </div>

                </div>
<br>
                <div class="times">
                  <div class="heading-sm">
                   <br>Time(Available Slots)<br>
                  </div>
                  <div class="" id="time_div">

                  </div>

                  </div>

                  <div class="durations">
                    <div class="heading-sm">
                      Duration
                    </div>
                    <div class="duration">
                      1 HR
                    </div>
                  </div>
                  <div class="price">
                    <div class="rate" id="rate">
                      ₹0.00
                    </div>
                    <div class="offer" id="off">
                      0%
                    </div>
                    <div class="offerrate" id="offerrate">
                      ₹0.00
                    </div>
                  </div>

                  <div class="payable">
                    <div class="heading-sm">

                    </div>
                    <div class="payment">
                      <div class="desc" id="t_amt">
                        Total booking fee: &nbsp;₹0.00
                      </div>
                      <div class="desc-md" id="amt-payable">
                        Balance amount payable at venue: &nbsp;₹0.00
                      </div>
                      <div class="booking-rate">
                        Amount to be paid now:
                        <div class="amt">
                          ₹<input type="number" name="" id="res_amt" value="0.00" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="terms">
                    <div class="heading-mini">
                      Reservation Policy
                    </div>
                    <div class="terms-txt">

                      Rescheduling is not allowed.
                      If we detect any Fraud activity, Reservation will be cancelled with action.
                      By clicking paynow button you are accepting our conditions.
                    </div>
                    <div class="heading-mini">
                      Cancellation Policy
                    </div>
                    <div class="terms-txt">
                      Cancellation is not allowed.
                      Cancellation amount will not be refunded.
                    </div>
                  </div>
                  <div class="paybtnt">
                    <button type="submit" class="paynow" name="paynow">Pay Now</button>
                  </div>

              </form>
            </div>
      </div>
    </div>
    <br>
<script type="text/javascript" src="js/login.js"></script>
    <script>
      function red(d,time_id){
        if(d.checked=true){
          loading_start();
          var nodes=d.parentNode.parentNode.childNodes;
            for(var i=0; i<nodes.length; i++) {
                if(nodes[i].className == "time pending"){

                }else if (nodes[i].nodeName.toLowerCase() == 'div') {
                     nodes[i].style.background = "white";
                     nodes[i].style.color="black";
                 }
            }
            d.parentNode.style.background="#007bff";
            d.parentNode.style.color="white";

            data="time_id="+time_id;
            $.ajax({
              url: "include/time_rt.php",
              type: "POST",
              data:  data,
              cache: false,
              success: function(data)
                {
                    var time_info=JSON.parse(data);
                    console.log(time_info);
                    var price = (time_info.rate-(time_info.rate*(time_info.off/100)));
                    if(time_info.off>0){
                    document.getElementById('rate').innerHTML="₹"+time_info.rate;
                      document.getElementById('off').innerHTML=time_info.off+"%OFF";
                    }else{
                    document.getElementById('rate').innerHTML="";
                      document.getElementById('off').innerHTML="0%OFF";
                    }
                    document.getElementById('t_amt').innerHTML="Total registraion fee: &nbsp;₹"+price;
                    document.getElementById('offerrate').innerHTML="₹"+price;
                    var price_rem=price-(price/10);
                    document.getElementById('amt-payable').innerHTML="Balance amount payable at venue: &nbsp;₹"+price_rem;
                    document.getElementById('res_amt').value=price/10;
                    loading_stop();
                },
                error: function()
                {
                }
              });
        }
      }

      function dat(d,dat){
        if(d.checked=true){
          loading_start();
          var nodes=d.parentNode.parentNode.childNodes;
            for(var i=0; i<nodes.length; i++) {
                if (nodes[i].nodeName.toLowerCase() == 'div') {
                     nodes[i].style.background = "white";
                     nodes[i].style.color="black";
                 }
            }
            d.parentNode.style.background="#007bff";
            d.parentNode.style.color="white";
            data="date="+dat;
            $.ajax({
              url: "include/day_rt.php",
              type: "POST",
              data:  data,
              cache: false,
              success: function(data)
                {

                    document.getElementById('time_div').innerHTML=data;
                    loading_stop();
                },
                error: function()
                {
                }
              });
        }

      }
    </script>





      <div class="container-fluid wide">
      <div class="footer">
        <img src="img/grass.png" class="img-footer" alt="">
      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/login.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
