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
        <h3>Add new component</h3>
        <form method='POST' action='{{route('components.store')}}'>
            @csrf
            <label for="package">Choose package:</label>
            <br>
            <label for="type">Choose type of component</label>
            <select name="type" class="form-control">
                <option>Wheels</option>
                <option>Smth</option>
            </select><br>
            <label for="value">Set value of component</label>
            <input type="text" name="value" class="form-control"><br>
            <input type="submit" class="btn btn-success form-control" value="+">
        </form>
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
