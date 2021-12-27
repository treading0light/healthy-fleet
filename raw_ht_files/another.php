<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'fleet_db';


    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO fleet(id, model, truck_id, mileage) VALUES (07, 'ford lightning', '24', 105250)";
    $added_fleet = $conn->query($sql);

    $sql = "SELECT truck_id FROM fleet";
    $display_added = $conn->query($sql);
    while ($row = $display_added->fetch_assoc()){

        echo $row['truck_id'];
    }

?>