<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="dashboard.css">
 </head>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "am";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
?>	
<div>
<ul>
  <li><a class="active" href="" >DashBoard</a>
   </li>
 <?php
    $sql="";
      if($_SESSION['previlege']== 1) {
	  $sql = "select href,des from dashboard where previlege = ".$_SESSION['previlege']." OR previlege = 4 ;";
      } elseif ($_SESSION['previlege']== 3) {
		  
		 $sql = "select href,des from dashboard where previlege = ".$_SESSION['previlege']." OR previlege = 4 ;";
	  } else if($_SESSION['previlege']== 2) {
	$sql = "select href,des from dashboard where previlege = ".$_SESSION['previlege']." OR previlege = 4 ;";
	  }
	  else if($_SESSION['previlege']== 4) {
	$sql = "select href,des from dashboard where previlege = ".$_SESSION['previlege'].";";
	  }
	  $result = $conn->query($sql);
      while ($row=$result->fetch_assoc()) {
		  
		  $val= $row["des"];
		  echo "<li><a name='subj' target = 'iframe1' href='".$row['href']."'>".$row['des']."</a></li>";
	      
	  }
	
	?>
<li><a href="cp.php" target="iframe1">Change Password</a>
   </li>
<li><a href="logout.php" >Logout Me</a>
   </li>
</ul>
</div>
<!--<div style="max-width: 500px; margin: auto;padding:1px 16px;height:1000px;">-->
<div id="iframecontainer">
	<iframe name="iframe1" src=""></iframe> 
</div>
</body>
</html>     