<?php

$output = NULL;
$output1=NULL;
if(isset($_POST['Register'])&& isset($_POST['Agree']))
{
	$mysqli = NEW MySQLi('localhost','root','','reg');
	
	$Email = $mysqli->real_escape_string($_POST['Email']);
	$FirstName = $mysqli->real_escape_string($_POST['FirstName']);
	$LastName = $mysqli->real_escape_string($_POST['LastName']);
	$Password = $mysqli->real_escape_string($_POST['Password']);
	$course= $mysqli-> real_escape_string($_POST['course']);

	$query = $mysqli->query("SELECT * FROM user WHERE Email='$Email'");

	if($query->num_rows !=0){
		$output= "That username is already taken.";
	}else{
		$insert= $mysqli->query("INSERT INTO user (FirstName,LastName,Email,Password,course) VALUES('$FirstName','$LastName','$Email','$Password','$course')");
		$output="You have been registered!";
		}
}elseif(isset($_POST['Register'])&! isset($_POST['Agree']))
 {
	$output="You need to agree with the terms and conditions";
}

$user_type="";

if(isset($_POST['Login'])){
	
	$connect = NEW MySQLi('localhost','root','','reg');
	$ID= $connect->real_escape_string($_POST['ID']);
	$Password1= $connect->real_escape_string($_POST['Password1']);

	$query = "SELECT * FROM user WHERE Email='$ID' AND Password='$Password1'";
	$query1="SELECT DISTINCT course FROM user WHERE Email='$ID' AND Password='$Password1'";
	$result= mysqli_query($connect,$query);
	$result1= mysqli_query($connect,$query1);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			if($row["user_type"]=="admin"){
				$_SESSION['Email']=$row["Email"];
				header('Location: Login.php');
			}elseif(mysqli_num_rows($result1)>0){
					while($row=mysqli_fetch_assoc($result1)){
						if($row["course"]=="Health and Social Care"){
							$_SESSION['Email']=$row["Email"];
							header('Location: studenthealth.php');
						}else{
							$_SESSION['Email']=$row["Email"];
							header('Location: studentcertHe.php');
						}
					}
				}
			}
	} else{
		$output1="Login Not Successful";
	}
	
}
?>


<head>
    <?php require_once 'process.php';?>
    <link rel="stylesheet" href="style.css" />
    <title>West Ham United University</title>
</head>

<body>

    <div class="sticky">
        <div class="bar_name">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">West Ham
            United University
        </div>
        <div class="bar_menu">
            <a href="Home.html"><button class="button shadow1 button2">Home</button></a>
            <a href="About.html"><button class="button shadow1 button2">About Us</button></a>
            <a href="Gallery.html"><button class="button shadow1 button2">Gallery</button></a>
            <a href="Contact.html"><button class="button shadow1 button2">Contact Us</button></a>
        </div>
        <div class="login">
            <a href="register.php"><button class="button shadow button2">Login/Register</button></a>
        </div>
    </div>
</body>
<div class="message">
    <?PHP
echo $output;
echo $output1;
?>
</div>
<div class="form-box">
    <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Login</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
    </div>
    <form id="login" method="POST" class="input-group">

        <input type="Email" name="ID" class="input-field" placeholder="Email address" required>
        <input type="password" name="Password1" class="input-field" placeholder="Password" required></br></br></br>
        <button type="SUBMIT" name="Login" value="Login" class="submit-btn">Log In</button>
    </form>
    <form id="register" method="POST" class="input-group">

        <input type="text" name="FirstName" class="input-field" placeholder="First name" required>
        <input type="text" name="LastName" class="input-field" placeholder="Last Name" required>
        <input type="email" name="Email" class="input-field" placeholder="Email address " required>
        <input type="Password" name="Password" class="input-field" placeholder="Password" required></br></br>
        <label>Select your course: </label>
        <select name="course">
            <?php
                        while($rows=$resultSet->fetch_assoc()){
                          $course=$rows['course'];
                          echo "<option value='$course'>$course</option>";
                        }
                        ?>
        </select></br>

        <input type="CHECKBOX" name="Agree" class="check-box"><span>I agree to terms</span>
        <button type="SUBMIT" name="Register" value="Register" class="submit-btn">Register</button>
    </form>
</div>

<script>
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}
</script>