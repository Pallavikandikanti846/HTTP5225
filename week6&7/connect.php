<?php

// Use your settings, your password might be different.
  $connect = mysqli_connect('localhost', 'root', '', 'schools'); // This is the database name
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }