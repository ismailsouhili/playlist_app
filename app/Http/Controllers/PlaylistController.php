<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Playlist;

use App\Models\Song;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;



class PlaylistController extends Controller
{
    //
    public function index($playlist_id = null)
    {
        $playlists = Playlist::all();

        if (!$playlist_id && count($playlists) > 0) {
            $playlist_id = $playlists->first()->id;
        }

        $songs = $playlist_id ? Song::where('playlist_id', $playlist_id)->get() : [];

        return view('playlists', compact('playlists', 'songs', 'playlist_id'));
    }

    public function edit($id)
{
    $playlist = Playlist::find($id);

    if (!$playlist) {
        abort(404, "Playlist nicht gefunden!");
    }

    return view('playlists.edit', compact('playlist'));
}

    public function update(Request $request, Playlist $Playlist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Playlist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('playlists.index', $Playlist->playlist_id)->with('success', 'Playlist aktualisiert!');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return redirect()->route('playlists.index')
            ->with('success', 'Playlist erfolgreich gelöscht.');
    }

    public function create()
    {
        return view('playlists.create', compact('playlist'));
    }

    public function exportCSV()
    {
        $fileName = 'playlists_songs.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');

            // Header-Zeile schreiben
            fputcsv($handle, ['id', 'Playlist Name', 'Song Title', 'Artist', 'Dauer'], ',', "\0");

            // Alle Playlists mit Songs abrufen
            $playlists = Playlist::with('songs')->get();

            foreach ($playlists as $playlist) {
                foreach ($playlist->songs as $song) {
                    fputcsv($handle, [
                        $playlist->id,
                        $playlist->name,
                        $song->title,
                        $song->artist,
                        $song->duration ?? '00:00'
                    ], ',', "\0"); // Letztes Argument entfernt die automatischen Anführungszeichen
                }
            }

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }



    // CSV IMPORT (Hochladen)
    public function importCSV(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt|max:2048',
    ]);

    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    $fileHandle = fopen($path, 'r');
    fgetcsv($fileHandle); // Erste Zeile (Header) überspringen

    $newPlaylists = 0;
    $newSongs = 0;

    while (($data = fgetcsv($fileHandle, 1000, ',')) !== false) {
        if (count($data) < 5) {
            continue; // Falls Zeile nicht vollständig ist, überspringen
        }

        list($playlistId, $playlistName, $songTitle, $artist, $duration) = $data;

        if (!$playlistName || !$songTitle || !$artist) {
            continue; // Ungültige Zeilen überspringen
        }

        // ✅ Prüfen, ob Playlist existiert
        $playlist = Playlist::where('id', $playlistId)->first();
        if (!$playlist) {
            $playlist = Playlist::firstOrCreate(['name' => $playlistName]);
            $newPlaylists++; // Neue Playlist wurde erstellt
        }

        // ✅ Song nur hinzufügen, wenn er nicht bereits in der Playlist existiert
        $songExists = Song::where('playlist_id', $playlist->id)
            ->where('title', $songTitle)
            ->where('artist', $artist)
            ->exists();

        if (!$songExists) {
            Song::create([
                'playlist_id' => $playlist->id,
                'title' => $songTitle,
                'artist' => $artist,
                'duration' => $duration,
            ]);

            $newSongs++; // Neuer Song wurde hinzugefügt

            // ✅ Song-Anzahl in Playlist aktualisieren
            $playlist->increment('song_count');
        }
    }

    fclose($fileHandle);

    // ✅ Erfolgsnachricht mit Anzahl der neuen Playlists und Songs
    if ($newPlaylists > 0 || $newSongs > 0) {
        return redirect()->back()->with('success', "CSV-Datei erfolgreich importiert.");
    } else {
        return redirect()->back()->with('info', 'Keine neuen Daten wurden importiert. Alle Playlists und Songs existieren bereits.');
    }
}


}
