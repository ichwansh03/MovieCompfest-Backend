<?php
    session_start();
	include 'connect.php';

	$username = $_GET['username'];
	$password = $_GET['password'];

	$cek = "SELECT * FROM register WHERE username = '".$username."' AND password = '".$password."'";
	$msql = mysqli_query($conn, $cek);
	$result = mysqli_num_rows($msql);

	if (!empty($username) && !empty($password)) {
		
		if ($result == 0) {
			echo "username atau password salah";
		}else{
			$_SESSION['username'] = $username;
			$_SESSION['is_login'] = true;
			echo "0";
		}
	}else{
		echo "Semua harus di isi terlebih dahulu";
	}
?>