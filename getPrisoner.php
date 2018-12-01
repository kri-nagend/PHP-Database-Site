<html>
<head>
<title>Prison Database</title>
</head>
<body>
<h1>
<a href="home.php">Back</a>
</h1>
<?php
require_once('./connect.php');

$query = "SELECT prisonerID, Fname, Lname, cellNum FROM prisoner LIMIT 10";

$response = @mysqli_query($dbc, $query);

if($response)
{
	echo '<table align="left" cellspacing="5" cellpadding="8">
	
	<tr><td align="left"><b>Prisoner ID</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>Cell Number</b></td></tr>';
	
	while($row = mysqli_fetch_array($response))
	{
		echo '<tr><td align="left">' .
		$row[prisonerID] . '</td><td align="left">' .
		$row[Fname] . '</td><td align="left">' .
		$row[Lname] . '</td><td align="left">' .
		$row[cellNum] . '</td><td align="left">';
		
		echo '</tr>';
	}
	
	echo '</table>';
}
else
{
	echo "No Response";
}
mysqli_close($dbc);
?>

</body>
</html>