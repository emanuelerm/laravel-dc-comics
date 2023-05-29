@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Home page</h1>
        <a href="{{route('comics.index')}}">View all comics</a>


    </section>
@endsection
