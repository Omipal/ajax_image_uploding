<?php
include('dbcon.php');

if ($_FILES['imageFile']['name'] != '') {

  $img = $_FILES['imageFile']['name'];
  $folder = "images/";
  $folder =  $folder . $img;
  $query = "insert into img_tbl (imgpath) values(' $folder')";
  $run = mysqli_query($con, $query);

  if ($run) {
    move_uploaded_file($_FILES['imageFile']['tmp_name'],  $folder);
    sleep(2);
    echo "<h2>Image uploding has been successfully</h2> <br>
      <img src='$folder' width='150' height='150'>
    ";
  } else {
    echo "<h2>Image uploding faile</h2>";
  }
}
