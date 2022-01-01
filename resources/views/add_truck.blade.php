<?php 
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Truck</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <header>

        <div>

        <img id="logo" src="valentine_logo.jpg">
    
        </div>

        <h2>Fleet View</h2>
    </header>

    <nav>

      <ul>
        
        <li><a href="/">Home</a></li>

        <li><a href="fleet">Fleet</a></li>

        <li><a href="add_truck">Add to Fleet</a></li>

        <li><a href="#">Asign Gas Card</a></li>

      </ul>
      
    </nav>

    <main>
        <h2>Add a new vehicle to the database</h2>

        <form action="add_new.php" method="post">
            
            <p>Truck ID: <input type="text" id="truck_id" /></p>
            <p>Year: <input type="text" id="truck_year" /></p>
            <br>
            <p>Truck Make: <input type="text" id="truck_make" /></p>
            <p>Truck Model: <input type="text" id="truck_model" /></p>
            <br>
            <p>Current Mileage: <input type="text" id="mileage" /></p>
            <br>
            <p id=submit onclick="addTruck()">Submit</p>
        </form>
    </main>


<script src="external.js"></script>



</body>
</html>