<?php
	include '../connect.php';

	$response = array();

	if (isset($_POST['username']) && isset($_POST['balance'])) {

		$username = $_POST['username'];
		$balance = $_POST['balance'];

		// Query untuk mencari item dengan nama yang sama
		$query = "SELECT * FROM withdraw WHERE username = '".$username."'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			// Item sudah ada, tambahkan quantities-nya
			$row = mysqli_fetch_assoc($result);
			$currentbalance = $row['balance'];
			$newbalance = $currentbalance + $balance;

			// Update quantities pada item yang sudah ada
			$updateQuery = "UPDATE withdraw SET balance = '".$newbalance."' WHERE username = '".$username."'";
			$updateResult = mysqli_query($conn, $updateQuery);

			if ($updateResult) {
				array_push($response, array(
					'status' => 'OK'
				));
			} else {
				array_push($response, array(
					'status' => 'FAILED'
				));
			}
		} else {
			// Item belum ada, tambahkan item baru ke dalam database
			$insertQuery = "INSERT INTO withdraw (username, balance) 
			VALUES ('".$username."', '".$balance."')";
			$insertResult = mysqli_query($conn, $insertQuery);

			if ($insertResult) {
				array_push($response, array(
					'status' => 'OK'
				));
			} else {
				array_push($response, array(
					'status' => 'FAILED'
				));
			}
		}
	} else {
		array_push($response, array(
			'status' => 'FAILED IN ISSET'
		));
	}

	header('Content-type: application/json');
	echo json_encode($response);
?>
