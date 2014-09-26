<!DOCTYPE html>
<head>
   <title>Enter a New DVD</title>
   <meta charset="utf-8"/>
   <link rel="stylesheet" href="index.CSS" type="text/css" charset="utf-8">
</head>
<body>
   <h1>Update form</h1>
   <div id="content">
      <?php 
         $fields = array('cert','filmtitle','releaseDate','filmDuration','director','description');
         $report=array();
         foreach ($fields as $field)
         	$report[$field]="";
         
         if(isset($_POST['add'])) 
         { 
		 //connecting database
         //$DBConnection = mysqli_connect("157.190.64.130","R00068614","ub96BZ"); 
         $DBConnection = mysqli_connect("127.0.0.1","root");
         if(!$DBConnection) 
         { 
         $error="<p>Unable to connect to the database server.</p>\n "
                  ."<p>Connection error code ".mysqli_connect_errno()."</p> \n"; 
                    
                  include 'error.html.php'; 
                  exit(); 
         } 
         //sanitise
         $cert = mysqli_real_escape_string($DBConnection, $_POST['cert']);
         $filmtitle = mysqli_real_escape_string($DBConnection, $_POST['filmtitle']);
         $releaseDate = mysqli_real_escape_string($DBConnection, $_POST['releaseDate']);
         $filmDuration = mysqli_real_escape_string($DBConnection, $_POST['filmDuration']);
         $director = mysqli_real_escape_string($DBConnection, $_POST['director']);
         $description = mysqli_real_escape_string($DBConnection, $_POST['description']); 
         
         
         foreach ($fields as $field)
         {
		 
         	if ((!isset($_POST[$field])) || (strlen(trim(($_POST[$field])))==0))
         	{
         		echo "<p>'$field' is a required field.</p>\n";
         		//If a field is left blank, the user will be prompted to enter a value
         	}
         	else
         	{
         		$report[$field]=stripslashes(trim($_POST[$field]));
         	}
         	
         }	
         if (isset($_POST['ID'])) 
         { 
             $ID=$_POST['ID']; 
         } 
         else if (isset($_GET['ID'])) 
         { 
             $ID=$_GET['ID']; 
         } 
         
         
         $DBName = "r00068614dvds";
         
         mysqli_select_db($DBConnection, $DBName);
         
         $table = "titles";
         
         $sql = "SELECT * FROM $table WHERE ID = '$ID'";
         
         $query = mysqli_query($DBConnection ,$sql);
         $result = mysqli_query($DBConnection, $sql);
         $row = mysqli_fetch_array($result, MYSQLI_NUM);
         
         $sql = "UPDATE $table SET cert='$cert', filmtitle='$filmtitle', releaseDate='$releaseDate', filmDuration='$filmDuration', director='$director', description='$description' WHERE ID ='$ID'"; 
         		
                          
                
                   //if error with connecting database
                 if (!mysqli_select_db($DBConnection, $DBName)) 
                 { 
                   
                     $error = "<p>Unable to connect to the $DBName database!</p>\n"
                         . "<p>Error code " . mysqli_errno($DBConnection) 
                             . ": " . mysqli($DBConnection) . "</p>\n"; 
                               
                               //If database connection fails, display this message.
         					  
                     include 'error.html.php'; 
                     exit();      
                   
                 } 
				 
				 // if error with sql query
           if (!mysqli_query($DBConnection, $sql)) 
                 { 
                                   
                     echo "<p>There was an error saving the record:<br/>\n" .      
                     htmlspecialchars(mysqli_error($DBConnection), ENT_QUOTES) . 
                     ".<br/>\nThe query was '" . 
                     htmlspecialchars($sql,ENT_QUOTES) . 
                     "'</p>\n"; 
         			
         		                                            
                 } 
         
         echo "updated successfully\n"; 
         mysqli_close($DBConnection); 
         } 
         else
         { 
         ?> 
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
         <table width="400" border="0" cellspacing="1" cellpadding="2">
            <tr>
               <td align='right'>Cert:</td>
               <td align='left'>
                  <input type='text' size='10' name='cert' value='<?php echo $report['cert']; ?>' />
               </td>
            </tr>
            <br/>
            <tr>
               <td align='right'>Title:</td>
               <td align='left'>
                  <input type='text' size='10' name='filmtitle' value='<?php echo $report['filmtitle']; ?>' />
               </td>
            </tr>
            <br/>
            <tr>
               <td align='right'>Release Date:</td>
               <td align='left'>
                  <input type='text' size='20' name='releaseDate' value='<?php echo $report['releaseDate']; ?>' />
               </td>
            </tr>
            <br/>
            <tr>
               <td align='right'>Duration:</td>
               <td align='left'>
                  <input type='text' size='20' name='filmDuration' value='<?php echo $report['filmDuration']; ?>' />
               </td>
            </tr>
            <br/>
            <tr>
               <td align='right'>Director:</td>
               <td align='left'>
                  <input type='text' size='40' name='director' value='<?php echo $report['director']; ?>' />
               </td>
            </tr>
            <br/>
            <tr>
               <td align='right'>Description:</td>
               <td align='left'>
                  <input type='text' size='40' name='description' value='<?php echo $report['description']; ?>' />
               </td>
            </tr>
            <br/>	
            <tr>
               <td width="100"> </td>
               <td> </td>
            </tr>
            <tr>
               <td width="100"> </td>
               <td> 
                  <input type='reset' name='reset' value='Clear Form' /> &nbsp; 
                  <input name="add" type="submit" id="add" value="Update DVD"> 
               </td>
            </tr>
         </table>
      </form>
      <?php 
         } 
         ?> 
      <a href="database.php">View DVDs</a> 
   </div>
</body>
</html>
