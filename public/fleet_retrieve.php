<?php
    
    session_start();

    include('external.php');
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

    // echo $_SESSION['view']; 

    // right here I am building this file to work on multiple pages. I plan to 
    // use a session variable to determine fleet_db and _get variable to determine view
    // here's a sloppy fix for now

    if($_SESSION['view'] == 'truck') {
        $jsonTruck = extractTruck($conn);

    } elseif($_SESSION['view'] == 'fleet') {
        $jsonFleet = extractFleet($conn);
        print_r($jsonFleet);
    }

?>