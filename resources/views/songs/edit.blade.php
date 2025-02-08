@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">
        <h3 class="mb-4 text-center heading-style">Song bearbeiten</h3>

        <form action="{{ route('songs.update', $song) }}" method="POST" class="text-center">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" id="title" value="{{ $song->title }}" class="form-control input-light-purple">
            </div>

            <div class="mb-4">
                <label for="artist" class="form-label">Künstler</label>
                <input type="text" name="artist" id="artist" value="{{ $song->artist }}" class="form-control input-light-purple">
            </div>


            <button type="submit" class="btn btn-primary mb-4 text-center heading-style">Speichern</button>
            <a href="{{ route('playlists.index', $song->playlist_id) }}" class="btn btn-secondary mb-4 text-center heading-style">Zurück</a>
        </form>
    </div>
</div>
@endsection
