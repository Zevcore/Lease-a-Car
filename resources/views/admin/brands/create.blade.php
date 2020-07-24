<!DOCTYPE html>
<head>
    <title>PA</title>    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @auth
        <div class="container">
            <br>
            <h3>Add new brand!</h3>
            <form method='POST' action='{{route('brands.store')}}'>
                {{ csrf_field() }}
                <input class="form-control" placeholder='e.g. Toyota' class="form-conrol" type="text" name="brand">
                <br>
                <input class="btn btn-success" type='submit' value='Add model' name='submit'>
            </form>
{{--<br>
            <h4>or</h4>
            <br>
            <h3>Add model for brand!</h3>

            --}}{{--<form method='GET' action='/select'>
                @csrf
                <select class="form-control" name="brand">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
                <br>
                <input class="btn btn-success" type='submit' value='Add model' name='submit'>
            </form>--}}

            <br>
            @include('inc.messages')
            <br>
            <a class="btn btn-default" href="/admin">Go back</a>
        </div>
    @else
        <div class="container">
        <br>
        <p class="alert alert-danger" role="alert">You aren't super user!</p>
        <a href="/" class="btn btn-default">Go back</a>
        <br>
        </div>
    @endauth
</body>
