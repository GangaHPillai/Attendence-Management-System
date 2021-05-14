<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

 ?>
 
 <html>
<head>
<link rel="stylesheet" type="text/css" href="showdes.css">
  </head>
<body>

<table id= "table1" name="table1"> 
<thead>
<tr>
<th>LEAVE APPLICATION ID</th>
<th>USER ID</th>
<th>DEPARTMENT</th>
<th>DESCRIPTION</th>
<th>DATE APPLIED FOR</th>
<th>SEM</th>
<th>APPLICATION STATUS</th>
</tr>
</thead>
<tbody>
<?php

 $conn= new mysqli("localhost","root","","am");
 $subconn =new mysqli("localhost","root","","am"); 
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

 
  $sql = "select * from leaverequests where idfrom ='".$_SESSION['uname']."';"; 
 
   $result = $conn->query($sql);
   
   
     while($row=$result->fetch_assoc()){ 
   
               echo"<tr>"; 
			   echo "<td>".$row['sno']."</td>";
			   echo "<td>".$row['idto']."</td>";
			    echo "<td>".$row['dep']."</td>";
			   echo "<td>".$row['description']."</td>";
			   echo "<td>".$row['rdate']."</td>";
			   echo "<td>".$row['rstatus']."</td>";
			   echo "<td>".'<a href="rdelete.php?sno='.$row['sno'].'">Delete Request</a>';
               echo "</tr>";
    
     }
	

?>
</tbody>
</table>
</body>
</html>