<?php
  session_start();
  $_SESSION['view'] = 'fleet';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fleet View</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<header>

  <div>

    <img id="logo" src="valentine_logo.jpg">
    
    </div>

  <h2>Fleet View</h2>
</header>

<body>
    <nav>

      <ul>
        
        <li>Home</li>

        <li>Maintenance Timeline</li>

        <li>Add to Fleet</li>

        <li>Asign Gas Card</li>

      </ul>
      
    </nav>

  <main class="container">

    

  </main>


  <script src="external.js"></script>
  <script>
    renderFleet();
  </script>

</body>
</html>