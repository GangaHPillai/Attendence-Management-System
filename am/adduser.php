<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

 ?>

<html>
<head> 
<link rel="stylesheet" type="text/css" href="adduser.css">
</head>
<body>
<?php


  if(isset($_POST['submit']))  {
	  
$uname =$_POST['fname'].$_POST['lname'].$_POST["course"].$_POST["adyear"]."_".$_POST["rollno"];

	
$conn= new mysqli("localhost","root","","am");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $sql= "select * from tlogin where fusername='".$uname."';";
  
  $result= $conn->query($sql);
  
if ($result->num_rows > 0) { 
echo "<script> alert('Duplicate ID Found');</script>";
} else {
	
	$sql = "INSERT INTO tlogin (fusername,previlege) VALUES ('".$uname."',2)";

	//$_POST['fname'].$_POST['lname'].$_POST["course"].$_POST["adyear"]."_".$_POST["rollno"];
//	INSERT INTO `stud`(`fname`, `lname`, `fusername`, `cid`, `adyear`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
   
   $rollno  =$_POST['rollno'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $cid  =$_POST['course'];
   $adyear = $_POST['adyear'];	
   	$sql2  ="INSERT INTO stud(rollno,fname,lname,fusername,cid,adyear) values ('".$rollno."','".$fname."','".$lname."','".$uname."','".$cid."','".$adyear."')";
	
   
   if($conn->query($sql)) {
		
	   
	   if($conn->query($sql2)) {
		   echo "<script> alert('added to db');</script>";
	   }
	   else {
		   echo "<script> alert('Error adding to db...'); </script>";
	   }
   } 
   else {
	   echo "<script> alert('Error adding to db'); </script>";
	   }
  
  
  }
  
 }
 
  
  
?>

<div id="formdiv">
<form method="POST" action="<?php $_SERVER["PHP_SELF"];
   ?>" >

	<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "am";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>
<label for="course">course</label><br>
<select name='course' id='course' class='course' required><br>
 <?php
	  $sql = "select cid from dept where cid!='null'";
      $result = $conn->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		  $val= $row['cid'];
		  
		  echo "<option value='".$val."'>".$val."</option>";
	      
	  }
	
	?>
	</select>

	<br><label for="adyear"> admission year </label><br>
	<select name='adyear' id='adyear' class='adyear' required> <br>
 <?php
      $sql = "select adyear from params";
	  $result = $conn->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		   $val= $row['adyear'];
		  
		  echo "<option value='".$val."'>".$val."</option>";
	      
	  }
	
	?>
	</select>	
<br><label for="rollno"	>roll number</label><br>
<input type="text" name="rollno"> <br>
<label for="fname"> first name </label> <br>
<input type="text" name="fname" required> <br>
<label for="lname"> last name </label><br>
<input type="text" name="lname" required> <br><br>
<input type="submit" id="submit" value="Generate User ID and Save"	name="submit" >
<form>
</div>

</body>
</html>