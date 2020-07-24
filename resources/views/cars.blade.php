@extends('layouts.app')
@section('content')

    <div class="container-fluid" style="display: flex; justify-content: center">
    @foreach($packages as $package)
        <div class="py-3 mr-3 text-center" style="display: flex; flex-direction: column;">
            <h2>{{$package['carModels']['brand']->name}}</h2>
            <h6 class="text-muted">{{$package['carModels']->name}}</h6>
            <form method="GET" action="/equipment">
                <input name="package" type="hidden" value="{{$package->id}}">
                <input type="submit" class="btn btn-warning" value="{{$package->name}}">
            </form>
            <p class="py-3 text-success">{{$package->price}} PLN</p>
        </div>
        {{--{{dd($package['carModels'])}}--}}
    @endforeach
    </div>
    <br>

    <br>
    <a href="/" class="btn btn-dark">Go back</a>

@endsection
