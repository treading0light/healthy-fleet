
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

            <button type="submit" class="button">Submit</button>
        </form>
    </main>


<!-- <script src="external.js"></script> -->



</body>
</html>