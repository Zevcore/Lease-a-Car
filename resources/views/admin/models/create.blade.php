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
        <h3>Add new model for brand!</h3>
        <form method='POST' action='{{route('models.store')}}'>
            @csrf
            <select name="select" class="form-control" disabled>
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
            </select>
            <input type="hidden" value="{{$brand->id}}" name="brand">
            <br>
            <label for="model">Model: </label>
            <input class="form-control" placeholder='e.g. Corolla' type="text" name="model">
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
