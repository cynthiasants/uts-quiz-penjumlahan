<?php
session_start();
require("connection.php");
if (!isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Cynthia Quiz - Welcome Back </title>
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
        Hello <?= $_SESSION['name']; ?>, selamat datang kembali di permainan ini!!!
        <br><br>
        <input type="submit" value="Start Game" style="margin-left: 0;" onclick="window.location.href='soal.php'">
        <br><br>
        <a href="logout.php">Bukan Anda? (klik di sini) </a>  
 		</div>
	</div>
</body>
</html>
