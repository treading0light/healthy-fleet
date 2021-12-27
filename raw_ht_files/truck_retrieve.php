<?php

// connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'fleet_db';
    $conn = new mysqli($host, $user, $password, $dbname);

    // check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM fleet WHERE id = " . $_GET['truck_id']

    $truck = $conn->query($sql);
    $json_truck = json_encode($truck);
    print_r($json_truck);

?>