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

    // right here I am building this file to work on multiple pages. I plan to 
    // use a session variable to determine fleet_db and _get variable to determine view
    // here's a sloppy fix for now

    if($_SESSION['view'] == 'truck') {
        $sql = buildFleetData($_SESSION['view'], $_GET['truck_id']);
        // $sql = 'SELECT * FROM fleet WHERE id=' . $id;

    } elseif($_SESSION['view'] == 'fleet') {
        // $sql = buildFleetData($_SESSION['view']);
        $sql = 'SELECT id, mileage FROM fleet';
    }

    // $sql = 'SELECT * FROM fleet WHERE id=2';
    $sql = 'SELECT id, mileage FROM fleet';
    // $view = 'fleet';
    // $sql_string = buildFleetData($view);
    // echo 'here is the str ' . $sql_string;
    // echo 'here is the view ' . $view;
    

    // send the query
    $fleet = $conn->query($sql);

    // empty array to hold each row of data
    $arrayFleet = [];

    // if no data recieved throw an error
    if ($fleet->num_rows > 0) {

        // loop through all rows from DB as assoc arrays
        while($row = $fleet->fetch_assoc()) {

            // store each assoc array in an array
            array_push($arrayFleet, $row);
            }

        // encode as json before printing out
        $jsonFleet = json_encode($arrayFleet);
        print_r($jsonFleet);
       
    } else {
        echo "something went wrong";
    }

?>