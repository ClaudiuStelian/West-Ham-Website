<?php
$DSN = 'mysql:host=localhost;dbname=reg';
$ConnectingDB = new PDO($DSN,'root','');
$SearchQueryParameter = $_GET["id"];
if (isset($_POST["Submit"])){
	
		$email		  = $DataRows["Email"];
		$firstname	  = $DataRows["FirstName"];
		$lastname	  = $DataRows["LastName"];
		$course	  = $DataRows["course"];
		$ConnectingDB;
		$sql ="UPDATE user SET Email='$email' FirstName='$firstname', LastName='$lastName' WHERE id='$SearchQueryParameter'";
        $Execute=$ConnectingDB->query($sql);
		if ($Execute){
			echo '<script>window.open("view_data.php?id=Record Updated Successfully","_self")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<title>Update data stored in the database</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
global $ConnectingDB;
$sql ="SELECT * FROM user WHERE id ='$SearchQueryParameter'";
$stmt=$ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()){
 $id		  = $DataRows["id"];
 $Email		  = $DataRows["Email"];
 $firstname	  = $DataRows["FirstName"];
 $lastname	  = $DataRows["LastName"];
 $course      = $DataRows["course"];
}



?>
<div class="">
 
<form class="" action="Updateid.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
	<fieldset>
	<span class="FieldInfo">First Name:</span>
	<br>
	<input type="text" name="firstname" value="<?php echo $EName; ?>">
	<br>
	<span class="FieldInfo">SLast Name:</span>
	<br>
	<input type="text" name="lastname" value="<?php echo $SSN; ?>">
	<br>
	<span class="FieldInfo">Course:</span>
	<br>
	<input type="text" name="course" value="<?php echo $Department; ?>">
	<br>
	<span class="FieldInfo">Salary:</span>
	<br>
	<input type="text" name="Salary" value="<?php echo $Salary; ?>">
	<br>
	</fieldset>
	</form>
	</div>
</body>
</html>