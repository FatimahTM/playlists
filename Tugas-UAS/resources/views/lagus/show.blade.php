@extends('layout.main')

@section('title', 'Detail Lagu')

@section('content')
<div class="container">
    <h2>{{ $lagu->title }}</h2>
    <p>Artist: {{ $lagu->artist->name }}</p>
    <p>Album: {{ $lagu->album }}</p>
    <p>Genre: {{ $lagu->genre }}</p>
    <a href="{{ route('lagus.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
