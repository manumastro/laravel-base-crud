@extends('layouts.main')

@section('content')

  <div class="container">
    <h1>comics</h1>
    {{-- @dump($comics); --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Title</th>
          <th scope="col">Type</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($comics as $comic)         
          <tr>
            <th scope="row">{{ $comic->id }}</th>
            <td>{{ $comic->title }}</td>
            <td>{{ $comic->type }}</td>
            <td>
              <a href="{{ route('Comics.show', $comic) }}" class="btn btn-success">Show</a>
              <a href="{{ route('Comics.edit', $comic) }}" class="btn btn-primary">Edit</a>

              <form class="d-inline" action="{{ route('Comics.destroy', $comic) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection