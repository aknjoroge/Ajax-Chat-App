<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include_once "php/config.php";

$receiverID = $_SESSION['receriverID'];
$senderID = $_SESSION['senderID'];

    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$senderID}");
    if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
    }
    $name =$row['fname'];
    $bio =$row['bio'];



$sql = "INSERT INTO `requests`(`fromID`, `toID`, `name`, `bio` ) VALUES ('$senderID' , '$receiverID ','$name','$bio' )";
// mysqli_query($conn,$sql);

 if ($conn->query($sql) === TRUE) {
    $_SESSION['chatRequest']= "Your chat request was successfully sent :) ";
    $_SESSION['mode']= "success";
    header("location: home.php");
   } else {
   
    $_SESSION['chatRequest'] =  "Error: Could not send your request Try again later ";
    $_SESSION['mode']= "warning";
    header("location: home.php");
   }



?>