@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Add new Comic</h1>
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror"
                name="title" id="title" value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control
                @error('thumb')
                    is-invalid
                @enderror"
                name="thumb" id="thumb" value="{{old('thumb')}}">
                @error('thumb')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control
                @error('type')
                    is-invalid
                @enderror"
                name="type" id="type" value="{{old('type')}}">
                @error('type')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control
                @error('series')
                    is-invalid
                @enderror"
                name="series" id="series" value="{{old('series')}}">
                @error('series')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control
                @error('price')
                    is-invalid
                @enderror"
                name="price" id="price" value="{{old('price')}}">
                @error('price')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Release date</label>
                <input type="date" class="form-control
                @error('sale_date')
                    is-invalid
                @enderror"
                name="sale_date" id="sale_date" value="{{old('sale_date')}}">
                @error('sale_date')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control
                @error('description')
                    is-invalid
                @enderror"
                name="description" id="description" value="{{old('description')}}" cols="30" rows="10">
                @error('description')
                    <div class="invalid-feedback">
                        <p>{{$message}}</p>
                    </div>
                @enderror
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </section>
@endsection
