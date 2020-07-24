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
            <ul>
            @foreach($brands as $brand)
                <li>
                    {{$brand->name}} ({{$brand->id}})
                    <div style="display: flex;">
                    <form method="POST" action="{{route('brands.destroy', $brand->id)}}">
                            {{ csrf_field() }}
                        <input type="hidden"name="_method" value="DELETE">
                        <input type="submit" value="Remove" class="btn btn-danger"> 
                    </form>
                    <form method="get" action="{{route('brands.edit', $brand->id)}}">
                        <input type="submit" value="Edit" class="btn btn-warning">
                    </form>
                    </div>
                </li>
            @endforeach
            </ul>
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
