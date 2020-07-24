@extends('layouts.app');

@section('content')
    <h1>Search car:</h1>
    <form method="get" action="/search">
        <div class="md-form mt-0">
            <input class="form-control" type="number" name="search" lass="form-control" type="text" placeholder="What amount of cars do you wear?">
        </div>
        <br>
        <input class='btn btn-dark' type="submit" value="Search">
    </form>
    @include('inc.messages')
    <br><br>

    <div class="row">
        <div class="col-md-8 mb-5">
            <h2>What We Do</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            <a class="btn btn-success btn-lg" href="#">Let's calc! &raquo;</a>
        </div>
        <div class="col-md-4 mb-5">
            <h2>Contact Us</h2>
            <hr>
            <address>
                <strong>Leasing System</strong>
                <br>Lirowa 13
                <br>Warsaw
                <br>
            </address>
            <address>
                <abbr title="Phone"><i class="fas fa-phone-volume"></i></abbr>
                (+48) 456-7890
                <br>
                <abbr title="Email"><i class="far fa-envelope"></i></abbr>
                <a href="mailto:#">name@example.com</a>
            </address>
        </div>
@endsection
