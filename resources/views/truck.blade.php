<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Truck View</title>
</head>
<body>

    <header>

        <div>

        <img id="logo" src="{{ asset('images/valentine_logo.jpg') }}">
        
        </div>

        <h2>Truck View</h2>

    </header>

    <nav>

      <ul>
        
        <li><a href='/'>Home<a/></li>

        <li><a href='#'>Timeline<a/></li>

        <li><a href='/fleet'>Fleet<a/></li>

        <li><a href='#'>Mangage Drivers<a/></li>

      </ul>
      
    </nav>

    <main class='container'>
        <h3>{{ ucfirst($truck->name) }}</h3>

        <div class='truck_bio'>
            

            <img src='{{ asset($truck->main_photo) }}'>

            <div id='bio_table'></div>

                <table>
                    <tr><td>Department</td><td>{{ $truck->department->name }}</td></tr>
                    <tr><td>Year</td><td>{{ $truck->year }}</td></tr>
                    <tr><td>Make/Model</td><td>{{ $truck->make }}/{{ $truck->model }}</td></tr>
                    <tr><td>Mileage</td><td>{{ $truck->mileage }}</td></tr>
                </table>
            
        </div>
        

        
    </main>
</body>
</html>