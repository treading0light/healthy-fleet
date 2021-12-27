<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'fleet_db';


    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'SELECT * FROM fleet';
    // echo $sql;

    $fleet = $conn->query($sql);
    // echo $fleet_overview;

    if ($fleet->num_rows > 0) {
        
        while($row = $fleet->fetch_assoc()) {
            echo "id: " . $row['id']. " - truck " . $row['truck_id'] . "current mileage " . $row['mileage'];
        }
    } else {
        echo "something went wrong";
    }



?>