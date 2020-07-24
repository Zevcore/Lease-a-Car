<!DOCTYPE html>
<head>
    <title>PA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@include('inc.messages');
@auth
    <div class="container">
        <h3>Brands:</h3>
        @foreach($brandsWithModels as $brand)
            <h4>{{$brand->name}}</h4>
            <div style="display:flex; align-items: center;";>
                @foreach($brand->carModels as $car)
                    <p style="margin: 5px; padding:5px;">{{$car->name}}</p>
                    <form method="POST" action="{{route('models.destroy', $car->id)}}">
                        {{ csrf_field() }}
                        <input type="hidden"name="_method" value="DELETE">
                        <input type="submit" value="X" class="btn btn-danger">
                    </form>
                    &nbsp;|&nbsp;
                    <form method="GET" action="{{route('models.edit', $car->id)}}">
                        <input type="submit" value="E" class="btn btn-warning">
                    </form>
                @endforeach
            </div>
        @endforeach
        <br>
        <a href="/admin" class="btn btn-default">Go back</a>
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
