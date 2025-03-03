@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <!-- Card für Playlist bearbeiten -->
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="m-0">Playlist bearbeiten</h3>
                </div>
                <div class="card-body">
                    <!-- Form zum Bearbeiten der Playlist -->
                    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Playlist Name Eingabefeld -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold text-dark">Playlist Name</label>
                            <input type="text" name="name" id="name" value="{{ $playlist->name }}" class="form-control form-control-user">
                        </div>

                        <!-- Speichern und Zurück Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Speichern</button>
                            <a href="{{ route('playlists.index') }}" class="btn btn-secondary btn-sm">Zurück</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
