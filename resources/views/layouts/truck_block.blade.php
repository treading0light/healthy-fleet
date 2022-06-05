<div style="width: 90%;" class=' flex flex-col items-center justify-center gap-10 lg:flex-row lg:justify-start' id="{{ $truck->id }}">
        
        <div id="name-pic" class=" flex flex-col justify-center items-center gap-5">

            <h3 class="font-bold text-2xl">{{ ucfirst($truck->name) }}</h3>

            <img class="w-1/2" src="{{asset($truck->main_photo)}}">

            <div class="button truck_btn">
            <a href="add_images/{{ $truck->name }}">Add Images</a>
            </div>

        </div>

        <div id="truck-data" class="flex flex-col items-center gap-5">

            <table class="text-2xl">

            @if (isset($truck->department_id))
            <tr>
                <th>Department:</th> <td>{{ $truck->department->name }}</td>
            </tr>
            @endif

            <tr>
                <th>Current mileage:</th> <td>{{ $truck->mileage }}</td>
            </tr>

            <tr>
                <th>Last mileage update:</th> <td>11/11/21</td>
            </tr>

            <tr>
                <th>Next service due:</th> <td>600 mi.</td>
            </tr>

            <tr>
                <th>Year:</th> <td>{{ $truck->year }}</td>
            </tr>

            <tr>
                <th>Make/Model:</th> <td>{{ $truck->make }}/{{ $truck->model }}</td>
            </tr>        
            
        </table>

            <a href="{{ url('/fleet/edit/'.$truck->id) }}" class="button">Edit</a>
            
        </div>
        
        
        



    </div>