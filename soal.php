<?php
session_start();
require("connection.php");
if (!isset($_SESSION["id"])){
	header("Location: index.php");
	exit;
}
if (isset($_POST['jawaban'])){
	$jwbn = intval($_POST['jawaban']);
	if ($_SESSION['angka1']  + $_SESSION['angka2'] === $jwbn){
		$_SESSION["score"] += 10;
		$_SESSION["salah"] = 0;
	}
	else {
		$_SESSION["lives"] -= 1;
		$_SESSION["score"] -= 2;
		$_SESSION["salah"] = 1;
	}
	unset($_SESSION['angka1']);
	unset($_SESSION['angka2']);
}

if (!isset($_SESSION['lives'], $_SESSION['score'])){
	$_SESSION['lives'] = 5;
	$_SESSION['score'] = 0;
	$_SESSION['salah'] = 99;
}
if (!isset($_SESSION['angka1'], $_SESSION['angka2'])){
	$_SESSION["angka1"] = rand(0,20);
	$_SESSION["angka2"] = rand(0,20);
}
if ($_SESSION['lives'] <= 0){
	$query = "INSERT INTO hof VALUES(NULL, $_SESSION[id], $_SESSION[score])";
	echo $query;
	$conn->query($query);
	if ($conn->affected_rows <= 0){
		die("ERRORR!!!");
	}
	header("Location: over.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Cynthia Quiz </title>
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
            Hello <?= $_SESSION['name']; ?>, <?= ($_SESSION['salah'] == 99) ? "tetap semangat ya… you can do the best!!" : (($_SESSION['salah'] == 0) ? "Selamat Jawaban Anda Benar ..." : "sayang jawaban Anda salah… tetap semangat ya !!!") ?>
            <br>
			Lives :  <?= $_SESSION['lives']; ?> | Score : <?= $_SESSION['score']; ?>
			<br><br>
			Berapakah <?= $_SESSION["angka1"] ?> + <?= $_SESSION["angka2"] ?> = 
			<br><br>
			<form action="" method="post">
				<input type="text" name="jawaban" placeholder="Masukkan Jawaban Anda ..." style="width: 96%">
				<br><br>
				<input type="submit" value="Submit" style="margin-left: 0;">
			</form>
 		</div>
	</div>
</body>
</html>