<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
  <title>Home</title>

</head>
<body>

  @include('layouts.header')

  @include('layouts.nav')

  <main>

    <div id="dashboard" class="flex justify-center gap-60 text-2xl lg:flex-col">

      <div class="flex flex-col gap-5">
        <h3 class="font-bold">You have {{ $truckCount }} vehicles in your fleet</h3>
        <div class="button"><a href="{{ url('/setup/truck') }}">Add new vehicle</a></div>  
      </div>

      <div>
        <h3 class="font-bold">Next few services</h3>
        <table id="service-table">
          @foreach ($services as $service)
          <tr>
            <td>{{ $service->truck->name }} </td>
            <td>{{ $service->name }} </td>
            <td>{{ $service->mileage_due - $service->truck->mileage}} miles </td>
            <td><div class="button"><a href="#">View</a></div></td>
          </tr>
          @endforeach

        </table>

        <div class="button"><a href="#">View all</a></div>
        
      </div>

    </div>

    
  	
  </main>

  <script>
  	$('#home_tab').addClass('active_tab')
  </script>


</body>
</html>