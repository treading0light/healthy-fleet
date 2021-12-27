<?php
    function getJson() {

        $string = file_get_contents("data.json");
        $data = json_decode($string, true);
        // echo $data[0];

        return $data;

    }

    function addToDb($sql) {
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

        // query the database and check for errors
        if ($conn->multi_query($sql) === TRUE) {
          echo "New records created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function buildQuery($assoc) {

        $sql = "";

        // loop through the json file
        foreach ($assoc as $truck => $data) {

            // simplify the variables
            $id = $truck;
            $year = $data['year'];
            $make = $data['make'];
            $model = $data['model'];
            $mileage = $data['mileage'];

            // build a string containing sql code and add it to $sql variable
            $sql .= "INSERT INTO fleet (id, year, make, model, mileage) VALUES (" . $id . "," . $year . ",'" . $make . "','" . $model . "'," . $mileage .");";
        }
        return $sql
    }  

    $fleet = getJson();
    $sql = buildQuery($fleet);
    addToDb($sql);

    // foreach ($fleet as $truck => $data) {
    //     print_r("Truck " . $truck . " Make/Model " . $data['make'] . " " . $data['model'] . "<br>");
    // }

?>