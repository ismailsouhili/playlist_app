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
        ]);

        $song->update([
            'title' => $request->title,
            'artist' => $request->artist,
        ]);

        return redirect()->route('playlists.index', $song->playlist_id)->with('success', 'Song aktualisiert!');
    }

    public function destroy(Song $song)
    {
        $playlist_id = $song->playlist_id;
        $song->delete();

        return redirect()->route('playlists.index', $playlist_id)->with('success', 'Song gelöscht!');
    }

    /*public function create(Request $request)
    {
        $playlist_id = $request->query('playlist_id'); // Playlist-ID aus der URL holen
        return view('songs.create', compact('playlist_id')); // Playlist-ID an die View übergeben
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'playlist_id' => 'required|exists:playlists,id', // Validierung der Playlist-ID
        ]);

        Song::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'playlist_id' => $request->playlist_id, // Zuordnung zur Playlist
        ]);

        return redirect()->route('playlists.index', $request->playlist_id)->with('success', 'Song hinzugefügt!');
    }*/

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
        ]);

        Song::create($request->all());

        return redirect()->route('playlists.index', $request->playlist_id)
                         ->with('success', 'Song erfolgreich hinzugefügt.');
    }
}
