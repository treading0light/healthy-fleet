<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'fleet_db';


    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM fleet where truck_id = 0";
    $conn->query($sql);
    echo "deleted all entries where truck_id = 0"


?>