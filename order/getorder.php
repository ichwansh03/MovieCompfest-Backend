<?php
	include '../connect.php';

	$query = "SELECT id, name, title, quantity, total FROM cart_movie";
	$msql = mysqli_query($conn, $query);

	$jsonArray = array();

	while ($consumer = mysqli_fetch_assoc($msql)) {
		
		$rows['id'] = $consumer['id'];
		$rows['name'] = $consumer['name'];
        $rows['title'] = $consumer['title'];
        $rows['quantity'] = $consumer['quantity'];
		$rows['total'] = $consumer['total'];

		array_push($jsonArray, $rows);
	}

	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>