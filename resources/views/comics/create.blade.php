@extends('layouts.main')

@section('content')
  <div class="container py-5">
    <form action="{{ route('Comics.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Titolo Comic</label>
        <input type="text" class="form-control mb-4" id="title" name="title" placeholder="Titolo" required
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">URL Immagine Comic</label>
        <input type="text" class="form-control mb-4" id="image" name="image" placeholder="URL Immagine" required
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control mb-4" id="type" name="type" placeholder="Immagine" required
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection