<html>

<head>
<title>Prison Database</title>
</head>

<body>

<h1>
<a href="home.php">Back</a>
</h1>

<form method="post">
	<label for="riskLevel">Risk Level:</label>
	<input type="text" name="riskLevel">
	<input type="submit" name="submit1" value="View Results">
</form>
 
<?php
	if (isset($_POST['submit1']))
	{
		require_once('./connect.php');

		$riskLevel = trim($_POST['riskLevel']);
		$query = "select staffID, FName, LName 
					from staff where staffID 
						in (Select staffID 
								from prisonguard 
									where sectionID 
										in (select sectionID from prison.section where riskLevel = '$riskLevel' )) limit 50";
		$response = @mysqli_query($dbc, $query);
		if($response)
		{
			echo '<table align="left" cellspacing="5" cellpadding="8">
	
			<tr><td align="left"><b>Staff ID</b></td>
			<td align="left"><b>First Name</b></td>
			<td align="left"><b>Last Name</b></td></tr>';
	
			while($row = mysqli_fetch_array($response))
			{
				echo '<tr><td align="left">' .
				$row[staffID] . '</td><td align="left">' .
				$row[FName] . '</td><td align="left">' .
				$row[LName] . '</td><td align="left">';
		
				echo '</tr>';
			}
	
			echo '</table>';
		}
		else
		{
			echo "No Response";
		}
		mysqli_close($dbc);
	}
?>

</body>
</html>