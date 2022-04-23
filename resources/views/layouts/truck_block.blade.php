<div class='truck_block flex-row' id="{{ $truck->id }}">
        
        <div id="name-pic" class="flex-col">

            <h3 class="truck_name">{{ ucfirst($truck->name) }}</h3>

            <img class="truck_img" src="{{asset($truck->main_photo)}}">

            <div class="button truck_btn">
            <a href="add_images/{{ $truck->name }}">Add Images</a>
            </div>

        </div>
        

        <!-- <div class="truck_table">

        @if (isset($truck->department_id))
        <h5>Department</h5> <h5>{{ $truck->department->name }}</h5>
        @endif
        
        <h5>Current mileage:</h5> <h5>{{ $truck->mileage }}</h5> 
        <h5>Last mileage update</h5> <h5>11/11/21</h5> 
        <h5>Next service due:</h5> <h5>600 mi.</h5> 
        <h5>Make/Model:</h5> <h5>{{ $truck->make }}/{{ $truck->model }}</h5>
        <h5>Year:</h5> <h5>{{ $truck->year }}</h5>

        

        </div> -->
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