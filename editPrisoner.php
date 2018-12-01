<html>

<head>
<title>Prison Database</title>
</head>

<body>

<h1>
<a href="home.php">Back</a>
</h1>

<?php
/**
 * Update a prisoner
 *
 *
 */
if (isset($_POST['update']))
{

	try
	{

		require "./config.php";
		require "./common.php";
		$connection = new PDO($dsn, $username, $password, $options);

$crime = $_POST['crime'];
$Fname = $_POST['Fname'];
$Lname  = $_POST['Lname'];
$DOB     = $_POST['DOB'];
$crime     = $_POST['crime'];
$paroleDate  = $_POST['paroleDate'];
$behaviourRisk  = $_POST['behaviourRisk'];
$workType  = $_POST['workType'];
$cellNum  = $_POST['cellNum'];
$prisonerID = $_POST['prisonerIDa'];

    $sql = "UPDATE prisoner
            SET Fname = '$Fname',
            Lname = '$Lname',
            DOB ='$DOB',
            crime = '$crime',
            paroleDate = '$paroleDate',
            behaviourRisk = '$behaviourRisk',
            workType  = '$workType',
            cellNum = '$cellNum'

            WHERE prisonerID = $prisonerID";
    //Prepare PDOStatement
    $stmt = $connection->prepare($sql);

    //execute query
    $stmt->execute();
	echo "Successfully Updated!";
	}

	catch(PDOException $error)
	{
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>


<?php
/**
 * First find and display the information of the prisoner to be updated
 * search by prisoner ID
 *
 */
if (isset($_POST['submit1']))
{

	try
	{

		require "./config.php";
		require "./common.php";
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = "SELECT *
						FROM prisoner
						WHERE prisonerID = :prisonerID";
		$prisonerID = $_POST['prisonerID'];
		$statement = $connection->prepare($sql);
		$statement->bindParam(':prisonerID', $prisonerID, PDO::PARAM_STR);
		$statement->execute();
		$result = $statement->fetchAll();
	}

	catch(PDOException $error)
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>


<?php
if (isset($_POST['submit1']))
{
	if ($result && $statement->rowCount() > 0)
	{ ?>
		<!-- <h2>Results</h2>

		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>DOB</th>
					<th>crime</th>
					<th>paroleDate</th>
					<th>behaviourRisk</th>
					<th>workType</th>
					<th>cellNum</th>
				</tr>
			</thead>
			<tbody> -->
	<?php
		foreach ($result as $row)
		{/* ?>
			<tr>
				<td><?php echo escape($row["prisonerID"]); ?></td>
				<td><?php echo escape($row["Fname"]); ?></td>
				<td><?php echo escape($row["Lname"]); ?></td>
				<td><?php echo escape($row["DOB"]); ?></td>
				<td><?php echo escape($row["crime"]); ?></td>
				<td><?php echo escape($row["paroleDate"]); ?></td>
				<td><?php echo escape($row["behaviourRisk"]); ?> </td>
				<td><?php echo escape($row["workType"]); ?> </td>
				<td><?php echo escape($row["cellNum"]); ?> </td>
			</tr>*/?>
		<?php
		} ?>
		</tbody>
	</table>
	<?php
	}
	else
	{ ?>
		<blockquote>No results found for <?php echo escape($_POST['prisonerID']); ?>.</blockquote>
	<?php
	}
}?>


<h2>Find prisoner based on ID</h2>

<form method="post">
	<label for="prisonerID">prisonerID</label>
	<input type="text" id="prisonerID" name="prisonerID">
	<input type="submit" name="submit1" value="View Results">
</form>

<br>
<br>


<form method="post">
  <div class="form-group">
		<label for="prisonerIDa">Prisoner ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
		<input type="text" name="prisonerIDa" id="prisonerIDa" value="<?php echo escape($row["prisonerID"]); ?>" readonly>
	</div>
	<div class="form-group">
		<label for="Fname">First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
		<input type="text" name="Fname" id="Fname" value="<?php echo escape($row["Fname"]); ?>">
	</div>
	<div class="form-group">
	<label for="Lname">Last Name&nbsp;&nbsp;&nbsp;&nbsp; </label>
	<input type="text" name="Lname" id="Lname" value="<?php echo escape($row["Lname"]); ?>">
	</div>
	<div class="form-group">
	<label for="DOB">Date of Birth&nbsp;</label>
	<input type="text" name="DOB" id="DOB" value="<?php echo escape($row["DOB"]); ?>">
	</div>
	<div class="form-group">
	<label for="crime">Crime&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
	<input type="text" name="crime" id="crime" value="<?php echo escape($row["crime"]); ?>">
	</div>
	<div class="form-group">
	<label for="paroleDate">Parole Date&nbsp;&nbsp;</label>
	<input type="text" name="paroleDate" id="paroleDate" value="<?php echo escape($row["paroleDate"]); ?>">
	</div>
	<div class="form-group">
	<label for="behaviourRisk">Behaviour Risk</label>
	<input type="text" name="behaviourRisk" id="behaviourRisk" value="<?php echo escape($row["behaviourRisk"]); ?>">
	</div>
	<div class="form-group">
	<label for="workType">Work Type&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input type="text" name="workType" id="workType" value="<?php echo escape($row["workType"]); ?>">
	</div>
	<div class="form-group">
	<label for="cellNum">Cell Number&nbsp;&nbsp;</label>
	<input type="text" name="cellNum" id="cellNum" value="<?php echo escape($row["cellNum"]); ?>">
		</div>
  <input type="submit" name="update" value="Update">

</form>


</body>
</html>