<?php

  include_once("db.php");
  include_once("../logincheck.php");
  if(isset($_POST['date'])){
    $date_booked=mysqli_query($conn,"SELECT * from booking where date='$_POST[date]'");

    $dat=date('N', strtotime($_POST['date']));
    $times=mysqli_query($conn,"SELECT * from times where day='$dat'");
    while ($row = mysqli_fetch_assoc($times)) {
      //echo $row['day'].dayname($_POST['date'])."<br>";
      $is_slot_free=mysqli_query($conn,"SELECT * from booking where time_id='$row[id]' and date='$_POST[date]' and status='booked'");
      if($is_slot_free->num_rows>0){
        //echo "slot already booked <br>";
      }else{
        $time_in_12_hour_format  = date("g:i a", strtotime($row['time'].":00"));

        ?>
        <div class="col-sm-3 mb-2 slot">
          <input type="checkbox" name="time_slot[]" id="time<?php echo $time_in_12_hour_format;?>" value="<?php echo $row['id']; ?>">
          <label for="time<?php echo $time_in_12_hour_format;?>"><?php echo $time_in_12_hour_format;?></label>

        </div>

        <?php
      }
    }

  }


 ?>

           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Name</span>
             </div>
             <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-describedby="basic-addon1" required>

           </div>
           <div class="input-group mb-3">
             <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Phone</span>
             </div>
             <input type="number" class="form-control" id="phone" name="phone" placeholder="phone no:" aria-describedby="basic-addon1" required>
             <div class="input-group-prepend">
               <button type="submit" class="btn btn-info" name="check-slots">Block Slots</button>
             </div>
           </div>
