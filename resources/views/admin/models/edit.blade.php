<!DOCTYPE html>
<head>
    <title>PA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@include('inc.messages');
@auth
    <div class="container">
        <br>
        <h3>Edit model {{$model->name}}!</h3>
        <form method='POST' action='{{route('models.update', $model->id)}}'>
            {{ csrf_field() }}
            <input class="form-control" placeholder='e.g. Toyota' class="form-conrol" value="{{$model->name}}" type="text" name="model">
            <input class="form-control" placeholder="$" type="number" name="price" value="{{$model->price}}">
            <input type="hidden"name="_method" value="PUT">
            <br>
            <input class="btn btn-success" type='submit' value='Submit' name='submit'>
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
