<?php

session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
  header("location: index.php");
}

$current_id = $_SESSION['unique_id'];

$sqlupdate = "UPDATE notifications SET active= 2 WHERE `touser` = $current_id";
    if ($conn->query($sqlupdate) === TRUE) {  
        header("location: home.php");
    }else{
        header("location: home.php");
    }

?>