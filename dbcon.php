<?php

$con = mysqli_connect('localhost', 'root', '', 'img_db');

if (!$con) {
  echo "connection faild";
} else {
  echo "connection successes";
}
