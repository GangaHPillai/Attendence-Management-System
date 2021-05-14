
<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

?>

<html>
<head> 

<link rel="stylesheet" type="text/css" href="adduser.css">
<?php

//$uname = $_POST["uname"];
//$passw = $_POST["psw"];
$err1=$err2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$k = $_POST["oldpass"];
	$l= $_POST["newpass"];
  if (empty($_POST["oldpass"])) {
    $err1 = "missing";
    //header("location:login.php");
    
  } 
  
  if (empty($_POST["newpass"])) {
    $err2 ="missing";
     
  }  
   
   
    if($err1==""&& $err2==""){	
       cont($k,$l);
	}
  
  }
 
  

  function cont($oldpass,$newpass){
	
  $conn= new mysqli("localhost","root","","am");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
//echo "Connected successfully";

 
  $sql = "select fusername , fpassword , previlege from tlogin where fusername='".$_SESSION['uname']."' && fpassword='". $oldpass."';";
   $result = $conn->query($sql);
  if ($result->num_rows == 1) {
   
   
    $sql= "update tlogin set fpassword='".$newpass."' where fpassword='".$oldpass."';";
    if($conn->query($sql))	 {
             echo "<script> alert('password updated Successfully'); </script>";
    }
	else {
		
		 echo "<script> alert('failed to update'); </script>";
	}
  } 
  else {
	  
	   echo "<script> alert('old password not found'); </script>";
  }
   $conn->close();
  }


?>
</head>
<body>


<div id="formdiv">
<form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST">
<label for="oldpass">OLD PASSWORD <?php echo $err2; $err1=""?></label><br>
<input type="text" name="oldpass" required><br><br>
<label for="newpass">NEW PASSWORD <span> <?php echo $err1; $err2="";?> </span></label> 	<br>
<input type="text" name="newpass">
<br><br> <input id="submit" type="submit" name="submit" value="Change Password" required> 
</form>
</div>

</body>
</html> 