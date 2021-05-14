<?php
session_start();

?>
<!doctype HTML>
<html>
<head> 

<link rel="stylesheet" type="text/css" href="login.css">	 

</head>
<body>



<?php

//$uname = $_POST["uname"];
//$passw = $_POST["psw"];
$err1=$err2="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 	$k = $_POST["uname"];
	$l= $_POST["psw"];
  if (empty($_POST["uname"])) {
    $err1 = "missing";
    //header("location:login.php");
    
  } 
  
  if (empty($_POST["psw"])) {
    $err2 ="missing";
     
  }  
   
   
    if($err1=="" && $err2==""){	
       cont($k,$l);
	}
  
  }
 
  

  function cont($uname,$passw){
	
  $conn= new mysqli("localhost","root","","am");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
//echo "Connected successfully";

 
  $sql = "select fusername , fpassword , previlege from tlogin where fusername='".$uname."' && fpassword='". $passw."';";
   $result = $conn->query($sql);
  if ($result->num_rows == 1) {
   
     while($row=$result->fetch_assoc()){ $_SESSION['previlege'] = $row['previlege'];  }
    $_SESSION['login']=1;
	
    $_SESSION['uname']=$uname;
	  
	header("location:dashboard.php");
   
  } 
   $conn->close();	
  }
 ?>
<div class="heading">
 <span id="sphead">ATTENDANCE MANAGEMENT SYSTEM</span>

</div>

<div id="nav">
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="index.php#contact">Contact</a></li>
  <li><a href="about.php">About</a></li>
</ul>

</div>	

<!-- "<?php $_SERVER["PHP_SELF"];
   ?>" -->
<div id="formdiv">
<form method="POST" action="<?php $_SERVER["PHP_SELF"];
   ?>" >

<label for="uname" > Username </label><span class="requiredmsg"> <?php  echo "*".$err1; $err1=""; ?></span>
<br><input type="text" name="uname" class="inputs"  id="uname" required> <br>
<label for="psw" > Password </label><span class="requiredmsg"> <?php  echo "*".$err2;$err2=""; ?></span>
<br><input class= "inputs" type="password" id="psw" name="psw" required>
<br><br>	<input type="submit" value="submit" id="submit">

</form>
</div>


</body>
</html>