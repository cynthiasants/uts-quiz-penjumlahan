<!DOCTYPE html>
<html>
<head>
	<title> Cynthia Quiz - Registration </title>
</head>
<style type="text/css">
	body {
		background: #f1f1f1;
	}
	.container {
		width: 80%;
		margin: 5% auto;
		/*text-align: center;*/
	}
	.forms {
		width: 550px;
		background: white;
		border: #fefefe 1px solid;
		border-radius: 4px;
		margin: 10px auto;
		text-align: justify;	
		padding: 20px 25px;
	}
	input[type="submit"] {
		border: none;
		background: #444;
		color: white;
		padding: 10px 25px;
		border-radius: 3px;
		cursor: pointer;
	}
</style>
<body>
	<div class="container">
		<div class="forms">
			Nama
			<br><br>
			<form method="post" action="">				
				<input type="text" name="name" placeholder="Masukkan Nama Anda ..." style="width: 96%">
				<br><br>
				Email
				<br><br>
				<input type="email" name="email" placeholder="Masukkan Email Anda ..." style="width: 96%">
				<br><br>
				<input type="submit" value="Next" style="margin-left: 0;">
			</form>
 		</div>
	</div>
</body>
</html>

<?php
session_start();
require("connection.php");

if (isset($_POST['name'], $_POST['email'])){
	$query = "SELECT * FROM users WHERE email='".$conn->escape_string($_POST['email'])."' AND nama='".$conn->escape_string($_POST['name'])."'";
	$data = $conn->query($query)->fetch_array();
	if (count($data) > 0){
		$_SESSION['name'] = $data['nama'];
		$_SESSION['id'] = $data['id'];
		header("Location: welcome.php");
		exit;
	}
	else {
		$q = "INSERT INTO users VALUES(NULL,'".$conn->escape_string($_POST['name'])."','".$conn->escape_string($_POST['email'])."')";
		$conn->query($q);
		if ($conn->affected_rows <= 0){
			die("ERROR !!!!");
		}
		
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['id'] = $conn->insert_id; 
		header("Location: soal.php");
		exit;
	}
}
if (isset($_SESSION['id'])){
	header("Location: welcome.php");
	exit;
}