<?php
session_start();

 
$mysqli=new mysqli('localhost','root','','reg') or die (mysqli_error($mysqli));
$id=0;
$update= false;
$FirstName= '';
$LastName='';
$Email='';
$Password='';
$course='';
$module='';
$courseid=0;
$resultSet= $mysqli->query("SELECT DISTINCT course FROM courses");





if(isset($_POST['Submit'])&& isset($_POST['Agree'])){
	$FirstName= $_POST['FirstName'];
	$LastName=$_POST['LastName'];
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$course=$_POST['course'];
	
	$mysqli-> query("INSERT INTO user (FirstName, LastName, Email, Password, course) VALUES ('$FirstName','$LastName','$Email','$Password','$course')")or
			die($mysqli->error);
			

}

if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$mysqli->query("DELETE FROM user WHERE id=$id")or die ($mysqli->error());
	
	header("location: Login.php");
	
}

if (isset($_GET['edit'])){
		$id=$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM user WHERE id=$id") or die($mysqli->error());
		if($result->num_rows){
			$row = $result->fetch_array();
			$FirstName= $row['FirstName'];
			$LastName=$row['LastName'];
			$Email=$row['Email'];
			$Password=$row['Password'];
			$course=$row['course'];
		}
	
}
if (isset($_POST['Update'])&& isset($_POST['Agree'])){
		$id= $_POST['id'];
		$FirstName= $_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$Email=$_POST['Email'];
		$Password=$_POST['Password'];
		$course=$_POST['course'];
		$mysqli-> query("UPDATE user SET FirstName='$FirstName', LastName='$LastName', Email='$Email', Password='$Password', course='$course' WHERE id='$id'")or
			die($mysqli->error);
		header("location: Login.php");
}



if (isset($_POST['Submit1'])){
	$module=$_POST['module'];
	$course=$_POST['course'];
	$mysqli-> query("INSERT INTO courses (module, course) VALUES ('$module','$course')")or
	die($mysqli->error);

}	
if(isset($_GET['delet'])){
	$courseid=$_GET['delet'];
	$mysqli->query("DELETE FROM courses WHERE courseid=$courseid")or die ($mysqli->error());
	
	header("location: Courses.php");
	
}
if (isset($_GET['edit'])){
	$courseid=$_GET['edit'];
	$update=true;
	$result=$mysqli->query("SELECT * FROM courses WHERE courseid=$courseid") or die($mysqli->error());
	if($result->num_rows){
		$row1 = $result->fetch_array();
		$module= $row1['module'];
		$course=$row1['course'];
	}
}
if (isset($_POST['Update1'])){
	$courseid= $_POST['courseid'];
	$module= $_POST['module'];
	$course=$_POST['course'];
	$mysqli-> query("UPDATE courses SET module='$module', course='$course' WHERE courseid='$courseid'")or
		die($mysqli->error);
	header("location: Courses.php");
}