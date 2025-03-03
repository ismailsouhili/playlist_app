@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="min-height: 70vh;">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="m-0">Neuen Song hinzufügen</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('songs.store', $playlist->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">

                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold text-dark">Titel</label>
                                <input type="text" name="title" id="title" class="form-control form-control-user" required>
                            </div>

                            <div class="mb-4">
                                <label for="artist" class="form-label fw-bold text-dark">Artist</label>
                                <input type="text" name="artist" id="artist" class="form-control form-control-user" required>
                            </div>

                            <div class="mb-4">
                                <label for="duration" class="form-label fw-bold text-dark">Dauer des Songs</label>
                                <div class="d-flex">
                                    <select name="minutes" id="minutes" class="form-select form-select-user" required>
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <span class="mx-2">:</span>
                                    <select name="seconds" id="seconds" class="form-select form-select-user" required>
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

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
