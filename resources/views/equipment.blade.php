@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <h2>{{($package['carModels']['brand']->name)}}</h2>
        <h4>{{$package['carModels']->name}}</h4>
        <p class="text-muted">({{$package->name}})</p>
        <form method="get" action="/component">
            @foreach($engines as $engine)
                <input type="radio" name="engine" value="{{$engine->id}}">{{$engine->type}}<br>
            @endforeach
            <br>
            <input class="btn btn-success" type="submit" value="Select">
        </form>
    </div>
    <br>

    <br>
    <a href="/" class="btn btn-dark">Go back</a>

@endsection
