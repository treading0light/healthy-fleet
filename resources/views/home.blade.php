<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
  <title>Home</title>

</head>
<body class="bg-slate-400">

  @include('layouts.header')

  @include('layouts.nav')

  <div id="dashboard" class="flex flex-col items-center justify-center gap-20 text-2xl lg:flex-row lg:gap-60">

    <div class="flex flex-col grow gap-5 bg-slate-400 p-20 rounded-2xl">
      <h3 class="font-bold">You have {{ $truckCount }} vehicles in your fleet</h3>
      <div class="button"><a href="{{ url('/setup/truck') }}">Add new vehicle</a></div>  
    </div>

    <div class="w-1/3 bg-slate-400 p-20 rounded-2xl">
      <h3 class="font-bold">Next few services</h3>
      <table id="service-table" class=" text-center overflow-x-auto">
        @if (isset($services))
        @foreach ($services as $service)
        <tr>
          <td>{{ $service->truck->name }} </td>
          <td>{{ $service->name }} </td>
          <td>{{ $service->mileage_due - $service->truck->mileage}} miles </td>
          <td><div class="button"><a href="#">View</a></div></td>
        </tr>
        @endforeach
        @else
        <h3 class="text-2xl">None</h3>

      </table>

      <div class="button"><a href="#">View all</a></div>
      
    </div>

  </div>

  <script>
  	$('#home_tab').addClass('active_tab')
  </script>


</body>
</html>