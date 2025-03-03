@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="min-height: 70vh;">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="m-0">Song bearbeiten</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('songs.update', $song) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold text-dark">Titel</label>
                                <input type="text" name="title" id="title" value="{{ $song->title }}" class="form-control form-control-user">
                            </div>

                            <div class="mb-4">
                                <label for="artist" class="form-label fw-bold text-dark">Artist</label>
                                <input type="text" name="artist" id="artist" value="{{ $song->artist }}" class="form-control form-control-user">
                            </div>

                            @php
                                $durationParts = explode(':', $song->duration);
                                $selectedMinutes = isset($durationParts[0]) ? (int) $durationParts[0] : 0;
                                $selectedSeconds = isset($durationParts[1]) ? (int) $durationParts[1] : 0;
                            @endphp

                            <div class="mb-4">
                                <label for="duration" class="form-label fw-bold text-dark">Dauer des Songs</label>
                                <div class="d-flex">
                                    <!-- Minuten -->
                                    <select name="minutes" id="minutes" class="form-select form-select-user" required>
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}" {{ $i == $selectedMinutes ? 'selected' : '' }}>
                                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                            </option>
                                        @endfor
                                    </select>
                                    <span class="mx-2">:</span>
                                    <!-- Sekunden -->
                                    <select name="seconds" id="seconds" class="form-select form-select-user" required>
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}" {{ $i == $selectedSeconds ? 'selected' : '' }}>
                                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Speichern</button>
                                <a href="{{ route('playlists.index' ) }}" class="btn btn-secondary btn-sm">Zurück</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
