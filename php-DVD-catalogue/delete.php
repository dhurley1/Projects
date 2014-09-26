<!DOCTYPE html>
<head>
<title>Update DVD</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="Files.CSS" type="text/css"/ charset="utf-8">
</head>
<body>
<?php
if(isset($_POST['delete']))
{
$conn = mysqli_connect("157.190.64.130","R00068614","ub96BZ");
if(!$conn)
{
$error="<p>Unable to connect to the database server.</p>\n "
         ."<p>Connection error code ".mysqli_connect_errno()."</p> \n";
		 
		 include 'error.html.php';
		 exit();
}


$id =$_POST['ID'];
$TableName="titles";

$sql="DELETE FROM $TableName WHERE ID =$id ";

if (!mysqli_query($conn, $sql))
						{
						
							echo "<p>There was an error deleting the record.<br/>\n" .
								 "The error was " . 
								 htmlspecialchars(mysqli_error($conn), ENT_QUOTES) .
								 ".<br/>\nThe query was '" .
								 htmlspecialchars($sql,ENT_QUOTES) .
								 "'</p>\n";
								 
						}

		
		if (!mysqli_select_db($conn, $DBName))
		{
		
			$error = "<p>Unable to connect to the $DBName database!</p>\n"
				. "<p>Error code " . mysqli_errno($conn)
					. ": " . mysqli($conn) . "</p>\n";
					
					
			include 'error.html.php';
			exit();		
		
		}
echo "deleted data successfully";
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<td width="100">Movie ID</td>
<td><input name="ID" type="text" id="ID"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="delete" type="submit" id="delete" value="Delete">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>
