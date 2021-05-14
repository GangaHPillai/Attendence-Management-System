<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="addfac.css">
</head>
<body>
<?php


  if(isset($_POST['submit']))  {
	  
$uname =$_POST["fname"]."_".$_POST["lname"];

	
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
	
	
	$sql = "INSERT INTO tlogin(fusername,previlege,depid) VALUES ('".$uname."',3,'".$_POST['dep']."');";
   if($conn->query($sql)) {
		
	   echo "<script> alert('added to db');</script>";
   } 
   else {
	   echo "<script> alert('Error adding to db'); </script>";
	   }
  
  
  }
  
 }
  
  
?>



<div id="formdiv">
<form action="<?php $_SERVER['PHP_SELF']; ?> " method="POST">

<label for = "fname"> first name </label>
<input type="text" name="fname" required>
<br><br>

<label for="lname"> last name </label>
<input type="text" name="lname" required>
<br><br>

<br>
<label for="dep"> Department </label>
	<select name='dep' id='dep' class='dep' required> <br>
<?php
      $conn1 = new mysqli("localhost","root","","am");
	  $sql = "select distinct depid from dept";
      $result = $conn1->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		  $val= $row['depid'];
		  
		  echo "<option value='".$val."'>".$val."</option>";
	      
	  }
	
	?>

</select>

<br>
<input type="submit"  name = "submit" id= "submit" value="Generate Username and Save">

</form>
</div>
</body>


</html>