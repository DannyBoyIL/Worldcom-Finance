<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @if(!empty($title))
            {{ $title }}
            @endif
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="flex-center position-ref full-height">

            @foreach($places as $place)
            <p>name: {{ $place['name'] }}</p>
            <p>place: {{ $place['place'] }}</p>
            <p>longitude: {{ $place['longitude'] }}</p>
            <p>latitude: {{ $place['latitude'] }}</p>
            @endforeach

            <a href="{{ url('') }}">Go Back</a>
        </div>
    </body>
</html>
