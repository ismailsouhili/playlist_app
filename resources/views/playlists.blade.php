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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

    <div class="container-fluid mb-4">
        @if (session('success'))
            <div class="alert alert-success text-center ">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <!-- Sidebar mit Playlists -->
            <div class="col-md-4 sidebar mb-4">
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

                <div>
                    <input type="text" id="songSearch" class="form-control input-light-purple heading-style mb-4"
                        placeholder="🔍 Song oder Autor suchen ...">
                </div>

                @if ($songs->isEmpty())
                    <p class="no-songs">Diese Playlist hat noch keine Songs.</p>
                @else
                    @foreach ($songs as $song)
                        <div class="song-card">
                            <span class="song-title">🎶 {{ $song->title }} - {{ $song->artist }} </span>
                            <div class="d-flex align-items-center">
                                <span class="song-duration">{{ $song->duration }} - </span>
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

    <div class="card shadow-lg p-2 text-center heading-style">

        <!-- CSV-Download-Button -->
        <a href="{{ route('exportCSV') }}"
            class="btn btn-success mb-3 text-center heading-style add-btn input-light-purple">
            <i class="fa fa-download"></i> Playlists & Songs als CSV herunterladen
        </a>

        <hr class="my-3">

        <!-- CSV-Upload-Formular -->
        <form action="{{ route('playlists.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center align-items-center gap-2 csv-upload-container">
                <input type="file" name="csv_file"
                    class="form-control d-inline w-auto text-center input-light-purple">
                <button type="submit" class="btn btn-success text-center input-light-purple add-btn">
                    <i class="fa fa-upload"></i> Playlists & Songs als CSV hochladen
                </button>
            </div>
        </form>

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

    document.getElementById("songSearch").addEventListener("input", function() {
        let filter = this.value.toLowerCase();
        let songs = document.querySelectorAll(".song-card"); // Alle Songs abrufen

        songs.forEach(song => {
            let title = song.querySelector(".song-title").textContent.toLowerCase();
            if (title.includes(filter)) {
                song.style.display = "block"; // Song anzeigen
            } else {
                song.style.display = "none"; // Song ausblenden
            }
        });
    });

    window.addEventListener('load', function() {
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            var errorAlert = document.getElementById('error-alert');

            // Wenn das Success-Popup da ist, es ausblenden
            if (successAlert) {
                successAlert.style.display = 'none';
            }

            // Wenn das Error-Popup da ist, es ausblenden
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // Warte 5 Sekunden (5000 Millisekunden)
    });

    function moveDuration() {
        const mediaQuery = window.matchMedia("(max-width: 768px)");
        const isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

        if (mediaQuery.matches && isMobile) {
            document.querySelectorAll(".song-card").forEach(card => {
                let title = card.querySelector(".song-title");
                let duration = card.querySelector(".song-duration");

                title.after(duration); // Setzt die Dauer unter den Titel
            });
        }
    }

    // Event Listener für Seitenladezeit & Fenstergröße-Änderungen
    window.addEventListener("DOMContentLoaded", moveDuration);
    window.addEventListener("resize", moveDuration);
</script>

</html>
