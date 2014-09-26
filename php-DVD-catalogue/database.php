<!DOCTYPE html>
<head>
<title>
currently available DVD's </title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
<h1>List DVD's</h1>
<?php
$DBConnection=mysqli_connect("157.190.64.130","R00068614","ub96BZ");
if(!$DBConnection)
{
$error="<p>Unable to connect to the database server.</p>\n "
         ."<p>Connection error code ".mysqli_connect_errno()."</p> \n";
		 
		 include 'error.html.php';
		 exit();
}
 
else
{
   $DBName="r00068614dvd";
   $TableName="titles";
   if(!mysqli_select_db($DBConnection,$DBName))
   {
     $error="<p>Unable to connect to the $DBName database!</p>\n"
	         ."<p>Error code".mysqli_errno($DBConnection)
			 .":".mysqli_error($DBConnection)."</p>\n";
			include 'error.html.php';
			 exit();
    }
	else
      {
	  $SQLString="Select * FROM $TableName Order BY ID";
	  
	  $QueryResult =mysqli_query($DBConnection,$SQLString);
	  if(!$QueryResult)
	  {
	  $error='Error executing query:'.mysqli_error($DBConnection);
	  include 'error.html.php';
	 
	  exit();
	  }
	  else if(!mysqli_num_rows($QueryResult))
	  {
	  echo "<p> There are no bugs to report.</p>\n";
	  }
	  else
	  
	  {
	   // create html table and populate with resultset
	   echo "<table id='database' border ='1' >\n";
	   echo"<tr><th>ID</th>".
	        "<th>Cert</th>".
	       "<th>filmtitle</th>".
		   "<th>releaseDate</th>".
		   "<th>filmDuration</th>".
		   "<th>director</th>".
		   "<th>description</th>".
		 
		   "<th>&nbsp;</th></tr>\n";
        
		while($report =mysqli_fetch_assoc($QueryResult))
		{
		  echo "<tr><td>".$report['ID']."</td>".
		       "<td>".$report['cert']."</td>".
			   "<td>".$report['filmtitle']."</td>".
			   "<td>".$report['releaseDate']."</td>".
			   "<td>".$report['filmDuration']."</td>".
			   "<td>".$report['director']."</td>".
               "<td>".$report['description']."</td>".		
              "<td><a href=\"EnterBugReport.php?ReportID=".
			         $report['ID']."\">Update</a></td>".
			   "</tr>\n";
		}
		echo "</table>\n";
		echo 'Database connection established ';
      }
}}
?>
<a href="EnterBugReport.php">Enter a new bug report</a>





</body>
</html>
