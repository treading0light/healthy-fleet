<html>
<head>
    @include('layouts.head')
    <title>Make Service</title>
</head>
<body class="bg-slate-300">
    @include('layouts.header')

    @include('layouts.nav')

    @php
    if (!isset($service)) {
        $service = (object) [
            'name' => '',
            'frequency' => 'once',
            'mileage_repeat' => 0,
            'mileage_due' => 0,
            'description' => ''
        ];

        $title = 'Create service for';
    } else {
        $title = 'Update service for';

        $service->mileage_due = $service->mileage_due - $truck->mileage;
    }

    @endphp

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

            <h1 class="mx-auto text-3xl">{{ $title }} <strong>{{ $truck->name }}</strong></h1>

            <div class="mt-10">
                <form id="service_form" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2 items-center">
                @csrf

                <input type="hidden" name="truck_id" value="{{ $truck->id }}">

                <h3>Name: <input type="text" name="name" value="{{ $service->name }}"></h3>

                <h3>Frequency: <select id="frequency" name="frequency"></h3>

                    <option {{ ($service->frequency) == 'once' ? 'selected' : '' }} value="once">once</option>

                    <option {{ ($service->frequency) == 'recurring' ? 'selected' : '' }} value="recurring">recurring</option>

                </select>

                <h3 id="mileage_input">repeat service every <input type="number" name="mileage_repeat" value="{{ $service->mileage_repeat }}">miles.</h3>

                <h3>This service due in: <input type="number" name="mileage_due" value="{{ $service->mileage_due }}">miles.</h3>

                <h3>Description: <textarea id="description" name="description" rows="5" cols="30" value="{{ $service->description }}"></textarea></h3>

                @if ($form_action == '/create_service')
                <button type="submit" class="button">Submit</button>
                @else
                <button type="submit" class="button">Update</button>
                @endif
                
                </form>
            </div>
            


            
        </div>
    </main>

    <script> 
        const toggleInput = () => {
            console.log('toggleInput')
            if ($('#frequency').val() == 'once') {
                $('#mileage_input').addClass('off')
            } else {
                $('#mileage_input').removeClass('off')
            }
        }


        $('#frequency').on('change', function() {
            toggleInput()
        })

        toggleInput()



    </script>

</body>
</html>