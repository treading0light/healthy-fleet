<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
  <title>Home</title>

</head>
<body class="bg-slate-300">

  @include('layouts.header')

  @include('layouts.nav')

  <div id="dashboard" class="w-11/12 m-auto min-h-screen rounded-2xl
   bg-slate-400 flex flex-col items-center justify-center gap-10 text-2xl lg:flex-row lg:gap-30 lg:items-start lg:justify-evenly">

    <div class="flex flex-col items-center gap-5 w-fit p-20">

      @if ($truckCount == 1)
      <h3 class="font-bold">You have {{ $truckCount }} vehicle in your fleet</h3>
      @else
      <h3 class="font-bold">You have {{ $truckCount }} vehicles in your fleet</h3>
      @endif

      <div class="button"><a href="{{ url('/setup/truck') }}">Add new vehicle</a></div>  
    </div>

    <div class="flex flex-col items-center gap-2 p-20">
      <h3 class="font-bold">Next few services</h3>
      <table id="service-table" class=" text-center overflow-x-auto">
        @if (isset($services))
        @foreach ($services as $service)
        <tr>
          <td class="px-2 py-5">{{ $service->truck->name }} </td>
          <td class="p-5">{{ $service->name }} </td>
          <td class="p-5">{{ $service->mileage_due - $service->truck->mileage}} miles </td>
          <td><div class="button"><a href="/update_service/{{ $service->id }}">View</a></div></td>
        </tr>
        @endforeach
        @else
        <h3 class="text-2xl">None</h3>
        @endif

      </table>

      <a class="button w-fit h-fit" href="#">View all</a>
      
    </div>

  </div>

  <script>
  	$('#home_tab').addClass('active_tab')
  </script>


</body>
</html>