<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fleet View</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


</head>



<body>

  @include('layouts.header')

  @include('layouts.nav')

  <main>

    <div id="fleet">

    @foreach ($trucks as $truck)

      <div class="truck_bar">
        <h1> {{ ucfirst($truck->name) }} </h1>

        <div class="department">
          <p class="label">Department</p>
          <p>{{ $truck->department->name }}</p>
        </div>

        <div class="service">
          <p class="label">Next Service</p>
          <p>600 mi.</p>
        </div>

        <div class="button">
          <a href="/fleet/{{ $truck->name }}">View</a>
        </div>
      </div>

      <hr>

      

    @endforeach

    </div>

    
  </main>

  <script>
    // async function viewUnit(id) {
    //   document.getElementById('fleet').style.display = 'none';
    //   const target = document.getElementById(id);
    //   target.style.display = 'grid';
    // }

    // async function viewFleet(id) {
    //   const target = document.getElementById(id);
    //   target.style.display = 'none';

    //   document.getElementById('fleet').style.display = 'flex';
    // }

    // $('.nav_item').on('click', function(){
    //   $('.nav_item').removeClass('active_tab');
    //   $(this).addClass('active_tab');
    // });
  </script>

</body>
</html>