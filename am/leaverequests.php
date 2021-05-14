.<?php
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

 
  $sql = "select * from leaverequests where idto ='".$_SESSION['uname']."' AND rstatus != 'rejected' AND rstatus != 'accepted'"; 
 
   $result = $conn->query($sql);
   
    if($result != null) {
     while($row=$result->fetch_assoc()){ 
   
               echo"<tr>"; 
			   echo "<td>".$row['sno']."</td>";
			   echo "<td>".$row['idfrom']."</td>";
			    echo "<td>".$row['dep']."</td>";
			   echo "<td>".$row['description']."</td>";
			   echo "<td>".$row['rdate']."</td>";
			    echo "<td>".$row['sem']."</td>";
			   echo "<td>".$row['rstatus']."</td>";
			   echo "<td>".'<a href="deny.php?sno='.$row['sno'].'">Deny Request</a>';
			   
			   echo "<td>".'<a href="acceptleave.php?sno='.$row['sno'].'&sem='.$row['sem'].'&idfrom='.$row['idfrom'].'">Accept Request</a>';
               echo "</tr>";
    
     }
	}
	

?>
</tbody>
</table>
</body>
</html>