<?php
    include 'connect.php';
    $response = array();

    $name = $_POST['name'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($name) && isset($age) && isset($username) && isset($password)) {
        
        $query = "INSERT INTO register (name, age, username, password)
        VALUES ('".$name."', '".$age."', '".$username."', '".$password."')";
        
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