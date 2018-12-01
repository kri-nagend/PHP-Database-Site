<html>

<head>
<title>Prison Database</title>
</head>

<body>

<h1>
<a href="home.php">Back</a>
</h1>

<form method="post">
	<label for="fname">Prisoner ID:</label>
	<input type="text" name="prisonerID"></br></br>
	<label for="fname">First Name:</label>
	<input type="text" name="Fname"></br></br>
	<label for="fname">Last Name:</label>
	<input type="text" name="Lname"></br></br>
	<label for="fname">DOB:</label>
	<input type="text" name="DOB"></br></br>
	<label for="fname">Crime:</label>
	<input type="text" name="crime"></br></br>
	<label for="fname">Parole Date:</label>
	<input type="text" name="paroleDate"></br></br>
	<label for="fname">Behaviour Risk:</label>
	<input type="text" name="behaviourRisk"></br></br>
	<label for="fname">Work Type:</label>
	<input type="text" name="workType"></br></br>
	<label for="fname">Cell Number:</label>
	<input type="text" name="cellNum"></br></br>
	<input type="submit" name="submit1" value="Add">
</form>
 
<?php
	if (isset($_POST['submit1']))
	{
		require_once('./connect.php');

		$prisonerID = $_POST['prisonerID'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$DOB = $_POST['DOB'];
		$crime = $_POST['crime'];
		$paroleDate = $_POST['paroleDate'];
		$behaviourRisk = $_POST['behaviourRisk'];
		$workType = $_POST['workType'];
		$cellNum = $_POST['cellNum'];
						
		$query = "INSERT INTO prisoner (prisonerID, Fname, Lname, DOB, crime, paroleDate, behaviourRisk, workType, cellNum) 
					VALUES ($prisonerID, '$Fname', '$Lname', '$DOB', '$crime', '$paroleDate', $behaviourRisk, '$workType',$cellNum)";
		$response = @mysqli_query($dbc, $query);
		if($response)
		{
			echo "Prisoner Added!";
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