<?php
session_start();
if (! (isset ( $_SESSION ['login'] ))){

header('location:login.php');

}

 ?>
 
 <html>
<head>
<link rel="stylesheet" type="text/css" href="showdes.css">
<style>
#table1 {
position:relative;
border:10px;
width:60%;
left:10%;


}

tr {
	background-color:#f2f2f2;
	
}

td {
	
	
	padding:4px;	
	text-align:center;
	font-family:segoe-ui,verdana;
}
</style>
  </head>
<body>

<table id= "table1" name="table1">
<thead>
<tr>
<th>username</th>
<th>course</th>
<th>(Sem1)</th>
<th>(Sem2)</th>
<th>(Sem3)</th>
<th>(Sem4)</th>
<th>(Sem5)</th>
<th>(Sem6)</th>
</tr>
</thead>
<tbody>
<?php
 $conn= new mysqli("localhost","root","","am");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 


  $sql = "select * from stud";
   $result = $conn->query($sql);
 
   
     while($row=$result->fetch_assoc()){ 
   
               echo"<tr>"; 
               echo "<td>".$row['fusername']."</td>";
			    echo "<td>".$row['cid']."</td>";
               echo "<td>".$row['sem1']."</td>";
			   echo "<td>".$row['sem2']."</td>";
			   echo "<td>".$row['sem3']."</td>";
			   echo "<td>".$row['sem4']."</td>";
			   echo "<td>".$row['sem5']."</td>";
			   echo "<td>".$row['sem6']."</td>";
               echo "</tr>";
   
     }


?>

</tbody>
</table>
</body>
</html>