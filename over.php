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
	<title> Cynthia Quiz - Game Over </title>
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
        Hello, <?= $_SESSION['name']; ?>… Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.
        <br><br>
        Score Anda :  <?= $_SESSION['score']; ?>
        <br><br>
        <input type="submit" value="Main Lagi" style="margin-left: 0;" onclick="window.location.href='welcome.php'">
        <?php
        unset($_SESSION['lives']);
        unset($_SESSION['score']);
        unset($_SESSION['angka1']);
        unset($_SESSION['angka2']);
        $_SESSION['salah'] = 99;
        ?>
 		</div>
    </div>
    <?php include("hof.php"); ?>
</body>
</html>
