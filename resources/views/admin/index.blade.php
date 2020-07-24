@extends('layouts.app');
@section('content')
    @auth
        <br>
        <div class="container">
            <h3>Brands:</h3>
            <a class='btn btn-info' href="{{route('brands.index')}}">List</a>
            <a class='btn btn-success' href="{{route('brands.create')}}">Create</a>

            <hr><br>

            <h3>Components:</h3>
            <a class='btn btn-info' href="{{route('components.index')}}">List</a>
            <a class='btn btn-success' href="{{route('components.create')}}">Create</a>
            <hr><br>

            <a class='btn btn-success' href="/register">Add Super User</a>
            <hr><br>
            <a class='btn btn-default' href='/'>Go back</a>
        </div>
    @endauth
@endsection
