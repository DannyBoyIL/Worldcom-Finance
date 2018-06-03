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
    <div class="content">
        <div class="m-b-md">
            <form action="{{ url('zip-code') }}" method="post">
                {{ csrf_field() }}
                <label for="country"></label>
                <select id="country" name="country">
                @foreach($countries as $country)
                    <option value="{{ $country['abb'] }}">{{ $country['name'] }}</option>
                @endforeach
                </select><br>
                <label for="zip">Zip</label><br>
                <input type="text" id="zip" name="zip"><br>
                <input type="submit" id="submit" name="submit"><br>
            </form>
        </div>
    </div>
</div>
</body>
</html>
