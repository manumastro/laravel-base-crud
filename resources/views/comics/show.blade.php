@extends('layouts.main')

@section('content')
  <div class="container">
    <h1 class="mb-4">{{ $comic->title }}</h1>

    <a href="#" class="btn btn-primary me-4">EDIT</a>
    <span class="bg-info badge text-bg-info">{{ $comic->type }}</span>

    <div class="row py-5">
      <div class="col-6">
        <img src="{{ $comic->image }}" alt="{{ $comic->title }}">
      </div>
    </div>

    <a href="{{ route('Comics.index') }}" class="btn btn-secondary"><< torna</a>


  </div>
@endsection