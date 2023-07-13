<?php
	include '../connect.php';

	$username = $_GET['username'];

	$query = "SELECT * FROM withdraw WHERE username = '".$username."'";
	$msql = mysqli_query($conn, $query);

	$jsonArray = array();

	while ($register = mysqli_fetch_assoc($msql)) {
		
		$rows['id'] = $register['id'];
		$rows['username'] = $register['username'];
		$rows['balance'] = $register['balance'];

		array_push($jsonArray, $rows);
	}

	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>