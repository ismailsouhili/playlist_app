namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistSeeder extends Seeder
{
    public function run()
    {
        Playlist::create([
            'name' => 'Rock Classics',
            'song_count' => 0,
            'type' => 'Rock',
        ]);

        Playlist::create([
            'name' => 'Top Hits 2025',
            'song_count' => 0,
            'type' => 'Pop',
        ]);
    }
}
