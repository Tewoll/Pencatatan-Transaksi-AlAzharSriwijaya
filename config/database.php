<?php
$connection = mysqli_connect("localhost","root","","azhar");

if (mysqli_connect_errno()) {
  echo "Gagal terhubung " . mysqli_connect_error();
  exit;
}

?> 