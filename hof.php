<?php
session_start();
require("connection.php");
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
		width: 80%;
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
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<body>
	<div class="container">
		<div class="forms">
            <h3> Hall Of Fame </h3>
            <table id="myTable">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Score </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $req = $conn->query("SELECT * FROM hof a JOIN users b ON a.id_users = b.id ORDER BY score DESC");
                    $no = 1;
                    while ($c = $req->fetch_object()){
                        echo "<tr>
                                <td> $no </td>
                                <td> $c->nama </td>
                                <td> $c->score </td>
                              </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
 		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</html>
