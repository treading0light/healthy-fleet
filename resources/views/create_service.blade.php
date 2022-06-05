<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
    <title>Make Service</title>
</head>
<body class="bg-slate-300">
    @include('layouts.header')

    @include('layouts.nav')

    <main class="w-11/12 bg-slate-400 m-auto rounded-2xl min-h-screen text-2xl flex flex-col items-center">

        <div id="form_container" class="flex flex-col mt-10">

            <div id="error">
                @if($errors->any())
                {!! implode('', $errors->all(':message')) !!}
                @endif
            </div>

            <div id="message">
                @if(isset($_SESSION['message']))
                {!! $_SESSION['message'] !!}
                @endif
            </div>

            <form id="service_form" action="/create_service" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2 items-center">
                @csrf

                <input type="hidden" name="truck_id" value="{{ $truck }}">

                <h3>Name: <input type="text" name="name"></h3>

                <h3>Frequency: <select name="frequency"></h3>

                    <option value="once">once</option>

                    <option value="recurring">recurring</option>

                </select>

                <h3>repeat service every <input type="number" name="mileage_repeat">miles.</h3>

                <h3>This service due in: <input type="number" name="mileage_due">miles.</h3>

                <h3>Description: <textarea id="description" name="description" rows="5" cols="30"></textarea></h3>

                <button type="submit" class="button">Submit</button>
                
            </form>


            
        </div>
    </main>

    <script> 
    </script>

</body>
</html>