<?php

    function buildFleetData($view, $id=null) {

        if($view == 'truck') {
            $sql = 'SELECT * FROM fleet WHERE id=' . $id;

        } elseif($view == 'fleet') {
            $sql = 'SELECT id, mileage FROM fleet';
        }

        return $sql;
    }

    function extractFleet($conn) {

        $sql = 'SELECT id, mileage FROM fleet';

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
            return $jsonFleet;

        } else {
        echo "something went wrong";
        }
    }

    function extractTruck($conn) {

        $id = $_GET['truck_id'];
        $sql = 'SELECT * FROM fleet WHERE id=' . $id;

        $truck = $conn->query($sql);
        $jsonTruck = json_encode($truck->fetch_assoc());
        echo $jsonTruck;
        return $jsonTruck;
    }

?>