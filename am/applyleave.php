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
<script>

</script>

<form name="f1" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="staff">staff</label><br>
<select name='staff' id='staff' class='staff' required><br>
 <?php
       $conncombo = new mysqli("localhost","root","","am");
	  $sql = "SELECT fusername FROM tlogin where depid != 'none'";
      $result = $conncombo->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		  $val= $row['fusername'];
		  
		  echo "<option value='".$val."'>".$val."</option>";
	      
	  }
	
	?>
	</select>
	<br>
	<label for="dep">department</label><br>
<select name='dep' id='dep' class='dep' required><br>
 <?php
       $conncombo = new mysqli("localhost","root","","am");
	  $sql = "SELECT distinct depid FROM dept where depid != 'none'";
      $result = $conncombo->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		  $val= $row['depid'];
		  
		  echo "<option value='".$val."'>".$val."</option>";
	      
	  }
	
	?>
	</select><br>	
	<label for = "date"> Date </label><br>
<input type="text" name="date" required>
<br><br>

<label for="des"> Description </label><br>	
<input type="text" name="des" required>
<br><br>

<br>
	<label for="sem">semester</label><br>
<select name='sem' id='sem' class='sem' required><br> 
		  <option value="sem1">1</option>
	        <option value="sem2">2</option>
			  <option value="sem3">3</option>
			    <option value="sem4">4</option>
				  <option value="sem5">5</option>
				    <option value="sem6">6</option>
	 
	</select><br>	

		
	<input type	="submit" value="submit" name="submit">
	</form>

<?php
if(isset($_POST['submit'])){
 $conn= new mysqli("localhost","root","","am");
 $subconn =new mysqli("localhost","root","","am"); 
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  $idto = $_POST['staff'];
  $idfrom = $_SESSION["uname"];
  $dep  = $_POST['dep'];
  $des= $_POST['des'];
  $d = $_POST['date'];

  $sql = "insert into leaverequests (idto,idfrom, dep, description,rdate,sem) values ('".$idto."','".$idfrom."','".$dep."','".$des."','".$d."','".$_POST["sem"]."')";
  
   if($conn->query($sql)) {
		   echo "<script> alert('added to db');</script>";  
   } 
   else {
	   echo "<script> alert('Error adding to db'); </script>";
	   }
 
 //INSERT INTO `leaverequests`(`sno`, `idto`, `idfrom`, `skill`, `description`, `mobno`, `rdate`, `rstatus`)
	
}
?>

</tbody>
</table>
</body>
</html>