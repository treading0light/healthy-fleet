<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<!-- secure assets for prod env, non secure for local -->
@if (env('APP_ENV')!='local')

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>

@else

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

@endif