<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
  <title>Fleet View</title>
 
</head>



<body class="bg-slate-300">

  @include('layouts.header')

  @include('layouts.nav')

  <main>

    <div id="fleet" class="flex flex-col w-full gap-4 items-center md:text-2xl">

    @foreach ($trucks as $truck)

      @if (isset($truck->department))
      <div id="truck-bar-{{ $truck->id }}" class="w-4/5 rounded-2xl flex justify-around items-center bg-slate-400 lg:text-3xl {{ $truck->department->name }}">
      @else
      <div id="truck-bar-{{ $truck->id }}" class="w-4/5 flex justify-around items-center bg-slate-400 lg:text-3xl">
      @endif

        <div class="flex flex-col w-1/6 my-2">
          <p class="font-bold">{{ ucfirst($truck->name) }}</p>
          <img 
            src="{{ asset($truck->main_photo) }}"
            class="w-fit" 
          >
          
          
        </div>

        <div class="department">
          <p class="bold">Department</p>
          @if (isset($truck->department))
          <p>{{ $truck->department->name }}</p>
          @else
          <p>None</p>
          @endif
        </div>

        <div class="service">
          <p class="bold">Next Service</p>
          <p>{{ $nextService[$truck->id] }} miles.</p>
        </div>

        
        <a class="button text-base p-5 font-semibold text-center" href="/fleet/{{ $truck->id }}">View</a>
        

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