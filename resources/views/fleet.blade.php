<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
  <title>Fleet View</title>
 
</head>



<body>

  @include('layouts.header')

  @include('layouts.nav')

  <main>

    <div id="fleet">

    @foreach ($trucks as $truck)

      <div class="truck_bar">
        <div class="name-pic">
          <h1>{{ ucfirst($truck->name) }}</h1>
          <img src="{{ asset($truck->main_photo) }}">
        </div>

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
    $('#fleet_tab').addClass('active_tab');
  </script>

</body>
</html>