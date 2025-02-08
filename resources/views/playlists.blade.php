<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist App</title>
    <!-- FontAwesome über ein CDN laden -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar mit Playlists -->
            <div class="col-md-4 sidebar">
                <h3 class="text-center">Playlists</h3>
                <ul class="list-group">
                    @foreach ($playlists as $playlist)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center {{ $playlist->id == $playlist_id ? 'active' : '' }}">

                            <!-- Playlist Name und Anzahl der Songs links -->
                            <a href="{{ route('playlists.index', $playlist->id) }}"
                                class="text-decoration-none text-dark d-flex align-items-center">
                                <i class="fa fa-play-circle me-2"></i>
                                <span>{{ $playlist->name }}</span>
                                <span class="playlist-count ms-2">({{ $playlist->songs()->count() }} S)</span>
                            </a>

                            <!-- Buttons rechts -->
                            <div class="d-flex">
                                <!-- Bearbeiten -->
                                <a href="{{ route('playlists.edit', $playlist) }}"
                                    class="btn btn-warning btn-sm btn-action mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Löschen -->
                                <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                        onclick="return confirm('Willst du diese Playlist wirklich löschen?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Teilen -->
                                <button onclick="shareSong('{{ $playlist->name }}')" class="btn btn-info btn-sm mx-1">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>

                        </li>
                    @endforeach

                    <li class="list-group-item text-center" style="background-color: #4A4A5A !important;">
                        <a href="{{ route('playlists.create') }}" class="btn btn-success mb-2 heading-style add-btn">
                            <span><i class="fa fa-play-circle" aria-hidden="true"></i> Neue Playlist</span>
                        </a>
                    </li>

                </ul>
            </div>


            <!-- Songs der ausgewählten Playlist -->
            <div class="col-md-8">
                <h3 class="mb-4 text-center heading-style">{{ $playlist->name }} - Songs</h3>

                @if ($songs->isEmpty())
                    <p class="no-songs">Diese Playlist hat noch keine Songs.</p>
                @else
                    @foreach ($songs as $song)
                        <div class="song-card">
                            <span class="song-title">🎶 {{ $song->title }} - {{ $song->artist }}</span>
                            <div class="d-flex align-items-center">
                                <!-- Zurück -->
                                <button class="btn btn-secondary btn-circle btn-action" onclick="prevSong()">
                                    <i class="fas fa-backward"></i>
                                </button>

                                <!-- Play/Pause -->
                                <button class="btn btn-info btn-circle btn-action play-pause-btn"
                                    data-song-url="{{ $song->audio_url }}">
                                    <i class="fas fa-play"></i>
                                </button>

                                <!-- Vor -->
                                <button class="btn btn-secondary btn-circle btn-action" onclick="nextSong()">
                                    <i class="fas fa-forward"></i>
                                </button>

                                <!-- Bearbeiten -->
                                <a href="{{ route('songs.edit', $song) }}"
                                    class="btn btn-warning btn-sm btn-action mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Löschen -->
                                <form action="{{ route('songs.destroy', $song) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action mx-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Teilen -->
                                <button onclick="shareSong('{{ $song->title }}')"
                                    class="btn btn-info btn-sm btn-action mx-1">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- + Neuen Song hinzufügen Button -->
                <div class="text-center">
                    <a href="{{ route('songs.create', $playlist->id) }}"
                        class="btn btn-success mb-4 text-center heading-style add-btn">
                        <i class="fas fa-plus"></i> Neuen Song hinzufügen
                    </a>
                </div>

            </div>

        </div>
    </div>



</body>

<script>
    function shareSong(songTitle) {
        const shareText = `Höre dir diesen Song an: ${songTitle}`;
        if (navigator.share) {
            navigator.share({
                title: "Song teilen",
                text: shareText,
                url: window.location.href
            }).catch(console.error);
        } else {
            alert("Teilen wird in diesem Browser nicht unterstützt.");
        }
    }

    let currentAudio = null;
    let currentSongIndex = -1;
    const songs = @json($songs); // Die Songs als Array bereitstellen

    document.querySelectorAll('.play-pause-btn').forEach((button, index) => {
        button.addEventListener('click', function() {
            playSong(index, this);
        });
    });

    function playSong(index, button) {
        const songUrl = songs[index].audio_url;

        if (currentAudio && currentAudio.src === songUrl) {
            if (!currentAudio.paused) {
                currentAudio.pause();
                button.innerHTML = '<i class="fas fa-play"></i>';
            } else {
                currentAudio.play();
                button.innerHTML = '<i class="fas fa-pause"></i>';
            }
        } else {
            if (currentAudio) {
                currentAudio.pause();
            }
            currentAudio = new Audio(songUrl);
            currentAudio.play();
            button.innerHTML = '<i class="fas fa-pause"></i>';
            currentSongIndex = index;
        }
    }

    function nextSong() {
        if (currentSongIndex < songs.length - 1) {
            currentSongIndex++;
            playSong(currentSongIndex, document.querySelectorAll('.play-pause-btn')[currentSongIndex]);
        }
    }

    function prevSong() {
        if (currentSongIndex > 0) {
            currentSongIndex--;
            playSong(currentSongIndex, document.querySelectorAll('.play-pause-btn')[currentSongIndex]);
        }
    }
</script>

</html>
