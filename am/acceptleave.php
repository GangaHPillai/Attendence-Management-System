<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

 ?>
 
 
 <?php
 
    $conn= new mysqli("localhost","root","","am");
   
   $sql1= "select idfrom from leaverequests where sno='".$_GET['sno']."'";
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
	$result  =$conn->query($sql1);
	
	while($row=$result->fetch_assoc()) {

      
   $sql2 =  "update stud set sem".$_GET["sem"]."=sem".$_GET["sem"]." - 1  where fusername ='".$_GET['idfrom']."'"; 
 $sql = "update leaverequests set rstatus = 'accepted' where sno ='".$_GET['sno']."'"; 
 
   if($conn->query($sql)) {
	// header('location:leaverequests.php'); 
   
   if($conn->query($sql2)) {
	 header('location:leaverequests.php'); 
   }
    else {
	echo "<script> alert('error occured...');</script>";	
	}
   }
   else {
         echo "<script> alert('error occured');</script>";
   }
	}
   
 
 ?>