<?php
    include '../connect.php';
    $response = array();

    $name = $_POST['name'];
	$title = $_POST['title'];
	$seat = $_POST['seat'];

    if (isset($name) && isset($title) && isset($seat)) {
        
        $query = "INSERT INTO seats (name, title, seat)
        VALUES ('".$name."', '".$title."', '".$seat."')";
        
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