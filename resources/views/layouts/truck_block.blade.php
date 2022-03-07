<div class='truck_block {{ $truck->department->name }}' id="{{ $truck->id }}">
        <h3 class="truck_name">{{ ucfirst($truck->name) }}</h3>

        <img class="truck_img" src="{{asset($truck->main_photo)}}">

        <div class="truck_table">

        <h5>Department</h5> <h5>{{ $truck->department->name }}</h5> 
        <h5>Current mileage:</h5> <h5>{{ $truck->mileage }}</h5> 
        <h5>Last mileage update</h5> <h5>11/11/21</h5> 
        <h5>Next service due:</h5> <h5>600 mi.</h5> 
        <h5>Make/Model:</h5> <h5>{{ $truck->make }}/{{ $truck->model }}</h5>
        <h5>Year:</h5> <h5>{{ $truck->year }}</h5>

        </div>

        <div class="button truck_btn">
            <a href="add_images/{{ $truck->name }}">Add Images</a>
        </div>

    </div>