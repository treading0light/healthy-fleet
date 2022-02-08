<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fleet View</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>

<header>

  <div>

    <img id="logo" src="{{ asset('images/hf_logo.jpg'); }}">
    
    </div>

  <h2>Fleet View</h2>
</header>

<body>
    <nav>

      <ul>
        
        <li><a href="/">Home</a></li>

        <li><a href="#">Maintenance Timeline</a></li>

        <li><a href="add_truck">Add to Fleet</a></li>

        <li><a href="#">Asign Gas Card</a></li>

      </ul>
      
    </nav>

  <main class="container">

    @foreach ($trucks as $truck)

      <div class='truck_block'>

        <h3>{{ ucfirst($truck->name) }}</h3>

        <img src="{{ asset($truck->main_photo) }} ">

        <div id='redundant'>
          <div class='truck_table'>

            <table>
              <tr> <td>Department</td> <td>{{ $truck->department->name }}</td> </tr>
              <tr> <td>Current mileage:</td> <td>{{ $truck->mileage }}</td> </tr>
              <tr> <td>Last mileage update</td> <td>11/11/21</td> </tr>
              <tr> <td>Next service due:</td> <td>600 mi.</td> </tr>

            </table>
          </div>

          
          <a class='button' href='/fleet/{{ $truck->name }}'>View</a>
        </div>

      </div>
      <hr>

    @endforeach


    

  </main>

</body>
</html>