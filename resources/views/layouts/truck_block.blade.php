<div class='truck_block flex-row' id="{{ $truck->id }}">
        
        <div id="name-pic" class="flex-col">

            <h3 class="truck_name">{{ ucfirst($truck->name) }}</h3>

            <img class="truck_img" src="{{asset($truck->main_photo)}}">

            <div class="button truck_btn">
            <a href="add_images/{{ $truck->name }}">Add Images</a>
            </div>

        </div>
        
        <table class="truck_table">

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
        



    </div>