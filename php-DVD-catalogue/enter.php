<!DOCTYPE html>
<head>
   <title>Enter a New DVD</title>
   <meta charset="utf-8"/>
   <link rel="stylesheet" href="index.CSS" type="text/css" charset="utf-8">
</head>
<body>
   <h1>DVD Entry</h1>
   <div id="enterContent">
      <?php
         $ShowForm = FALSE;
         $fields = array(
         	'ID',
         	'cert',
         	'filmtitle',
         	'releaseDate',
         	'filmDuration',
         	'director',
         	'description'
         );
         $report = array();
         
         foreach($fields as $field) $report[$field] = "";
         
         if (isset($_POST['submit']))
         	{
         	foreach($fields as $field)
         		{
         
         		// check if field is empty
         
         		if ((!isset($_POST[$field])))
         			{
         			echo "<p>'$field' is a required field</p>\n";
         			$ShowForm = TRUE;
         			}
         		  else
         			{
         
         			// store data submitted in $report array
         
         			$report[$field] = stripslashes(trim($_POST[$field]));
         			}
         		}
         
         	if ($ShowForm === FALSE)
         		{
         
         		// $DBConnection = mysqli_connect("157.190.64.130", "R00068614" , "ub96BZ");
         
         		$DBConnection = mysqli_connect("127.0.0.1", "root");
         		if (!$DBConnection)
         			{
         			$error = "<p>Unable to connect to the database server.</p>\n" . "<p>Connection error code " . mysqli_connect_errno() . "</p>\n";
         			include 'error.html.php';
         
         			exit();
         			}
         		  else
         
         		// connection successful
         
         			{
         			$DBName = "r00068614dvds";
         			if (!mysqli_select_db($DBConnection, $DBName))
         				{
         				$error = "<p>Unable to connect to the $DBName database!</p>\n" . "<p>Error code " . mysqli_errno($DBConnection) . ": " . mysqli($DBConnection) . "</p>\n";
         				include 'error.html.php';
         
         				exit();
         				}
         			  else
         
         			// select db
         
         				{
         
         				// sanatise data entered by user ready for INSERT to MYSQL
         
         				$ID = mysqli_real_escape_string($DBConnection, $_POST['ID']);
         				$cert = mysqli_real_escape_string($DBConnection, $_POST['cert']);
         				$filmtitle = mysqli_real_escape_string($DBConnection, $_POST['filmtitle']);
         				$releaseDate = mysqli_real_escape_string($DBConnection, $_POST['releaseDate']);
         				$filmDuration = mysqli_real_escape_string($DBConnection, $_POST['filmDuration']);
         				$director = mysqli_real_escape_string($DBConnection, $_POST['director']);
         				$description = mysqli_real_escape_string($DBConnection, $_POST['description']);
         				$SQLString = 'INSERT INTO titles SET
         						ID="' . $ID . '",
         						cert="' . $cert . '",
         						filmtitle="' . $filmtitle . '",
         						releaseDate="' . $releaseDate . '",
         						filmDuration="' . $filmDuration . '",
         						director="' . $director . '",
         						description="' . $description . '"';
         				if (!mysqli_query($DBConnection, $SQLString))
         					{
         					echo "<p>There was an error saving the record.<br/>\n" . "The error was " . htmlspecialchars(mysqli_error($DBConnection) , ENT_QUOTES) . ".<br/>\nThe query was '" . htmlspecialchars($SQLString, ENT_QUOTES) . "'</p>\n";
         					}
         				  else
         					{
         					echo "<p>The movie was added.</p>\n";
         					}
         				} //select db
         			} //db connection
         		} //showForm
         	}
           else
         	{
         	$ShowForm = TRUE;
         	}
         
         if ($ShowForm === TRUE)
         	{
         ?>	
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id ="enter">
      <table>
         <tr>
            <td width="200">ID</td>
            <td><input type='text' size='10' name='ID' id="ID" /></td>
         </tr>
         <tr>
            <td width="200">Cert</td>
            <td><input name="cert" type="text" id="cert"></td>
         </tr>
         <tr>
            <td width="200">Film Title</td>
            <td><input name="filmtitle" type="text" id="filmtitle"></td>
         </tr>
         <tr>
            <td width="200">Release Date</td>
            <td><input name="releaseDate" type="text" id="releaseDate"></td>
         </tr>
         <tr>
            <td width="200">Duration</td>
            <td><input name="filmDuration" type="text" id="filmDuration"></td>
         </tr>
         <tr>
            <td width="200">Director</td>
            <td><input name="director" type="text" id="director"></td>
         </tr>
         <tr>
            <td width="200">Description</td>
            <td><input name="description" type="text" id="description"></td>
         </tr>
         <tr>
            <td width="200"> </td>
            <td> </td>
         </tr>
         <tr>
            <td width="200"> </td>
         </tr>
         <br/>	
         <tr>
            <td align='center' colspan='1'>
               <input type='reset' name='reset' value='Clear Form' /> &nbsp;
               <input type='submit' name='submit' value='add movie' />
            </td>
         </tr>
      </table>
      <?php
         }
         ?>
      <a href="database.php">View DVDs</a>
   </div>
</body>
</html>
