<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

 ?>
 
 
 <?php
 
    $conn= new mysqli("localhost","root","","am");
   
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 

   $sql = "update leaverequests set rstatus = 'rejected' where sno ='".$_GET['sno']."'"; 
 
   if($conn->query($sql)) {
	 header('location:leaverequests.php'); 
   }
   
 
 ?>