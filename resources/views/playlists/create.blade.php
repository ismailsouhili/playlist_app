@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6">
        <h3 class="mb-4 text-center heading-style">Neue Playlist </h3>

        <form action="{{ route('playlists.store') }}" method="POST" class="text-center">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control input-light-purple" required>
            </div>

            <button type="submit" class="btn btn-primary mb-4 text-center heading-style">Speichern</button>
        </form>
    </div>
</div>
@endsection
