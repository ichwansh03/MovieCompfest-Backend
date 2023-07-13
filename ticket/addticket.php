<?php
    include '../connect.php';
    $response = array();

    $name = $_POST['name'];
	$title = $_POST['title'];
	$total = $_POST['total'];
    $seat = $_POST['seat'];

    if (isset($name) && isset($quantity) && isset($title) && isset($price) && isset($total) && isset($seat)) {
        
        $query = "INSERT INTO ticket (name, quantity, title, price, total, seat)
        VALUES ('".$name."', '".$quantity."', '".$title."', '".$price."', '".$total."', '".$seat."')";
        
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