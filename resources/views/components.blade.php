@extends('layouts.app');
@section('content')
    <h1>{{$engine['packages']['carModels']['Brand']->name}}</h1>
    <h3 class="text-muted">{{$engine['packages']['carModels']->name}} ({{$engine['packages']->name}})</h3>
    <h4 class="btn btn-success">{{$engine['packages']->price}} PLN</h4>
    <hr>

    <form method="GET" action="/lease">
        @foreach($components as $component)
            <input type="radio" value="{{$component->id}}">{{$component->value}} ({{$component->type}})</br>
        @endforeach
            <br>
        <input type="hidden" value="{{$engine['packages']->price}}" name="price">
        <label for="contribution">Own contribution:</label>
        <input type="text" name="contribution" class="form-control" placeholder="e. g. 20000">
            <br>
        <label for="months">Period of installments</label>
        <select name="months" class="form-control">
            <option value="36">36 months</option>
            <option value="24">24 months</option>
            <option value="12">12 months</option>
        </select>
            <br>
        <input type="submit" value="Calc" class="btn btn-warning">

    </form>
@endsection
