@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-6">
            <h3 class="mb-4 text-center heading-style">Neuen Song hinzufügen</h3>

            <form action="{{ route('songs.store') }}" method="POST" class="text-center">
                @csrf
                <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">

                <div class="mb-4">
                    <label for="title" class="form-label">Titel</label>
                    <input type="text" name="title" id="title" class="form-control input-light-purple" required>
                </div>

                <div class="mb-4">
                    <label for="artist" class="form-label">Artist</label>
                    <input type="text" name="artist" id="artist" class="form-control input-light-purple" required>
                </div>

                <div class="mb-4">
                    <label for="duration" class="form-label">Dauer des Songs</label>
                    <div class="d-flex">
                        <select name="minutes" id="minutes" class="form-control input-light-purple" required>
                            @for ($i = 0; $i < 60; $i++)
                                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                        <span class="mx-2">:</span>
                        <select name="seconds" id="seconds" class="form-control input-light-purple" required>
                            @for ($i = 0; $i < 60; $i++)
                                <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-4 text-center heading-style">Speichern</button>
                <a href="{{ route('playlists.index') }}" class="btn btn-secondary mb-4 text-center heading-style">Zurück</a>
            </form>
        </div>
    </div>
@endsection
