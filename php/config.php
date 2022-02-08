<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test19";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  mysqli_set_charset($conn,"utf8mb4");
  if(!$conn){
    session_start();
  
    $_SESSION['database_error'] = mysqli_connect_error();  
    
    header("location: database_Error.php");
  }
  else{
    $_SESSION['database_error'] = "";  
  }
