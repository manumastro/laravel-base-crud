{{-- @extends('layouts.main')

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
@endsection --}}

@extends('layouts.main')

@section('content')
  <div class="container py-5">

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li class="text-danger  ">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('Comics.update', $comic) }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Titolo Comic</label>
        <input type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        id="title" name="title"
        value="{{ old('title', $comic->title, $comic->title) }}" 
        placeholder="Titolo">
        @error('title')
          <p class="text-danger mb-4">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3 d-flex flex-column">
        <label for="image" class="form-label">URL Immagine Comic</label>
        <img class="w-25 mb-2" src="{{ $comic->image }}" alt="{{ $comic->title }}">
        <input type="text" 
        class="form-control @error('image') is-invalid @enderror"
        id="image" name="image"
        value="{{ old('image', $comic->image) }}" 
        placeholder="URL Immagine">
        @error('image')
          <p class="text-danger mb-4">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" 
        class="form-control @error('type') is-invalid @enderror" 
        id="type" name="type"
        value="{{ old('type', $comic->type) }}" 
        placeholder="Type"> 
        @error('type')
          <p class="text-danger mb-4">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection