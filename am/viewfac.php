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
<th>Department</th>

</tr>
</thead>
<tbody>
<?php
 $conn= new mysqli("localhost","root","","am");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 


  $sql = "select * from tlogin where depid!='none'";
   $result = $conn->query($sql);
 
   
     while($row=$result->fetch_assoc()){ 
   
               echo"<tr>"; 
               echo "<td>".$row['fusername']."</td>";
			    echo "<td>".$row['depid']."</td>";
              
               echo "</tr>";
   
     }


?>

</tbody>
</table>
</body>
</html>