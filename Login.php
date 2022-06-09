<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css"/>
<title>West Ham United University</title>
</head>
<body>

<div class="sticky">
<div class="bar_name"><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">West Ham United University</div>
<div class="bar_menu">
<a href="Home.html"><button class="button shadow1 button2">Home</button></a>
<a href="About.html"><button class="button shadow1 button2">About Us</button></a>
<a href="Gallery.html"><button class="button shadow1 button2">Gallery</button></a>
<a href="Contact.html"><button class="button shadow1 button2">Contact Us</button><a>
</div>
<div class="dropdown login">
  <button class="button shadow button2">More   <i class="fa fa-caret-down"></i></button>
  <div class="dropdown-content">
    <a href="Login.php">Students</a>
    <a href="Courses.php">Courses</a>
	<a href="register.php">Logout</a>
  </div>
</div>
</div>
<a class="p1"><div class="title"><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet"> Students list and details
<?php require_once 'process.php';?>


<?php 
	$mysqli=new mysqli('localhost','root','','reg') or die (mysqli_error($mysqli));
	$result= $mysqli-> query("SELECT * FROM user") or die ($mysqli->error);
	//pre_r($result);
?>
<div class="data-box1 ">
	<table class="databox">
		<thead>
		<tr>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Password</th>
			<th>Course</th>
			<th class="inline" colspan="2">Action</th>
			
		</tr>
		</thead>
		<?php 
			while ($row = $result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row['FirstName'];?></td>
					<td><?php echo $row['LastName'];?></td>
					<td><?php echo $row['Email'];?></td>
					<td><?php echo $row['Password'];?></td>
					<td><?php echo $row['course'];?></td>
					<td class="databox3">
							<a href="Login.php?edit=<?php echo $row['id'];?>"
							class="buttonn buttonedit">Edit</a>
							<a onclick="validation()" href="process.php?delete=<?php echo$row['id'];?>"
							class="buttonn buttondelete">Delete</a>
							
							
		<script src="jquery-3.5.1.min.js"></script>
		<script src="sweetalert2.all.min.js"></script>
					</td>
				</tr>
		<?php endwhile;?>
	</table> 
</div>
	
<?php
	function pre_r ($array){
			echo'<pre>';
			print_r($array);
			echo'</pree>';
			}
?>
<div action="process.php" >
<form  class="data-box" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?> ">


<div class="textbox">
	<label>First name</label>
	<input type="text" name="FirstName" class="form-control" value="<?php echo $FirstName?>" placeholder="Enter the First name"required>
</div>
<div class="textbox">
	<label>Last name</label>
	<input type="text" name="LastName" class="form-cotrol" value="<?php echo $LastName?>" placeholder="Enter the Last name"required>
</div>
<div class="textbox">
	<label>Email address</label>
	<input type="email" name="Email" class="form-control" value="<?php echo $Email?>" placeholder="Enter the Email address"required>
</div>
<div class="textbox">
	<label>Password</label>
	<input type="Password" name="Password"	class="form-control" value="<?php echo $Password?>" placeholder="Enter the Password"required>
</div>
<div class="textbox">
	<label>Select your course: </label>
	<select class="selecttab" name="course">
	<?php
                        while($rows=$resultSet->fetch_assoc()){
                          $course=$rows['course'];
                          echo "<option value='$course'>$course</option>";
                        }
                        ?>
	</select></br>
</div>
<input type="CHECKBOX" name="Agree"  class="check-box"required><span>I agree to terms</span>
<div>
	<?php
		if ($update== true):
	?>
		<button type="SUBMIT" name="Update"  class="submit-btn">Update</button>
	<?php else: ?>
		<button type="SUBMIT" name="Submit" id="submit" value="Submit" class="submit-btn">Submit</button>
	<?php endif; ?>
</div>

</form>
</div>



</body>


