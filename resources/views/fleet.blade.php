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

    <div id="fleet" class="flex-col">

    @foreach ($trucks as $truck)

      @if (isset($truck->department))
      <div class="truck_bar  {{ $truck->department->name }}">
      @else
      <div class="truck_bar">
      @endif

        <div class="name-pic">
          <p class="label">{{ ucfirst($truck->name) }}</p>
          <img src="{{ asset($truck->main_photo) }}">
        </div>

        <div class="department">
          <p class="label">Department</p>
          @if (isset($truck->department))
          <p>{{ $truck->department->name }}</p>
          @else
          <p>None</p>
          @endif
        </div>

        <div class="service">
          <p class="label">Next Service</p>
          <p>{{ $nextService[$truck->id] }}</p>
        </div>

        <div class="button">
          <a href="/fleet/{{ $truck->id }}">View</a>
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