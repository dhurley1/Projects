<!DOCTYPE html>
<head>
   <title>
      currently available DVD's 
   </title>
   <meta charset="utf-8"/>
   <link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
   <h1>DVD online catalogue</h1>
   <div id="content">
   <?php
         //database connection   
     // $DBConnection = mysql_connect("157.190.64.130",  "R00068614" , "ub96BZ");
     $DBConnection = mysql_connect('127.0.0.1','root');
       if(!$DBConnection)
         {
         $error="<p>Unable to connect to the database server.</p>\n "
                  ."<p>Connection error code ".mysqli_connect_errno()."</p> \n";
         		 
         		 include 'error.html.php';
         		 exit();
         }
		 $DBName = "r00068614dvds";
      mysql_select_db($DBName, $DBConnection);
      
	  
      $id =$_REQUEST['ID'];
      $table = "titles";
      
      // query
      mysql_query("DELETE FROM $table WHERE ID = '$id'")
      or die(mysql_error()); 
       
	   echo "<p>dvd deleted</p>";
	  
      ?>
   <a href="database.php">View DVDs</a>
   </div>
</body>
</html>
