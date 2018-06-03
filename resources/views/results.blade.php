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
    </head>
    <body>
    @include('includes.error')
        @if(!empty($places))
        @foreach($places as $place)
        <p>name: {{ $place['name'] }}</p>
        <p>place: {{ $place['place'] }}</p>
        <p>longitude: {{ $place['longitude'] }}</p>
        <p>latitude: {{ $place['latitude'] }}</p>
        <hr>
        @endforeach
        @endif
        <a href="{{ url('') }}">Go Back</a>
    </body>
</html>
