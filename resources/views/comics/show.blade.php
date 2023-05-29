@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>{{ $comic->title }}</h1>
        <div class="card">
            <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
            <div class="card-body">
                <h5 class="card-title"> {{ $comic->title }}</h5>
                <p class="card-text">{!! $comic->description !!}</p>
                <p class="card-text"><strong>Price:</strong>
                    ${{ $comic->price }} - <strong>Type:</strong> {{ $comic->type }} - <strong>Release:</strong>
                    {{ $comic->sale_date }}</p>

            </div>
        </div>
    </section>
@endsection
