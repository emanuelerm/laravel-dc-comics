@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Comics</h1>
        <form action="{{ route('comics.index') }}" method="GET">
            <select name="type" id="type">
                <option value="">All</option>
                <option value="comic book">comic book</option>
                <option value="graphic novel">graphic novel</option>
            </select>
            <button type="submit" class="btn btn-success">Search</button>
        </form>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row gy-4">
            @foreach ($comics as $comic)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $comic->title }}</h5>
                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Check the comic
                            </a>
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modify
                            </a>
                            <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete" data-item-title="{{$comic->title}}">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @include('partials.deletemodal')
@endsection
