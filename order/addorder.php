<?php
    include '../connect.php';
    $response = array();

    $name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$title = $_POST['title'];
	$price = $_POST['price'];
	$total = $_POST['total'];
 
    if (isset($name) && isset($quantity) && isset($title) && isset($price) && isset($total)) {
        
        $query = "INSERT INTO cart_movie (name, quantity, title, price, total, seats)
        VALUES ('".$name."', '".$quantity."', '".$title."', '".$price."', '".$total."')";
        
        $result = mysqli_query($conn, $query);

        if ($result) {
            array_push($response, array(
                'status' => 'OK'
            ));
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }

    } else {
        array_push($response, array(
            'status' => 'FAILED IN ASSET'
        ));
    }

    header('Content-type: application/json');
    echo json_encode($response);
?>