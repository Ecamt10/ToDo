<?php
require_once 'koneksi.php';

if ($conn) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $response = array();

    $row = mysqli_num_rows($result);

    if ($row > 0) {
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
        'status' => 'FAILED'
    ));
}

echo json_encode(array("server_response" => $response));
mysqli_close($conn);