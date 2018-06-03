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
        <form action="{{ url('zip-code') }}" method="post">
            {{ csrf_field() }}
            <label for="country">Select Country</label><br>
            <select id="country" name="country">
                @foreach($countries as $country)
                <option value="{{ $country['abb'] }}">{{ $country['name'] }}</option>
                @endforeach
            </select><br><br>
            <label for="zip">Entre Zip</label><br>
            <input type="text" id="zip" name="zip"><br><br>
            <input type="submit" id="submit" name="submit"><br>
        </form>
    </body>
</html>
