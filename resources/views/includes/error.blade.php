@if($errors && $errors->any())
    @foreach($errors->all() as $error)
        <h1>{{ $error }}</h1>
    @endforeach
@endif