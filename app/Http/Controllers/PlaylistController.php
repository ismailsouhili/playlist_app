<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Playlist;

use App\Models\Song;



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

        return redirect()->route('playlists.index', $Playlist->playlist_id)->with('success', 'Song aktualisiert!');
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'string|max:255',
        ]);

        // Erstelle die neue Playlist
        Playlist::create($request->all());

        return redirect()->route('playlists.index')
            ->with('success', 'Playlist erfolgreich erstellt.');
    }
}
