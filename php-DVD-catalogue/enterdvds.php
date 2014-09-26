<!DOCTYPE html>
<head>
<title>Enter a New DVD</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="Files.CSS" type="text/css"/ charset="utf-8">
</head>
<body>
<h1>DVD Entry</h1>
<?php
$ShowForm=FALSE;
$fields= array('ID', 'cert', 'filmtitle', 'releaseDate', 'filmDuration', 'director', 'description');
$report=array();
foreach ($fields as $field)
	$report[$field]="";
	
if (isset($_POST['submit']))
{

	foreach ($fields as $field)
	{
	
		//check if field is empty
		if ((!isset($_POST[$field])) || (srtlen(trim(($_POST[$field])))==0))
		{
		
			echo "<p>'$field' is a required field</p>\n";
			$ShowForm=TRUE;
		
		}
		else
		{
		
			//store data submitted in $report array
			$report[$field]=stripslashes(trim($_POST[$field]));
		
		}
	
	}
	if ($ShowForm===FALSE)
	{
		
		$DBConnection = mysqli_connect("157.190.64.130", "R00068614" , "ub96BZ");
		if (!DBConnection)
		{
		
			$error = "<p>Unable to connect to the database server.</p>\n"
				. "<p>Connection error code " . mysqli_connect_errno(). "</p>\n";
				
				include 'error.html.php';
				exit();
		
		
		}
	
	else //connection successful
	{
	
		$DBName = "r00068614dvd";
		
		if (!mysqli_select_db($DBConnection, $DBName))
		{
		
			$error = "<p>Unable to connect to the $DBName database!</p>\n"
				. "<p>Error code " . mysqli_errno($DBConnection)
					. ": " . mysqli($DBConnection) . "</p>\n";
					
					
			include 'error.html.php';
			exit();		
		
		}
		
		else // select db
		{
		//sanatise data entered by user ready for INSERT to MYSQL
		$ID = mysqli_real_escape_string($DBConnection, $_POST['ID']);
		$cert = mysqli_real_escape_string($DBConnection, $_POST['cert']);
		$filmtitle = mysqli_real_escape_string($DBConnection, $_POST['filmtitle']);
		$releaseDate = mysqli_real_escape_string($DBConnection, $_POST['releaseDate']);
		$filmDuration = mysqli_real_escape_string($DBConnection, $_POST['filmDuration']);
		$director = mysqli_real_escape_string($DBConnection, $_POST['director']);
		$description = mysqli_real_escape_string($DBConnection, $_POST['description']);
		
		$SQLString = 'INSERT INTO titles SET
						ID="'.$ID.'",
						cert="'.$cert.'",
						filmtitle="'.$filmtitle.'",
						releaseDate="'.$releaseDate.'",
						filmDuration="'.$filmDuration.'",
						director="'.$director.'",
						description="'.$description.'"';
						
												if (!mysqli_query($DBConnection, $SQLString))
						{
						
							echo "<p>There was an error saving the record.<br/>\n" .
								 "The error was " . 
								 htmlspecialchars(mysqli_error($DBConnection), ENT_QUOTES) .
								 ".<br/>\nThe query was '" .
								 htmlspecialchars($SQLString,ENT_QUOTES) .
								 "'</p>\n";
								 
						}
						else
						{
							echo "<p>The bug report was saved.</p>\n";
						}
		

		}//select db
		
	
	
	}//db connection
	
	
}//showForm


}
else
{
	$ShowForm=TRUE;
}
if ($ShowForm===TRUE)
{
?>
<form action= 'EnterDVDs.php' method='GET>'
<table>
<tr><td align='right'>ID:</td><td align='left'>
	<input type='text' size='10' name='ID' value='<?php echo $report['ID']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Cert:</td><td align='left'>
	<input type='text' size='10' name='cert' value='<?php echo $report['cert']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Title:</td><td align='left'>
	<input type='text' size='10' name='filmtitle' value='<?php echo $report['filmtitle']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Release Date:</td><td align='left'>
	<input type='text' size='20' name='releaseDate' value='<?php echo $report['releaseDate']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Duration:</td><td align='left'>
	<input type='text' size='20' name='filmDuration' value='<?php echo $report['filmDuration']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Director:</td><td align='left'>
	<input type='text' size='40' name='director' value='<?php echo $report['director']; ?>' />
	</td></tr><br/>
<tr><td align='right'>Description:</td><td align='left'>
	<input type='text' size='40' name='description' value='<?php echo $report['description']; ?>' />
	</td></tr><br/>	
<tr><td align='center' colspan='2'>
		<input type='reset' name='reset' value='Clear Form' /> &nbsp;
		<input type='submit' name='submit' value='Save Report' />
		</td></tr>
</table>
<?php
}
?>
<a href="database.php">View DVDs</a>
</body>
</html>
