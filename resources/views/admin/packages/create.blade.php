<!DOCTYPE html>
<head>
    <title>PA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@include('inc.messages')
@auth
    <div class="container">
        <br>
        <h3>Add new package</h3>
        <form method='POST' action='{{route('packages.store')}}'>
            @csrf
            <label for="model">Brand:</label>
            <select name="brand" class="form-control" disabled>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}} ({{$brand->id}})</option>
                @endforeach
            </select><br>
            <label for="model">Model:</label>
            <select name="model" class="form-control" disabled>
                <option value="{{$model->id}}">{{$model->name}} ({{$model->id}})</option>
            </select><br>
            <label for="name">Name of package:</label>
                <input class="form-control" type="text" name="name" placeholder="Name of package"><br>
            <label for="price">Total cost:</label>
                <input class="form-control" type="number" name="price" placeholder="Price">
            <br>
            <input class="btn btn-success" type='submit' value='Submit' name='Next'>
        </form>
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
