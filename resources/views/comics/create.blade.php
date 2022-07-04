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

    <form action="{{ route('Comics.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Titolo Comic</label>
        <input type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        id="title" name="title"
        value="{{ old('title') }}" 
        placeholder="Titolo">
        @error('title')
          <p class="text-danger mb-4">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">URL Immagine Comic</label>
        <input type="text" 
        class="form-control @error('image') is-invalid @enderror"
        id="image" name="image"
        value="{{ old('image') }}" 
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
        value="{{ old('type') }}" 
        placeholder="Type"> 
        @error('type')
          <p class="text-danger mb-4">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection