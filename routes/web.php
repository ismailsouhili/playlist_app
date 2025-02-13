<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->route('playlists.index');
});


/*Route::resource('playlists', PlaylistController::class);
Route::resource('playlists/{playlist}/songs', SongController::class);


Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');*/


Route::get('/playlists/{playlist_id?}', [PlaylistController::class, 'index'])->name('playlists.index');


// Bearbeitung Songs
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');
// Route zum Anzeigen des Formulars für das Erstellen eines Songs (create)
Route::get('/songs/create/{playlist}', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');


// Bearbeitung Playlists
//Route::resource('playlists', PlaylistController::class);
Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
// Route zum Anzeigen des Formulars für das Erstellen eines Songs (create)
//Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');


// Route für Import und Export
Route::get('export-csv', [PlaylistController::class, 'exportCSV'])->name('exportCSV');
Route::post('/playlists/import', action: [PlaylistController::class, 'importCSV'])->name('playlists.import');

//Route::post('/playlists/import', [PlaylistController::class, 'importCSV'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('playlists.import');











