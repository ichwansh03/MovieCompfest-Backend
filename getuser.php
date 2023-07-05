<?php
	include 'connect.php';

	$username = $_GET['username'];

	$query = "SELECT * FROM register WHERE username = '".$username."'";
	$msql = mysqli_query($conn, $query);

	$jsonArray = array();

	while ($register = mysqli_fetch_assoc($msql)) {
		
		$rows['id'] = $register['id'];
		$rows['name'] = $register['name'];
		$rows['username'] = $register['username'];
		$rows['age'] = $register['age'];

		array_push($jsonArray, $rows);
	}

	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>