<?php
$con = mysqli_connect("localhost","root","2016587","myforum");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
