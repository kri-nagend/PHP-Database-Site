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

$query = "SELECT workType, round(avg(salary),2) as AverageSalary
FROM prison.staff
where workType in ('laundry', 'general labour', 'kitchen')
group by workType
order by AverageSalary desc";

$response = @mysqli_query($dbc, $query);

if($response)
{
	echo '<table align="left" cellspacing="5" cellpadding="8">
	
	<tr><td align="left"><b>Work Type</b></td>
	<td align="left"><b>Average Salary</b></td></tr>';
	
	while($row = mysqli_fetch_array($response))
	{
		echo '<tr><td align="left">' .
		$row[workType] . '</td><td align="left">' .
		$row[AverageSalary] . '</td><td align="left">' .
		$row[Lname] . '</td><td align="left">';
		
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