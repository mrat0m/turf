
    <?php
    include_once("include/db.php");
    include_once("logincheck.php");
    if(isset($_GET['file_id'])){
      $crr_id=$_GET['file_id'];
      $crr_id10=$crr_id+10;
      $photo=mysqli_query($conn,"SELECT * from image where id>='$crr_id' and id<'$crr_id10' and uid='$user_data[id]' ");
      $files=array();
      while ($row= mysqli_fetch_assoc($photo)) {
        $f_name="cam_img/".$row['id'].".png";
        imagepng(imageCreateFromString(base64_decode($row['img'])), $f_name, 0);
        $file_push=$row['id'].".png";
        array_push($files,$file_push);
      }


      # create new zip object
      $zip = new ZipArchive();

      # create a temp file & open it
      $tmp_file = tempnam('.', '');
      $zip->open($tmp_file, ZipArchive::CREATE);

      # loop through each file
      foreach ($files as $file) {
          # download file
          $download_file = file_get_contents("cam_img/".$file);

          #add it to the zip
          $zip->addFromString(basename($file), $download_file);
      }

      # close zip
      $zip->close();

      # send the file to the browser as a download
      header('Content-disposition: attachment; filename="pesfields.zip"');
      header('Content-type: application/zip');
      readfile($tmp_file);
      unlink($tmp_file);
    }
     ?>
