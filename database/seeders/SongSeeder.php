<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Song;
use App\Models\Playlist;



class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Song::create([
            'title' => 'Bohemian Rhapsody',
            'artist' => 'Queen',
            'playlist_id' => 1, // ID der Playlist "Rock Classics"
        ]);

        Song::create([
            'title' => 'Let it Be',
            'artist' => 'The Beatles',
            'playlist_id' => 1, // ID der Playlist "Rock Classics"
        ]);

       /* $this->call([
            PlaylistSeeder::class,
            SongSeeder::class,
        ]);*/

    }
}
