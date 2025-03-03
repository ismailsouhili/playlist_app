<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;
use App\Models\Playlist;

class SongController extends Controller
{
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'minutes' => 'required|integer|min:0|max:20', // Minuten (0-20)
            'seconds' => 'required|integer|min:0|max:59', // Sekunden (0-59)
        ]);

        $duration = str_pad($request->minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($request->seconds, 2, '0', STR_PAD_LEFT);


        $song->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'duration' => $duration,
        ]);

        return redirect()->route('playlists.index', $song->playlist_id)->with('success', 'Song aktualisiert!');
    }

    public function destroy(Song $song)
    {
        $playlist_id = $song->playlist_id;
        $song->delete();

        return redirect()->route('playlists.index', $playlist_id)->with('success', 'Song gelöscht!');
    }


    public function create($playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        return view('songs.create', compact('playlist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'playlist_id' => 'required|exists:playlists,id',
            'minutes' => 'required|integer|min:0|max:20', // Minuten (0-20)
            'seconds' => 'required|integer|min:0|max:59', // Sekunden (0-59)
        ]);

        // Minuten und Sekunden zu einem String im Format "mm:ss" umwandeln
        $duration = str_pad($request->minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($request->seconds, 2, '0', STR_PAD_LEFT);

        Song::create([
            'title' => $request->title,
            'artist' => $request->artist,
            //'playlist_id' => $request->playlist_id,
            'playlist_id' =>  $request->playlist_id,
            'duration' => $duration, // Speichern als String "mm:ss"
        ]);

        return redirect()->route('playlists.index', $request->playlist_id)
            ->with('success', 'Song erfolgreich hinzugefügt.');
    }
}
