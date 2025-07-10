<?php

  $connect = mysqli_connect('localhost', 'root', '', 'humbereats'); 
  if(!$connect){
    die("Connection Failed: " . mysqli_connect_error());
  }