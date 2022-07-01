@extends('layouts.main')

@section('content')
  <div class="container py-5">
    <h1>Edit di: {{ $comic->title }}</h1>
    <form action="{{ route('Comics.update', $comic) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Titolo Comic</label>
        <input type="text" class="form-control mb-4" id="title" name="title" placeholder="Titolo"
        value="{{ $comic->title }}"
        required
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">URL Immagine Comic</label>
        <input type="text" class="form-control mb-4" id="image" name="image" placeholder="URL Immagine"
        value="{{ $comic->image }}" 
        required
      </div>
      <div class="mb-3">
        <img class="w-25" src="{{ $comic->image }}" alt="{{ $comic->title }}">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control mb-4" id="type" name="type" placeholder="Type"
        value="{{ $comic->type }}" 
        required
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection