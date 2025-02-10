@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">
        <h3 class="mb-4 text-center heading-style">Playlist bearbeiten</h3>

        <form action="{{ route('playlists.update', $playlist?->id ?? 0) }}" method="POST" class="text-center">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label">Playlist Name</label>
                <input type="text" name="name" id="name" value="{{ $playlist->name }}" class="form-control input-light-purple">
            </div>

            <button type="submit" class="btn btn-primary mb-4 text-center heading-style">Speichern</button>
            <a href="{{ route('playlists.index') }}" class="btn btn-secondary mb-4 text-center heading-style">Zurück</a>
        </form>
    </div>
</div>
@endsection
