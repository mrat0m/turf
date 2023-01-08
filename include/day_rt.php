<?php
  include_once("db.php");
  include_once("../logincheck.php");

  if(isset($_POST['date'])){
    $dat1=$_POST['date'];
    $dat=date('N', strtotime($_POST['date']));
    $times=mysqli_query($conn,"SELECT * from times where day='$dat'");
    $i=1;
    while ($row = mysqli_fetch_assoc($times)) {
      $booked=mysqli_query($conn,"SELECT * from booking where time_id='$row[id]' and date='$dat1' and status!='used'");
      if($booked->num_rows>0){
        $booked=mysqli_fetch_assoc($booked);
        if($booked['status']=="pending"){
          $now=$date1->format('Y-m-d H:i:s');
          $new_t=$booked['time'];
          $new_t=date('Y-m-d H:i:s',strtotime('+0 hour +05 minutes',strtotime($new_t)));
          //echo $now;
          if($new_t<$now){
            mysqli_query($conn,"DELETE from booking where id='$booked[id]'");
            //echo "DELETE from booking where id='$booked[id]'";
              ?>
               <div class="time">
                 <input type="radio" class="" on onchange="red(this,<?php echo $row['id'];?>)" name="check" id="check<?php echo $i; ?>" value="<?php echo $row['id'];?>" required>
                 <label for="check<?php echo $i; $i++;?>"><?php
                 $time_in_12_hour_format  = date("g:i a", strtotime($row['time'].":00"));
                 echo $time_in_12_hour_format;
                 ?></label>
               </div>
              <?php
          }else{
              ?>
               <div class="time pending">
                 <input type="radio" class="" on onchange="" name="" id="" value="" required>
                 <label for=""><?php
                 $time_in_12_hour_format  = date("g:i a", strtotime($row['time'].":00"));
                 echo $time_in_12_hour_format;
                 ?></label>
                 <label for="" class="txt-sm">pending</label>
               </div>
              <?php
          }
        }
      }else{
        $time_in_12_hour_format  = date("g:i a", strtotime($row['time'].":00"));
        $now=$date1->format('H:i');
        $time_code=$row['time']-1;
        $t= date("H:i", strtotime($time_code.":00"));
        if($dat1==$date){
          if($t<$now){

          }else{
            ?>
             <div class="time">
               <input type="radio" class="" on onchange="red(this,<?php echo $row['id'];?>)" name="check" id="check<?php echo $i; ?>" value="<?php echo $row['id'];?>" required>
               <label for="check<?php echo $i; $i++;?>"><?php
               echo $time_in_12_hour_format;
               ?></label>
             </div>
            <?php
          }
        }else{
          ?>
           <div class="time">
             <input type="radio" class="" on onchange="red(this,<?php echo $row['id'];?>)" name="check" id="check<?php echo $i; ?>" value="<?php echo $row['id'];?>" required>
             <label for="check<?php echo $i; $i++;?>"><?php
             echo $time_in_12_hour_format;
             ?></label>
           </div>
          <?php
        }
      }
    }
  }

 ?>
