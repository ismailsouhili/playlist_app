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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <style>
    body {
    background-color: rgba(42, 42, 58, 0.8);
    /* Mit Transparenz */
    color: white;
    margin: 20px;
    font-family: Arial, sans-serif;
}

.sidebar {
    height: 100vh;
    overflow-y: auto;
    background: linear-gradient(135deg, #2a2a3a, #1e1e2f);
    padding: 15px;
    color: white;
    box-shadow: 4px 0px 10px rgba(0, 0, 0, 1.5);
}

.sidebar h3 {
    color: #f39c12;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 20px;
    font-size: 1.5rem;
}

.list-group-item {
    background-color: #4A4A5A;
    /* Mit Helligkeitsanpassung */
    border: none;
    color: white;
    transition: all 0.3s ease-in-out;
    font-size: 1.1rem;
}

.list-group-item a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 8px;
}

.list-group-item:hover {
    background-color: hsl(540, 10%, 25%);
    /* Mit Helligkeitsanpassung */
    color: #f39c12 !important;
}

.list-group-item.active {
    background-color: #f39c12;
    color: #f39c12 !important;
    font-weight: bold;
}

.song-card {
    background-color: #2a2a3a;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 10px;
    box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.song-card:hover {
    transform: scale(1.03);
    transition: all 0.2s ease-in-out;
}

.song-title {
    font-size: 1.2rem;
    font-weight: bold;
}

.song-card .btn-action {
    margin-left: 10px;
    padding: 8px 10px;
    font-size: 1rem;

}

.btn-action i {
    font-size: 1.5rem;
}

.btn-warning i {
    color: #4A4A5A;

}

.btn-danger i {
    color: #4A4A5A;
}


.btn-info i {
    color: #4A4A5A;
}

.no-songs {
    text-align: center;
    font-size: 1.5rem;
    color: #bbb;
    font-weight: bold;
}

.btn-sm {
    padding: 8px 10px;
    font-size: 1.3rem;
    border-radius: 5%;
}

.btn-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 10px;
    padding: 30%;
}

.heading-style {
    background-color: rgba(42, 42, 58, 0.9);
    /* Hintergrundfarbe */
    border: 2px solid #4A4A5A;
    /* Rahmenfarbe */
    border-radius: 10px;
    /* Abgerundete Ecken */
    padding: 15px;
    /* Innenabstand */
    color: #f39c12;
    /* Schriftfarbe */
    font-weight: bold;
    /* Fettdruck */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    /* Schatten */
}

.input-light-purple {
    background-color: #7A7A8A; /* Hellere Lila-Farbe */
    color: black; /* Schwarzer Text für besseren Kontrast */
    border: 1px solid #B095C5; /* Lila Rand */
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

.input-light-purple:focus {
    background-color: #8A8AA0; /* Noch etwas heller beim Fokus */
    border-color: #C0A0E0; /* Leichter Lila-Effekt */
    outline: none;
    box-shadow: 0 0 10px rgba(176, 149, 197, 0.5);
}



 </style>

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
                                <form action="{{ route('playlists.edit', $playlist) }}" style="display:inline;">
                                    <button type="submit" class="btn btn-outline-warning btn-sm btn-action mx-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>

                                <!-- Löschen -->
                                <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mx-1"
                                        onclick="return confirm('Willst du diese Playlist wirklich löschen?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Teilen -->
                                <button onclick="shareSong('{{ $playlist->name }}')"
                                    class="btn btn-outline-light btn-sm mx-1">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>

                        </li>
                    @endforeach

                    <li class="list-group-item text-center" style="background-color: #4A4A5A !important;">
                        <a href="" class="btn btn-success mb-2 heading-style add-btn" data-bs-toggle="modal"
                            data-bs-target="#playlistModal">
                            <span><i class="fa fa-play-circle" aria-hidden="true"></i> Neue Playlist</span>
                        </a>
                    </li>

                    <!--  START Bootstrap Modal (Popup) für das Formular -->
                    <div class="modal fade" id="playlistModal" tabindex="-1" aria-labelledby="playlistModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="background-color: #4A4A5A; color: white;">
                                <!-- Hintergrundfarbe & weiße Schrift -->
                                <div class="modal-header border-0">
                                    <h5 class="modal-title" id="playlistModalLabel">🎵 Neue Playlist erstellen</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Schließen"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container d-flex justify-content-center align-items-center">
                                        <div class="col-md-10">
                                            <form action="{{ route('playlists.store') }}" method="POST"
                                                class="text-center">
                                                @csrf

                                                <!-- Playlist-Name -->
                                                <div class="mb-4">
                                                    <label for="name" class="form-label">🎶 Name der
                                                        Playlist</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control input-light-purple" required>
                                                </div>

                                                <!-- Playlist-Typ -->
                                                <div class="mb-4">
                                                    <label for="type" class="form-label">📁 Typ der Playlist</label>
                                                    <input type="text" name="type" id="type"
                                                        class="form-control input-light-purple" required>
                                                </div>

                                                <div class="modal-footer border-0 d-flex justify-content-between">
                                                    <button type="button" class="btn btn-light heading-style"
                                                        data-bs-dismiss="modal">Abbrechen</button>
                                                    <button type="submit"
                                                        class="btn btn-primary heading-style">Speichern</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END Bootstrap Modal (Popup) für das Formular -->

                </ul>
            </div>


            <!-- Songs der ausgewählten Playlist -->
            <div class="col-md-8">
                <h3 class="mb-4 text-center heading-style">Songs</h3>

                @if ($songs->isEmpty())
                    <p class="no-songs">Diese Playlist hat noch keine Songs.</p>
                @else
                    @foreach ($songs as $song)
                        <div class="song-card">
                            <span class="song-title">🎶 {{ $song->title }} - {{ $song->artist }} </span>
                            <div class="d-flex align-items-center">
                                <span class="song-title">{{ $song->duration }} - </span>
                                <!-- Zurück -->
                                <button class="btn btn-secondary btn-circle btn-action" onclick="prevSong()">
                                    <i class="fas fa-backward"></i>
                                </button>

                                <!-- Play/Pause -->
                                <button class="btn btn-info btn-circle btn-action play-pause-btn" data-song-url="">
                                    <i class="fas fa-play"></i>
                                </button>

                                <!-- Vor -->
                                <button class="btn btn-secondary btn-circle btn-action" onclick="nextSong()">
                                    <i class="fas fa-forward"></i>
                                </button>
                                &nbsp;&nbsp;

                                <!-- Bearbeiten -->
                                <a href="{{ route('songs.edit', $song) }}"
                                    class="btn btn-outline-warning btn-sm btn-action mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Löschen -->
                                <form action="{{ route('songs.destroy', $song) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-action mx-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Teilen -->
                                <button onclick="shareSong('{{ $song->title }}')"
                                    class="btn btn-outline-light btn-sm btn-action mx-1">
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
                        🎶 Neuen Song hinzufügen
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
