@extends('layouts.main')


@section('content')
  <div class="container">
    <h1 class="fw-bold">Errore 404</h1>
    <h2 class="fw-bold">{{  $exception->getMessage()  }}</h2>
  </div>
@endsection