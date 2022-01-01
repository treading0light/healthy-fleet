
<?php
    
    function buildQuery() {

        $id = $_POST['id'];
        $year = $_POST['year'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $mileage = $_POST['mileage'];

        $sql = "INSERT INTO fleet (id, year, make, model, mileage) VALUES (" . $id . "," . $year . ",'" . $make . "','" . $model . "'," . $mileage .");";

        return $sql;
    }

    function addToDb() {

        // connect to the database
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'fleet_db';

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        print_r($_POST['body']);

        // $sql = buildQuery();

        // if (! $conn->query($sql)) {
        //     echo("Error: " . $conn->error);
        // } else {
        //     echo($_POST['data'])
        // }




    }

    addToDb();

?>