<?php
session_start();
$_SESSION['view'] = 'truck';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Truck View</title>
</head>
<body>

    <header>

        <div>

        <img id="logo" src="valentine_logo.jpg">
        
        </div>

        <h2>Truck View</h2>

    </header>

    <nav>

      <ul>
        
        <li><a href='fleet_view.php'>Home<a/></li>

        <li><a href='#'>Timeline<a/></li>

        <li><a href='#'>Manage Fleet<a/></li>

        <li><a href='#'>Mangage Drivers<a/></li>

      </ul>
      
    </nav>

    <main class='container'>

        

        
    </main>

    <script src="external.js"></script>
    <script> renderTruck(<?php echo $_GET['truck_id'] ?>) </script>
</body>
</html>