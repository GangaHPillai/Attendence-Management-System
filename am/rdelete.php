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

   $sql = "delete from leaverequests where sno ='".$_GET['sno']."'"; 
 
   if($conn->query($sql)) {
	 header('location:showrequests.php'); 
   }
   
 
 ?>