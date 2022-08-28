
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Truck</title>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/style.css') }}">
</head>
<body>

    @include(layouts.header)

    @include(layouts.nav)

    <main>
        <h2>Add a new vehicle to the database</h2>

        <form action="/add_truck" method="POST" enctype="multipart/form-data" >
            @csrf
            
            <div class="flex flex-col gap-5 items-center lg:flex-row lg:justify-around lg:gap-10">

                <div class="flex flex-col">
                    <p>Truck Name: <input type="text" id="name" name="name" /></p>
                    <p>Year: <input type="text" id="year" name="year" /></p>
                    <br>
                    <p>Truck Make: <input type="text" id="make" name="make"/></p>
                    <p>Truck Model: <input type="text" id="model" name="model" /></p>
                    <br>
                    <p>Current Mileage: <input type="text" id="mileage" name="mileage" /></p>
                    <br>
                    <select name="department_id" id="department_id">
                        @foreach ($departments as $department)

                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <label for="img">Select image:</label>
                    <input type="file" id="img" name="img" accept="image/*" />
                </div>

                <div class="flex flex-col gap-2 items-center">

                    <h1 class="font-bold">Update mileage settings:</h1>

                    <h3>Mileage auto update:</h3>

                    <div class="flex gap-5">                    
                        <h3>off<input type="radio" name="mileage_update_method" value="off"></h3>
                        <h3>average<input type="radio" name="mileage_update_method" value="average"></h3>
                    </div>
                    
                    <h3 class="mt-5">Est. average miles per day</h3>
                    <input type="number" name="average_mileage" value="{{ $truck->average_mileage }}">
                </div>
                
            </div>
            

            <button type="submit" class="button">Submit</button>
        </form>
    </main>


<!-- <script src="external.js"></script> -->



</body>
</html>